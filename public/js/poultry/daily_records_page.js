$(document).ready(function(){
  $('#addmortality').click(function(){
    $('#mortality_input_field').append('\
      <div class="col s12 m6 l6">\
        <label>Animal ID</label>\
        <select class="browser-default" name="animal_mort[]">\
        <option value="" disabled selected>Choose your option</option>\
        <option value="1">Animal 1</option>\
        <option value="2">Animal 2</option>\
        <option value="3">Animal 3</option>\
        </select>\
      </div>\
      <div class="col s12 m6 l6">\
        <label>Remarks</label>\
        <select class="browser-default" name="mort_reason[]">\
        <option value="" disabled selected>Choose your option</option>\
        <option value="1">Sickness</option>\
        <option value="2">Trauma - Natural</option>\
        <option value="3">Trauma - Predatory</option>\
        </select>\
      </div>\
    ');
  });

  $('#addculled').click(function(){
    $('#culling_input_field').append('\
      <div class="col s12 m6 l6">\
        <label>Animal ID</label>\
        <select class="browser-default" name="animal_cull">\
           <option value="" disabled selected>Choose your option</option>\
           <option value="1">Animal 1</option>\
           <option value="2">Animal 2</option>\
           <option value="3">Animal 3</option>\
        </select>\
      </div>\
      <div class="col s12 m6 l6">\
        <label>Remarks</label>\
        <select class="browser-default" name="cull_reason[]">\
           <option value="" disabled selected>Choose your option</option>\
           <option value="1">Sickness</option>\
           <option value="2">Unproductive</option>\
           <option value="3">Off-colored</option>\
        </select>\
      </div>\
    ');
  });

  $("#select_family").change(function (e) {
    e.preventDefault();
    var family_id = $(this).find(':selected').data("id");
    $('#head3').attr('class', 'tab col s3 m3 l3');
    $('#head4').attr('class', 'tab col s3 m3 l3');
    $("#culling_form").empty();
    $("#mortality_form").empty();
    $.ajax({
      url: window.location.href+'/member_list',
      type: 'GET',
      cache: false,
      data: {family_id},
      success: function(data)
      {
        data.forEach(function(data){
          $("#pen").attr('value', data.pen_no);
          $("#culling_form").append('\
            <div class="row valign-wrapper">\
              <div class="col s6 l6 m6 valign">\
                <input name="culled[]" type="checkbox" id="'+data.id+'" value="'+data.animal_id+'"/>\
                <label for="'+data.id+'">'+data.registryid+'</label>\
              </div>\
              <div class="col s12 m6 l6 valign">\
                <label>Remarks</label>\
                <select class="browser-default" name="cull_reason[]">\
                   <option value="" disabled selected>Choose your option</option>\
                   <option value="Sickness">Sickness</option>\
                   <option value="Unproductive">Unproductive</option>\
                   <option value="Off-colored">Off-colored</option>\
                </select>\
              </div>\
            </div>\
          ');

          $("#mortality_form").append('\
            <div class="row valign-wrapper">\
              <div class="col s6 l6 m6 valign">\
                <input name="mortality[]" type="checkbox" id="'+data.id+'" value="'+data.animal_id+'"/>\
                <label for="'+data.id+'">'+data.registryid+'</label>\
              </div>\
              <div class="col s12 m6 l6 valign">\
                <label>Remarks</label>\
                <select class="browser-default" name="mort_reason[]">\
                   <option value="" disabled selected>Choose your option</option>\
                   <option value="Sickness">Sickness</option>\
                   <option value="Trauma - Natural">Trauma - Natural</option>\
                   <option value="Trauma - Predatory">Trauma - Predatory</option>\
                </select>\
              </div>\
            </div>\
          ');

        });
      }
    });
  });

});
