<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-danger">
                    <div class="panel-heading">Sample Panel Heading</div>

                    <div class="panel-body">
                      Hello ,{{ name }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('sample Component mounted.')
        },
        data(){
          return{
            name:'shiva chauhan'
          }
        }

    }
</script>
<style media="screen" scoped>
  h2{
    color:red;
  }
</style>
