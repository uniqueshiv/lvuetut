<template lang="html">
  <div class="container">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
              <div class="panel panel-primary">
                  <div class="panel-heading">All Todo Tasks
                     <span class="pull-right">
                      <a class="btn btn-danger" data-toggle="modal" href="#taskmodel">+</a>
                    </span>
                  </div>

                  <div class="panel-body">
                    <input type="text" class="form-control" name="search" value="" v-model="search" @keyup="searchRecord" placeholder="Search...">
                    <br>
                  <ul class="list-group">
                      <li class="list-group-item" v-for="task in tasks.data">{{task.id}} - {{task.name}}
                        <span class="pull-right">

                        <a type="button" @click="getRecord(task.id)" data-toggle="modal" href="#editmodal" class="btn btn-xs btn-primary">Edit</a> |
                        <a type="button" @click="getRecord(task.id)" data-toggle="modal" href="#viewmodal" class="btn btn-xs btn-success">Show</a> |
                        <button type="button" @click="delRecord(task.id)" class="btn btn-xs btn-danger">Delete</button>
                      </span>
                    </li>
                  </ul>
                  <pagination :data="tasks" v-on:pagination-change-page="getResults"></pagination>
                  </div>
                    <div class="panel-footer">
                      <div class="text-right"><small>Copyright @ 2018</small></div>
                    </div>
              </div>
          </div>
      </div>
      <div id="modal">
        <addtask @recordadded="refreshRecord"></addtask>
        <edittask :rec="editRec" @recordupdated="refreshRecord"></edittask>
        <viewtask :rec="editRec"></viewtask>
      </div>

  </div>

</template>

<script type="text/JavaScript">
//Vue.prototype.$http = axios;
Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('addtask', require('./addModalComponent.vue'));
Vue.component('edittask', require('./editModalComponent.vue'));
Vue.component('viewtask', require('./viewModalComponent.vue'));
export default {
  data(){
    return{
      tasks:{},
      records:{},
      editRec:{},
      viewRec:{},
      search:'',
      errors:[],
    }
  },
  methods:{
    refreshRecord(record){
      this.tasks=record.data;
    },
    getResults(page) {
			if (typeof page === 'undefined') {
				page = 1;
			}
			// Using vue-resource as an example
			axios.get('http://localhost/lvue/public/tasks?page=' + page)
				.then((response) => this.tasks=response.data)
				.catch((error)=>console.log(error));
		},
    getRecord(id){
      axios.get('http://localhost/lvue/public/tasks/'+id+'/edit')
      .then(response=>{
        this.editRec=response.data;
        //this.viewRec=response.data;
        //console.log('viewRec='+viewRec);
        console.log(response.data);
      })
      .catch(error=>this.errors=error.response.data.errors)
    },
    delRecord(id){
      const reply=confirm('Are your sure , You want to delete this record ?')
      if(reply){
          axios.post('http://localhost/lvue/public/tasks/'+id,{
           id:id,
          _method:'DELETE'
          })
          .then(response=>this.refreshRecord(response))
          .catch(error=>console.log(error.response.data.errors))
      }else{
        return
      }
    },
    searchRecord(){
      if(this.search.length>=3){
        axios.get('http://localhost/lvue/public/tasks/search/'+this.search)
        .then(response=>{
          this.tasks=response.data;
          console.log(response.data);
        })
        .catch(error=>console.log(error.response.data.errors))
      }else{
        this.getResults();
      }
    }

  },
  created(){
    axios.get('http://localhost/lvue/public/tasks')
          .then((response)=>{
            this.tasks=response.data;
            console.log(response.data);
          })
          .catch((error)=>console.log(error));
          console.log('task component loaded .....')
  }
}
</script>

<style lang="css" scoped>
</style>
