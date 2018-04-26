Vue.component('family-record-form', {
  props: ['generations', 'lines', 'pens'],
  template: `
  <div class="row">
    <div class="col s12 m12 1l2">
      <h4>Family Record</h4>
      <div class="divider"></div>
      <div class="row">
        <div class="row">
          <div class="col s12 m12 l12">
            <div class="card-panel">
                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="input-field col s12 m6 l6">
                      <input id="family_id" type="text" class="validate" name="family_id" v-model="family_id">
                      <label for="family_id">Family ID</label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="input-field col s12 m6 l6">
                      <input id="date_transferred" type="text" class="datepicker" name="date_transferred" v-model="date_transferred">
                      <label for="date_transferred">Date Transferred to Breeder Area</label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="input-field col s12 m6 l6">
                      <select name = "generation" v-model="generation" validate>
                      <option value="" disabled selected>Choose generation</option>

                      </select>
                      <label>Generation</label>
                    </div>
                    <div class="input-field col s12 m6 l6">
                      <input id="date_hatched" type="text" class="datepicker" name="date_hatched" v-model="date_hatched">
                      <label for="date_hatched">Date Hatched</label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l12">
                    <div name = "line" class="input-field col s12 m6 l6">
                      <select name="line" v-model="line" validate >
                      <option value="" disabled selected>Choose line</option>

                      </select>
                      <label>Line</label>
                    </div>
                    <div class="input-field col s12 m6 l6">
                      <input id="age_first_egg" type="text" class="validate" name="age_first_egg" v-model="age_firts_egg">
                      <label for="age_first_egg">Age at First Egg</label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l12">
                    <div class="input-field col s12 m6 l6">
                      <select name = "pen_no" v-model="pen_no" validate>
                      <option value="" disabled selected>Choose pen</option>
                        <option v-for="(pen, index) in pens" :value="index">{{pen.number}}</option>
                      </select>
                      <label>Moved to Pen Number</label>
                    </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l12 center">
                    <button class="btn waves-effect waves-light yellow darken-3" type="submit">Submit
                      <i class="material-icons right">send</i>
                    </button>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

  `,
  data:

    function()
    {
      return {
        family_id: "",
        date_transferred: "",
        generation: "",
        date_hatched:"",
        line: "",
        age_firts_egg: "",
        pen_no: ""
      }
    }

  ,

  methods:
  {

  },

  computed:
  {
    getLine ()
    {

    },

  }

});

new Vue({
  el:'#root',

  data:
  {
  },

  methods:
  {

  },

});
