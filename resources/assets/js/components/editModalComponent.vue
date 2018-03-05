<template lang="html">

  <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" v-on:click="clearModal" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="">Update Task Record!</h4>
        </div>
        <div class="modal-body">
          <p class="alert alert-success" v-if="success.length>0">{{success}}</p>
          <label for="name">Update Task</label>
          <textarea name="name" id="name" class="form-control" v-model="rec.name"></textarea>
          <ul v-if="errors.name" class="list-unstyled">
            <li v-for="err of errors.name" class="alert alert-danger">{{err}}</li>
          </ul>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" v-on:click="clearModal" data-dismiss="modal">Close</button>
          <button type="button" v-on:click="updateRecord" class="btn btn-primary"> Update Changes</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props:['rec'],
  data(){
    return{
      errors:[],
      success:'',
    }
  },
  methods:{
    updateRecord(){
      axios.post('http://localhost/lvue/public/tasks/'+this.rec.id,{
        'name':this.rec.name,
        '_method':'PUT'
      })
      .then(data=>{
        this.$emit('recordupdated',data);

        this.success="Task Updated Succesfully";
        this.record="";
      //  this.errors=[];
      })
      .catch(error=>{
        this.errors=error.response.data.errors;
        //console.log(this.error);
      })
    },

    clearModal(){
      this.errors=[];
      this.success="";
    }
  }
}
</script>

<style lang="css">
</style>
