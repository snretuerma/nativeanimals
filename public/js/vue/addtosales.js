$(document).ready(function(){
    $('.culled i').click(function(){
      var id = $(this).attr('data-id');
      $('#culled_modal_input').attr('value', id);
    });

    $('.sold i').click(function(){
      var id = $(this).attr('data-id');
      $('#sold_modal_input').attr('value', id);
    });
});
