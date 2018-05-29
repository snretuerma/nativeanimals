$(document).ready(function()
{
  $("#number_male").val(0);
  $("#number_female").val(0);
  $("#total").val(0);
  function updateTotal()
  {
      var male_qty = 0;
      var female_qty = 0;

      male_qty = parseInt($("#number_male").val());
      female_qty =  parseInt($("#number_female").val());
      var total = (male_qty + female_qty);
      $("#total").val(total);
  }
  $(document).on("change, keyup", "#number_male, #number_female", updateTotal);
});
