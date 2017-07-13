<template>
	<div class="container">
        <div class="row">
            <div class="col-md-12">
              <form  @submit="validateForm()" onsubmit="return false;">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Opening Screen</div>

                    <div class="panel-body">
                        <tbvue-input name="title" id="in_title" placeholder="Name" rules="required|max:100" v-model="item.title">Title</tbvue-input>
                        <tbvue-tinymce name="main_copy" id="in_main_copy" v-model="item.main_copy" rules="required">Main Copy</tbvue-tinymce>
                    </div>
                    <div class="panel-footer">
                        <a  class="btn btn-default" :href="'#/games/edit/'+item.game_set_id" ><i class="fa fa-fw fa-chevron-left"></i> Back</a>
                        <button type="submit"   :class="{'btn btn-success pull-right': true, 'disabled': !isValidForm }"><i class="fa fa-fw fa-floppy-o" ></i> Save</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
 var edit_mix = require('../mixins/edit.js').default;
 export default {
    mixins: [edit_mix],
    created(){
    	this.singular="screen";
    	this.resource_url="ajax/opening_screens";
    },
    data(){
    	return {
    		item:{id:null,game_set_id:null,title:"",main_copy:""},
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

    }


 }
</script>