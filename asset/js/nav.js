function showSidebar() {
    $('.sidebar').css('display', 'flex').css('transform', 'translateX(0)');
    $('#overlay').css('display', 'block');
    $('body').css('overflow', 'hidden'); 
}

function hideSidebar() {
    $('.sidebar').css('transform', 'translateX(-100%)');
    setTimeout(() => {
        $('.sidebar').css('display', 'none');
        $('#overlay').css('display', 'none');
        $('body').css('overflow', '');
    }, 300);
}

$(document).ready(function () {
    $(".filterbutton").on("click", function () {
        $(".custom-sidebar").addClass("active"); 
        $("#overlay").fadeIn(); 
    });

    $("#overlay").on("click", function () {
        $(".custom-sidebar").removeClass("active"); 
        $(this).fadeOut();
    });
});

$(document).ready(function () {
    $(".cartbutton").on("click", function () {
        $(".custom-sidebar-cart").addClass("active");
        $("#overlay").fadeIn();
        $("body").addClass("lock-scroll"); 
    });

    $("#overlay").on("click", function () {
        $(".custom-sidebar-cart").removeClass("active");
        $(this).fadeOut();
        $("body").removeClass("lock-scroll"); 
    });
});

function hideSidebarcart() {
    $(".custom-sidebar-cart").removeClass("active"); 
    $("body").removeClass("lock-scroll"); 
    $("#overlay").fadeOut();
}

$(document).ready(function () {
    let scrollList = $(".scroll-list");
    if (localStorage.getItem("scrollX")) {
        scrollList.scrollLeft(localStorage.getItem("scrollX"));
    }
    $(".button-choose a").click(function () {
        localStorage.setItem("scrollX", scrollList.scrollLeft());
    });
});