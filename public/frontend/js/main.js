	// Preloader Start
	var AUTOFIREBOX = {};
	var $window = $(window);

	AUTOFIREBOX.preloader = function () {
	    $("#load").fadeOut();
	    $('#pre-loader').delay(0).fadeOut('slow');
	};

	$window.on("load", function () {
	    AUTOFIREBOX.preloader();
	}); // Preloader End



	// scrollToTop
	var btn = $('#button');

	$(window).scroll(function () {
	    if ($(window).scrollTop() > 200) {
	        btn.addClass('show');
	    } else {
	        btn.removeClass('show');
	    }
	});

	btn.on('click', function (e) {
	    e.preventDefault();
	    $('html, body').animate({
	        scrollTop: 0
	    }, '300');
	});
	//end scrollToTop

	//fot counter
	$('.counter').each(function () {
	    var $this = $(this),
	        countTo = $this.attr('data-count');

	    $({
	        countNum: $this.text()
	    }).animate({
	            countNum: countTo
	        },

	        {

	            duration: 6000,
	            easing: 'linear',
	            step: function () {
	                $this.text(Math.floor(this.countNum));
	            },
	            complete: function () {
	                $this.text(this.countNum);
	                //alert('finished');
	            }

	        });

	});



	//    MOBILE MENU

	$(document).ready(function () {
	    $("#mobile-click").click(function () {
	        $(".mobile-menu").toggleClass("add-class");
	    });

	    $("#mobile-cross").click(function () {
	        $(".mobile-menu").removeClass("add-class");
	    });
	});

    $(document).ready(function(){
       $(window).scroll(function() {
            $('.header-section').toggleClass('window_nav_bg', $(this).scrollTop() > 150);
            

        }); 
    });



$(document).ready(function () {
    $('#sort').click(function () {
        $('.category-left').toggleClass('sort_medicine');
    });

});


$(document).ready(function () {
    $('#ud-mobile-btn').click(function () {
        $('.mobile-user-dashboard').addClass('mud-add');
        $("body").addClass('hover-body');
    });

    $('#mud-close-btn').click(function () {
        $('.mobile-user-dashboard').removeClass('mud-add');
    });
});



