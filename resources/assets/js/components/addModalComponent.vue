<template lang="html">

  <div class="modal fade" id="taskmodel" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" v-on:click="clearModal" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="">Add New Record!</h4>
        </div>
        <div class="modal-body">
          <p class="alert alert-success" v-if="success.length>0">{{success}}</p>
          <label for="name">Add New Task</label>
          <textarea name="name" id="name" class="form-control" v-model="record"></textarea>
          <ul v-if="errors.name" class="list-unstyled">
            <li v-for="err of errors.name" class="alert alert-danger">{{err}}</li>
          </ul>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" v-on:click="clearModal" data-dismiss="modal">Close</button>
          <button type="button" v-on:click="addRecord" class="btn btn-primary"> Save Changes</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data(){
    return{
      record:'',
      errors:[],
      success:'',
    }
  },
  methods:{
    addRecord(){
      axios.post('http://localhost/lvue/public/tasks',{
        'name':this.record,
      })
      .then(data=>{
        this.$emit('recordadded',data)
        this.success="Task Added Succesfully";
        this.record="";
        this.errors=[];
      })
      .catch(error=>{
        this.errors=error.response.data.errors;
        //console.log(this.error);
      })

    },
    clearModal(){
      this.errors=[];
      this.record="";
      this.success="";
    }

  }
}
</script>

<style lang="css">
</style>
