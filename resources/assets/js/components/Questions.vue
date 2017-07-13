<template>
<div>
	<table class="table table-bordered table-striped">
     <thead>
        <tr>
             <th>Question</th>
             <th>Value</th>
             <th>Status</th>
             <th>Actions</th>
         </tr>
         <tr v-for="q in data">
             <td>{{q.text}}</td>
             <td>{{q.value}}</td>
             <td v-html="getStatus(q.active)"></td>
             <td>
                <div class="btn-group btn-group-xs" role="group" aria-label="...">
                    <a class="btn btn-default" :href="'#questions/edit/'+q.id+'/'+gid" ><i class="fa fa-fw fa-edit"></i> <span class="hidden-xs">Edit</span></a>
                    <button type="button" class="btn btn-default" @click="activate(q)" v-show="!q.active"><i class="fa fa-fw fa-toggle-off"></i> <span class="hidden-xs">Activate</span></button>
                    <button type="button" class="btn btn-default" @click="deactivate(q)" v-show=" q.active"><i class="fa fa-fw fa-toggle-on"></i> <span class="hidden-xs">Deactivate</span></button>
                    <button type="button" class="btn btn-default" @click="trash(q)"><i class="fa fa-fw fa-trash"></i> <span class="hidden-xs">Delete</span></button>
                 </div>
             </td>
         </tr>
         <tr v-show="!data || data.length==0">
             <td colspan="4">No results.</td>
         </tr>
     </thead>   
    </table>
</div>
</template>
<script>
var delete_mix = require('../mixins/delete.js').default;
var activation_mix = require('../mixins/activation.js').default;
export default {
        mixins: [delete_mix,activation_mix],
       props:{
            data:null,
            gid:null
       },
       created(){
            this.resource_url="ajax/questions";
            this.singular="question";
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