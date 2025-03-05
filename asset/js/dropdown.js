$(document).ready(function() {
    $('.flip').click(function() {
      var dropdown = $(this).parent();
      dropdown.toggleClass('active');
      dropdown.find('.panel').slideToggle();
    });
  });