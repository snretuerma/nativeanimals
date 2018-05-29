$(document).ready(function(){
  $("#generation").change(function (event) {
    event.preventDefault();
    $("#line").empty();
    var generation_id = $(this).find(':selected').data("genid");
    $.ajax({
      url: window.location.href+'/'+generation_id,
      type: 'GET',
      cache: false,
      data: {generation_id},
      success: function(data)
      {
        if(data.length > 0){
          data.forEach(function(data){
              $("#line").append('\
                <option data-lineid="'+data.id+'" value="'+data.id+'">'+data.number+'</option>\
              ');
          });
        }else{
          $("#line").append('\
            <option disabled selected>No Lines in this Generation</option>\
          ');
        }
      }
    });

    $("#line").removeAttr('disabled');
  });

  $("#line").change(function (e) {
    e.preventDefault();
    $("#family").empty();
    var line_id = $(this).find(':selected').data("lineid");
    $.ajax({
      url: window.location.href+'/line/'+line_id,
      type: 'GET',
      cache: false,
      data: {line_id},
      success: function(data)
      {

        if(data.length > 0){
          data.forEach(function(data){
              $("#family").append('\
                <option value="'+data.id+'">'+data.number+'</option>\
              ');
          });
        }else{
          $("#family").append('\
            <option disabled selected>No Families in this Line</option>\
          ');
        }


      }
    });
    $("#family").removeAttr('disabled');
  });


});
