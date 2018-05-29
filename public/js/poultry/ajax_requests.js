function getUrlParts(url) {
    var a = document.createElement('a');
    a.href = url;

    return {
        href: a.href,
        host: a.host,
        hostname: a.hostname,
        port: a.port,
        pathname: a.pathname,
        protocol: a.protocol,
        hash: a.hash,
        search: a.search
    };
}

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

  // page = addanimalstocreatedfamily
  $("#add_male_button").click(function (event) {
    event.preventDefault();
    var family_id = $("#add_male_button").data("family_id");
    var url = window.location.href;
    $("#male_modal_content").empty();
    $.ajax({
      url:  url+'/get_male',
      type: 'GET',
      cache: false,
      data: {family_id},
      success: function(data)
      {
        if(data.length > 0){
          data.forEach(function(data){
            $("#male_modal_content").append('\
              <div class="col 12 m6 l6">\
                <input name="animals[]" value="'+data.id+'" type="checkbox" class="filled-in" id="'+data.id+'" />\
                <label for="'+data.id+'">'+data.registryid+'</label>\
              </div>\
            ');
          });
        }else{
          $("#male_modal_content").append('\
            <div class="center">No Avalilable Males to Add</div>\
          ');
        }
      },
      error: function (xhr) {
        console.log(xhr.statusText);
      }
    });
  });
  

});
