$(document).ready(function(){
    $('.profile_content_layout').hide();  
    $('#dashboard').show();  
    $('.profile_box li:first-child a').addClass('active');  
    $('.profile_box a').click(function(event){
        if ($(this).attr('name') !== 'logout') {
            event.preventDefault(); 
            var index = $(this).parent().index();
            $('.profile_box a').removeClass('active');  
            $(this).addClass('active');
            $('.profile_content_layout').hide();
            $('.profile_content_layout').eq(index).show();
        }
    });
});
$(document).ready(function () {
    $('.season-flowers[data-season="evergreen"]').addClass('active');
    $('.season-buttons button').click(function () {
      const season = $(this).data('season');
      $('.season-flowers').removeClass('active').hide();
      $(`.season-flowers[data-season="${season}"]`).addClass('active').fadeIn();
    });
  });
