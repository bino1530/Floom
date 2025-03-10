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

function toggleShopDropdown() {
    $('#shop-dropdown').toggle();
}

function toggleShopDropdownSidebar() {
    $('#shop-dropdown-sidebar').toggle();
}
