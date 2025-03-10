$(document).ready(function() {
    $('.flip').click(function() {
      var dropdown = $(this).parent();
      dropdown.toggleClass('active');
      dropdown.find('.panel').slideToggle();
    });
  });
$(document).ready(function() {
    $('.flip-sort').click(function() {
      var dropdown = $(this).parent();
      dropdown.toggleClass('active');
      dropdown.find('.panel-sort').slideToggle();
    });
  });