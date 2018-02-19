$(document).ready(function(){
    $('.add_family_button').click(function(e){
      e.preventDefault();
      var id = $(this).attr('data-id');
      var registryid = $(this).attr('data-registryid');
      $('#modal_title').text("Add "+registryid+" to Family");
      $('#add_to_family_input').attr('value', id);
    });
});
