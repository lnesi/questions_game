<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                 <form  @submit="validateForm()" onsubmit="return false;">
                <div class="panel panel-default">
                    <div class="panel-heading">New Question</div>

                    <div class="panel-body">
                        <tbvue-input name="title" id="in_title" placeholder="Question" rules="required|max:140" v-model="quetion_text">Text</tbvue-input>
                        <tbvue-input name="value" id="in_value" placeholder="Value" rules="required|numeric" v-model="question_value">Value</tbvue-input>
                        <h3>Answers</h3>
                        <answer ref="a1">A:</answer>
                        <answer ref="a2">B:</answer>
                        <answer ref="a3">C:</answer>
                        <answer ref="a4">D:</answer>
                    </div>
                    <div class="panel-footer">
                        <a  class="btn btn-default" :href="'#/games/edit/'+this.$route.params.id" ><i class="fa fa-fw fa-chevron-left"></i> Back</a>
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
        data(){
        	return{
        		quetion_text:"",
        		question_value:100,
	        	isValidForm:false
        	}
        },
        methods:{
        	validateForm(){
        		this.isValidForm=true;
	            this.$children.forEach(function(element){
	              if(element.isInput){
	                element.validate();
	                if(this.isValidForm)this.isValidForm=element.isValid;
	              }
	            }.bind(this));

	            if(this.isValidForm){
	                this.save()
	            }else{
	              this.$root.$refs.alert.error("Please complete before continue");
	            }
	        },
	        save(){
	        	this.$root.showPreloader();
	        	var addObject={
	        		text:this.quetion_text,
	        		game_set_id:this.$route.params.id,
	        		answers:[
	        			this.$refs.a1.get(),
	        			this.$refs.a2.get(),
	        			this.$refs.a3.get(),
	        			this.$refs.a4.get()
	        		]
	        	}

                axios.post("ajax/questions/"+this.$route.params.id, addObject).then(function(response) {
                    this.$root.hidePreloader();
                    this.$root.$refs.alert.display("Ok!", "The question has been created successfully", "success", 3);
                    this.$root.$router.push('/games/edit/'+this.$route.params.id);
                }.bind(this)).catch(function(error) {
                    this.$root.hidePreloader();
                    console.log("errorAdding", error);
                }.bind(this));
	        }
        }
    }
</script>
