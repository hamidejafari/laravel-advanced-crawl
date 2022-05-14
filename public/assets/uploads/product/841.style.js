// menu mobile
function openNav() {
	document.getElementById("mySidenav").style.width = "100%";
}
function closeNav() {
	document.getElementById("mySidenav").style.width = "0";
}

// scrolled
$(function () {
  var header = $(".menu");
  $(window).scroll(function () {
    var scroll = $(window).scrollTop();
    if (scroll >= 50) {
      header.addClass("scrolled");
    } else {
      header.removeClass("scrolled");
    }
  });
});

(function($){
	$('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
	    if (!$(this).next().hasClass('show')) {
		    $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
	    }
	    var $subMenu = $(this).next(".dropdown-menu");
	    $subMenu.toggleClass('show');

	    $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
	       $('.dropdown-submenu .show').removeClass("show");
	    });

	    return false;
	});
})(jQuery)