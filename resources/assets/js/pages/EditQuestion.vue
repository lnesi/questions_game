<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                 <form  @submit="validateForm()" onsubmit="return false;">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Question</div>

                    <div class="panel-body">
                        <tbvue-input name="title" id="in_title" placeholder="Question" rules="required|max:140" v-model="item.text">Text</tbvue-input>
                        <tbvue-input name="value" id="in_value" placeholder="Value" rules="required|numeric" v-model="item.value">Value</tbvue-input>
                        <h3>Answers</h3>
                        <answer ref="a1" :value="item.answers[0]">A:</answer>
                        <answer ref="a2" :value="item.answers[1]">B:</answer>
                        <answer ref="a3" :value="item.answers[2]">C:</answer>
                        <answer ref="a4" :value="item.answers[3]">D:</answer>
                    </div>
                    <div class="panel-footer">
                        <a  class="btn btn-default" :href="'#/games/edit/'+this.$route.params.gid" ><i class="fa fa-fw fa-chevron-left"></i> Back</a>
                        <button type="submit"   :class="{'btn btn-success pull-right': true, 'disabled': !isValidForm }"><i class="fa fa-fw fa-floppy-o" ></i> Save</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
  data() {
      return {
        item: { answers: {} },
        isValidForm: false
      }
    },
    mounted() {
      this.load(this.$route.params.id);
    },
    methods: {
      load(id) {
        this.$root.showPreloader();
        axios.get("ajax/questions/" + id).then(function(response) {
          this.$root.hidePreloader();
          this.item = response.data;
        }.bind(this)).catch(function(response) {
          this.$router.push('/404');
        }.bind(this));
      },
      save() {
        this.$root.showPreloader();
        axios.put("ajax/questions/"+this.item.id, this.item).then(function(response){
            this.$root.hidePreloader();
            this.$root.alert.success("The  question has been updated successfully");
        }.bind(this));
      },
      validateForm() {
        this.isValidForm = true;
        this.$children.forEach(function(element) {
          if (element.isInput) {
            element.validate();
            if (this.isValidForm) this.isValidForm = element.isValid;
          }
        }.bind(this));

        if (this.isValidForm) {
          this.save()
        } else {
          this.$root.$refs.alert.error("Please complete before continue");
        }
      },
    }
 }
</script>
