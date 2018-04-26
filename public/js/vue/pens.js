Vue.component('add-pens', {
  template: `
          <div>
          <div class="col s12 m8 l8">
              <h5>Pens</h5>
          </div>
          <div class="col s12 m4 l4">
            <a class="btn-floating btn yellow darken-3 right tooltipped" data-tooltip="Add pen" @click="isVisible=!isVisible">
              <i class="large material-icons">add</i>
            </a>
          </div>
          <div class="divider"></div>
          <div class="row" v-show="isVisible">
            <div class="col s12 m12 l12">
              <div class="card-panel yellow lighten-4">
                <div class="row">
                  <div class="col s12 m12 l12">
                    <h5>Add Pen</h5>
                    <form method="post" action="/farm/create_pens" @submit.prevent='onSubmit'>
                      <div class="input-field col s12 m6 l6">
                        <input id="pen_number" type="text" maxlength="4" class="validate" name="pennumber" v-model='pennumber'>
                        <label for="pen_number">Pen Number</label>
                      </div>
                      <div class="input-field col s12 m6 l6">
                        <input id="pen_cap" type="number" maxlength="4" min="0" max="50" value="1" class="validate" name="pencap" v-model='pencap'>
                        <label for="pen_cap">Capacity</label>
                      </div>
                      <div class="col s12 m12 l12 center">
                        <button class="btn waves-effect waves-light" type="submit" name="action">Add
                          <i class="material-icons right">add</i>
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </div>
    `,

    data: function(){
      return {
         pennumber:'',
         pencap:'',
         isVisible: false,
      }
    },

    methods:
    {
      onSubmit(){
        axios.post('/farm/create_pens', this.$data)
             .then(this.onSuccess)
      },

      onSuccess(response) {
        this.pennumber = '',
        this.pencap = '',
        this.isVisible = !this.isVisible,
        this.$emit('update', response.data)
      }
    }

})

new Vue({
  el:'#root',

  data:
  {
    pens: data,
  },

  methods:
  {

  },

});
