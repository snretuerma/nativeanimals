Vue.component('confirmation', {
  template:'<div id="inactive_confirm" class="modal  modal-close">\
        <div class="modal-content">\
          <h5 id="confirmation_title" :title=""></h5>\
          <div class="row">\
            <div class="col s12 m12 l12">\
              Mark this generation as <strong>inactive</strong> and <strong>cull</strong> all the animals in the generation?\
              This action is permanent and cannot be undone. Click confirm to continue the action\
            </div>\
          </div>\
          <div class="row">\
            <div class="col s6 m6 l6 center">\
              <input id="gen_confirmation" type="hidden" name="generation_id" value="">\
              <button class="btn waves-effect waves-light"><i class="material-icons left">check_circle</i>Confirm</button>\
            </div>\
            <div class="col s6 m6 l6 center">\
              <a class="btn waves-effect waves-light"><i class="material-icons left">cancel</i>Cancel</a>\
            </div>\
          </div>\
        </div>\
      </div>\
    '

});


new Vue({
  el:'#root',

  data: {
    title: '',
    value: ''
  },

  methods:
  {
    displayConfirmationModal(){
      title = this.title;
    }
  }

});
