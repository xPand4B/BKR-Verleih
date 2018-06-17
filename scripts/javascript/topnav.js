// Desktop View - Scrolling
$(window).on('scroll', function(){
    if($(window).scrollTop()){
        $('nav').addClass('scrolled');
    }else{
        $('nav').removeClass('scrolled');
    }
})

// Onclick Menu Icon
function mobileNav(pageName) {
	pageName.classList.toggle("change");
	// Menu Toggle - Mobile
	$("nav.topnav ul").toggleClass('showing');
}
