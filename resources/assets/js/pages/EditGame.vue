<template>
	<div class="container">
        <div class="row">
            <div class="col-md-12">
              <form  @submit="validateForm()" onsubmit="return false;">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Game</div>

                    <div class="panel-body">
                        <tbvue-input name="name" id="in_name" placeholder="Name" rules="required|max:100" v-model="item.lookup_name">Name</tbvue-input>
                        <tbvue-input name="pin" id="in_pin"  placeholder="Pin" rules="required|min:4|max:8" v-model="item.pin" :disabled="true">Pin</tbvue-input>
                        
                        <h3>Opening Screen 
                        <small><a  class="btn btn-xs btn-default" :href="'#/openingscreen/edit/'+item.opening_screen.id" ><i class="fa fa-fw fa-edit"></i> Edit</a></small>
                        </h3>
                        <screenpreview :data="item.opening_screen"></screenpreview>
                        <hr>
                        <h3>Questions
                        <small><a  class="btn btn-xs btn-default" :href="'#/questions/add/'+item.id" ><i class="fa fa-fw fa-plus"></i> Add</a></small>
                        </h3>
                        <questions :data="item.questions" :gid="this.$route.params.id"></questions>
                    </div>
                    <div class="panel-footer">
                        <a  class="btn btn-default" href="#/" ><i class="fa fa-fw fa-chevron-left"></i> Back</a>
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
    	this.singular="game";
    	this.resource_url="ajax/games";
    },
    data(){
    	return {
    		item:{lookup_name:"",pin:"",opening_screen:{id:null}},
    		isValidForm:false
    	}
    },
    methods:{
    	validateForm(){
    		
    	}
    }
 }
</script>
