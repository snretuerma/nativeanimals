$(document).ready(function(){

  // $('.modal-trigger').leanModal();
  $('select').material_select();

  $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15, // Creates a dropdown of 15 years to control year,
    today: 'Today',
    clear: 'Clear',
    close: 'Ok',
    closeOnSelect: false, // Close upon selecting a date,
    container: undefined, // ex. 'body' will append picker to body
    format: 'yyyy-mm-dd',
  });

  $('.modal').modal({
    dismissible: true, // Modal can be dismissed by clicking outside of the modal
    opacity: .5, // Opacity of modal background
    inDuration: 300, // Transition in duration
    outDuration: 200, // Transition out duration
    startingTop: '4%', // Starting top style attribute
    endingTop: '10%', // Ending top style attribute
  });

  $("#logoutbutton").click(function() {
    var logout = function(){
      location.href = "https://accounts.google.com/Logout?&continue=http://www.google.com/";
    }
  });
});
