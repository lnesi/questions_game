<template>
    <div class="modal fade" tabindex="-1" role="dialog" :id="id">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
                <slot name="header"></slot>
          </div>
          <div class="modal-body">
                 <slot name="body"></slot>
          </div>
          <div class="modal-footer">
                <slot name="footer"></slot>
          </div>
        </div>
      </div>
    </div>
</template>

<script>
    export default {
     
        props:['id'],
        methods:{
          show(){
             $("#"+this.id).modal("show");
           },
           hide(){
             $("#"+this.id).modal("hide");
           }
        }
        
    }
</script>
