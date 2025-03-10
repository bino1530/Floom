$(document).ready(function() {
    const header = $('.header-off'); 
    let lastScrollY = $(window).scrollTop(); 

    $(window).on('scroll', function() {
        const currentScrollY = $(this).scrollTop(); 
        if (currentScrollY > lastScrollY) {
            header.addClass('hidden'); 
        } else {
            header.removeClass('hidden'); 
        }
        lastScrollY = currentScrollY; 
    });
    $('.dropdown-btn > a').click(function(e) {
        e.preventDefault(); 
        $('.dropdownMenu').stop().slideToggle(500); 
    });

    $(document).click(function(event) {
        if (!$(event.target).closest('.dropdown-btn').length) {
            $('.dropdownMenu').slideUp(500); 
        }
    });
});
