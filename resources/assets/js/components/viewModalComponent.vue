<template lang="html">

  <div class="modal fade" id="viewmodal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id=""> Record!</h4>
        </div>
        <div class="modal-body">

          <label for="name"> Task</label>
          <p  class="">{{rec.name}}</p>
                </div>
        <div class="modal-footer">
      </div>
      </div>
    </div>
  </div>
</template>

<script>
export default{
  props:['rec'],
}

</script>

<style lang="css" scoped="">
</style>
