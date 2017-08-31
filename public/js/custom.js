// Admin home page js
$('.button-collapse').sideNav({
    menuWidth: 300, // Default is 300
    edge: 'left', // Choose the horizontal origin
    closeOnClick: false, // Closes side-nav on <a> clicks, useful for Angular/Meteor
    draggable: false, // Choose whether you can drag to open on touch screens,
  });

function addDetails() {
  var x = document.getElementById('farmdetails');
  if (x.style.display === 'none') {
    x.style.display = 'block';
  } else {
    x.style.display = 'none';
  }
}

function success() {
  var x = document.getElementById('farmdetails');
  if (x.style.display == 'block') {
    x.style.display = 'none';
  } else {
    x.style.display = 'block';
  }
}

$(document).ready(function(){
    $('.slider').slider();
});

$(document).ready(function(){
  $('ul.tabs').tabs();
});