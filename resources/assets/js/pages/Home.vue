<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <div class="panel panel-default">
                      <div class="panel-heading">
                      <h2><i class="lnr lnr-users"></i> Games
                          <div class="btn-group  pull-right">
                          
                          <a href="#/games/new" class="btn btn-default" ><i class="fa fa-fw fa-plus"></i> New</a>
                          </div>
                      </h2>
                      
                      </div>

                      <div class="panel-body">
                       
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                              <th>Name</th>
                              <th>Pin</th>
                              <th>Status</th>
                              <th>Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                            <tr v-for="item in list.data">
                                <td>{{item.lookup_name}}</td>
                                <td>{{item.pin}}</td>
                                <td v-html="getStatus(item.active)"></td>
                                <td>
                                     <div class="btn-group btn-group-xs" role="group" aria-label="...">
                                         <a class="btn btn-default" :href="'#games/edit/'+item.id" ><i class="fa fa-fw fa-edit"></i> <span class="hidden-xs">Edit</span></a>
                                        <button type="button" class="btn btn-default" @click="activate(item)" v-show="!item.active"><i class="fa fa-fw fa-toggle-off"></i> <span class="hidden-xs">Activate</span></button>
                                        <button type="button" class="btn btn-default" @click="deactivate(item)" v-show="item.active"><i class="fa fa-fw fa-toggle-on"></i> <span class="hidden-xs">Deactivate</span></button>
                                        <button type="button" class="btn btn-default" @click="trash(item)" v-show="!item.is_admin"><i class="fa fa-fw fa-trash"></i> <span class="hidden-xs">Delete</span></button>
                                     </div>
                                </td>
                            </tr>
                            <tr v-show="list.data.length==0">
                              <td colspan="4">No results</td>
                            </tr>
                            </tbody>
                        </table>
                      </div>
                  </div>
            </div>
        </div>
    </div>
</template>

<script>	
	var list_mix = require('../mixins/list.js').default;
	var delete_mix = require('../mixins/delete.js').default;
	var activation_mix = require('../mixins/activation.js').default;
	export default {
	    mixins: [list_mix,delete_mix,activation_mix],
	    created: function() {
	    	this.singular="game";
	        this.resource_url = "ajax/games";
	    },
	    methods: {
	        getStatus: function(value) {
	            if (value == 1) {
	                return "<span class='label label-success'>Active</span>";
	            } else {
	                return "<span class='label label-danger'>Inactive</span>";
	            }

	        },
	    }
	}

</script>
