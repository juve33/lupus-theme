/**
 * @param {boolean} condition The condition under which the navigation becomes sticky
 */
function nav_stickyness(condition) {
	if (condition){  
		$('nav').addClass("sticky");
	}
	else{
		$('nav').removeClass("sticky");
	}
}



$(document).ready(function() {
	nav_stickyness(($(this).scrollTop() > 128) || ($('body').scrollTop() > 128));

	if ($('.horizontal').length > 0) {
		let numberOfItems = $('.horizontal > .wp-block-group__inner-container > .wp-block-group').children().length;

		$('.horizontal').css({'--number-of-items': numberOfItems, '--width': $('.horizontal').outerWidth() + 'px'});
		$('.horizontal').attr('itemHeight', $('.horizontal').children().outerHeight());

		$(window).on('resize', function() {
			$('.horizontal').css({'--number-of-items': numberOfItems, '--width': $('.horizontal').outerWidth() + 'px'});
			$('.horizontal').attr('itemHeight', $('.horizontal').children().outerHeight());
		});

		horizontalScroll();

		$(window).on('scroll', function() {
			nav_stickyness($(this).scrollTop() > 128);
			horizontalScroll();
		});

		$('body').on('scroll', function() {
			nav_stickyness($(this).scrollTop() > 128);
			horizontalScroll();
		});
	}
	else {
		$(window).on('scroll', function() {
			nav_stickyness($(this).scrollTop() > 128);
		});
	
		$('body').on('scroll', function() {
			nav_stickyness($(this).scrollTop() > 128);
		});
	}
});



$(document).ready(function() {

	$('.hamburger-icon').on('click', function() {
		$('nav').toggleClass("open");
		$('.navigation li.open').removeClass("open");
	});

});



$(document).ready(function() {

	$('nav .navigation .menu-item-has-children').on('click', function() {
		$(this).toggleClass("open");
		$('nav, .navigation li.open').not(this).removeClass("open");
	});

});



$(document).ready(function() {

	$('nav .hamburger-menu .menu-item-has-children').on('click', function() {
		$(this).toggleClass("open");
	});

});



$(document).ready(function() {

	$('nav .navigation .menu-item-has-children').on('mouseenter', function() {
		$('.navigation li.open').not(this).removeClass("open");
	});

});



$(document).ready(function() {
	while ($('.background-message-field').length > 0) {

		let container_container = document.createElement('div');
		container_container.setAttribute('class', 'background-message__container__container');
		container_container.setAttribute('aria-hidden', true);
		let container = document.createElement('div');
		container.setAttribute('class', 'background-message__container');
		let line = document.createElement('div');
		line.setAttribute('class', 'background-message__line');
		let line_inner = document.createElement('div');
		line_inner.setAttribute('class', 'background-message__line__inner');

		i = 0;
		while ((line_inner.innerHTML.length < 60) || ((i % 2) == 0)) {
			line_inner.innerHTML += $('.background-message-field').html() + '&#160;';
			i++;
		}

		for (let i = 0; i < 2; i++) {
			line.append(line_inner.cloneNode(true));
		}

		for (let i = 0; i < 3; i++) {
			container.append(line.cloneNode(true));
		}

		for (let i = 0; i < 3; i++) {
			container_container.append(container.cloneNode(true));
		}
		
		$('.wp-block-group:has(.background-message-field)').first().append(container_container);

		$('.background-message-field').first().remove();

	}
});



$(document).ready(function() {
	$('[href="#"]').removeAttr("href");
	$('nav .menu-item-has-children a').not('.sub-menu a').removeAttr("href");
});



function horizontalScroll() {
	let scrollStatePixel = -$('.horizontal').offset().top + $('nav').offset().top + $('nav').outerHeight() - 1;

	let scrollStatePercentage = 100 * scrollStatePixel / ($('.horizontal').outerHeight() - $('.horizontal').attr('itemHeight'));

	if (scrollStatePercentage > 0) {
		$('.horizontal > .wp-block-group__inner-container').css('--left', '-' + Math.min(scrollStatePercentage, 100) + '%');
	}
	else {
		$('.horizontal > .wp-block-group__inner-container').css('--left', '0%');
	}
}



$(document).ready(function() {
	if ($('.horizontal').length > 0) {
		let numberOfItems = $('.horizontal > .wp-block-group__inner-container > .wp-block-group').children().length;

		$('.horizontal').css({'--number-of-items': numberOfItems, '--width': $('.horizontal').outerWidth() + 'px'});
		$('.horizontal').attr('itemHeight', $('.horizontal').children().outerHeight());

		$(window).on('resize', function() {
			$('.horizontal').css({'--number-of-items': numberOfItems, '--width': $('.horizontal').outerWidth() + 'px'});
			$('.horizontal').attr('itemHeight', $('.horizontal').children().outerHeight());
		});

		horizontalScroll();

		$(window).on('scroll', function() {
			horizontalScroll();
		});

		$('body').on('scroll', function() {
			horizontalScroll();
		});
	}
});