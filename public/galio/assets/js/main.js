/*global jQuery */
(function ($) {
	"use strict";

	var $window = $(window);
	$window.on('scroll', function () {
        // Sticky menu 
		var scroll = $window.scrollTop();
		if (scroll < 300) {
			$(".sticky").removeClass("is-sticky");
		} else {
			$(".sticky").addClass("is-sticky");
		}
        
        // Scroll To Top
		if ($(this).scrollTop() > 600) {
			$('.scroll-top').removeClass('not-visible');
		} else {
			$('.scroll-top').addClass('not-visible');
		}
	});

	// slide effect dropdown
	function dropdownAnimation() {
		$('.dropdown').on('show.bs.dropdown', function (e) {
			$(this).find('.dropdown-menu').first().stop(true, true).slideDown(500);
		});

		$('.dropdown').on('hide.bs.dropdown', function (e) {
			$(this).find('.dropdown-menu').first().stop(true, true).slideUp(500);
		});
	}
	dropdownAnimation();

	// mini cart toggler
	$(".mini-cart-btn").on("click", function (event) {
		event.stopPropagation();
		event.preventDefault();
		$(".cart-list").slideToggle();
	});

	// responsive menu js
	jQuery('#mobile-menu').meanmenu({
		meanMenuContainer: '.mobile-menu',
		meanScreenWidth: "991"
	});

	// tooltip active js
	$('[data-toggle="tooltip"]').tooltip();

	//  Category Menu
	/*-- Variables --*/
	var categoryToggleWrap = $('.category-toggle-wrap');
	var categoryToggle = $('.category-toggle');
	var categoryMenu = $('.category-menu');

	/*-- Category Menu Toggles --*/
	function categorySubMenuToggle() {
		var screenSize = $window.width();
		if (screenSize <= 991) {
			$('.category-menu .menu-item-has-children > a').prepend('<span class="expand menu-expand"></span>');
			$('.category-menu .menu-item-has-children ul').slideUp();
		} else {
			$('.category-menu .menu-item-has-children > a .menu-expand').remove();
			$('.category-menu .menu-item-has-children ul').slideDown();
		}
	}
	
	$(window).on({
		load: function(){
			categorySubMenuToggle();
		},
		resize: function(){
			categorySubMenuToggle();
		}
	});

	categoryToggle.on('click', function () {
		categoryMenu.slideToggle();
	});

	// Category Sub Menu
	$('.category-menu').on('click', 'li a, li a .menu-expand', function (e) {
		var $a = $(this).hasClass('menu-expand') ? $(this).parent() : $(this);
		if ($a.parent().hasClass('menu-item-has-children')) {
			if ($a.attr('href') === '#' || $(this).hasClass('menu-expand')) {
				if ($a.siblings('ul:visible').length > 0) $a.siblings('ul').slideUp();
				else {
					$(this).parents('li').siblings('li').find('ul:visible').slideUp();
					$a.siblings('ul').slideDown();
				}
			}
		}
		if ($(this).hasClass('menu-expand') || $a.attr('href') === '#') {
			e.preventDefault();
			return false;
		}
	});

	// Hero main slider active js
	$('.hero-slider-active').slick({
		autoplay: false,
		infinite: true,
		fade: true,
		dots: true,
		arrows: false,
		prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
		nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',
		responsive: [
			{
				breakpoint: 768,
				settings: {
					arrows: false,
				}
			},
			{
				breakpoint: 480,
				settings: {
					dots: false,
				}
			},
		]
	});

	// deal carousel active js
	$('.deals-carousel-active').slick({
		autoplay: false,
		infinite: true,
		fade: false,
		dots: false,
		arrows: true,
		prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
		nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',
		appendArrows: ".slick-append",
		responsive: [{
				breakpoint: 992,
				settings: {
					slidesToShow: 2,
				}
			},
			{
				breakpoint: 480,
				settings: {
					slidesToShow: 1,
				}
			},
		]
	});

	// deal carousel active js
	$('.deals-carousel-active2').each(function () {
		var $this = $(this);
		var $arrowContainer = $(this).siblings('.section-title-2').find('.category-append');
		var $row = $this.attr("data-row") ? parseInt($this.attr("data-row"), 10) : 1;
		$this.slick({
			infinite: true,
			arrows: true,
			dots: false,
			slidesToShow: 2,
			slidesToScroll: 1,
			rows: $row,
			prevArrow: '<button class="slick-prev"><i class="fa fa-angle-left"></i></button>',
			nextArrow: '<button class="slick-next"><i class="fa fa-angle-right"></i></button>',
			appendArrows: $arrowContainer,
			responsive: [{
				breakpoint: 480,
				settings: {
					slidesToShow: 1,
				}
			}, ]
		});
	});

	// blog carousel active js
	$('.blog-carousel-active').each(function () {
		var $this = $(this);
		var $arrowContainer = $(this).siblings('.section-title-2').find('.category-append');
		var $row = $this.attr("data-row") ? parseInt($this.attr("data-row"), 10) : 1;
		$this.slick({
			infinite: true,
			arrows: true,
			dots: false,
			slidesToShow: 1,
			slidesToScroll: 1,
			rows: $row,
			prevArrow: '<button class="slick-prev"><i class="fa fa-angle-left"></i></button>',
			nextArrow: '<button class="slick-next"><i class="fa fa-angle-right"></i></button>',
			appendArrows: $arrowContainer
		});
	});

	// category Carousel For 3 row
	$('.category-carousel-active').each(function () {
		var $this = $(this);
		var $arrowContainer = $(this).siblings('.section-title-2').find('.category-append');
		var $row = $this.attr("data-row") ? parseInt($this.attr("data-row"), 10) : 1;
		$this.slick({
			infinite: true,
			arrows: true,
			dots: false,
			slidesToShow: 1,
			slidesToScroll: 1,
			rows: $row,
			prevArrow: '<button class="slick-prev"><i class="fa fa-angle-left"></i></button>',
			nextArrow: '<button class="slick-next"><i class="fa fa-angle-right"></i></button>',
			appendArrows: $arrowContainer,
			responsive: [{
					breakpoint: 992,
					settings: {
						slidesToShow: 2,
						rows: 3,
					}
				},
				{
					breakpoint: 576,
					settings: {
						slidesToShow: 1,
						rows: 3,
					}
				},
			]
		});
	});

	// featured category carousel active js
	$('.featured-carousel-active').slick({
		autoplay: false,
		infinite: true,
		fade: false,
		dots: false,
		arrows: true,
		prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
		nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',
		slidesToShow: 4,
		responsive: [{
				breakpoint: 1200,
				settings: {
					slidesToShow: 3,
				}
			},
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 2,
				}
			},
			{
				breakpoint: 480,
				settings: {
					slidesToShow: 1,
					arrows: false,
				}
			},
		]
	});

	// featured category carousel for 2 rows active js
	$('.featured-carousel-active2').each(function () {
		var $this = $(this);
		var $row = $this.attr("data-row") ? parseInt($this.attr("data-row"), 10) : 1;
		$this.slick({
			infinite: true,
			arrows: true,
			dots: false,
			slidesToShow: 4,
			slidesToScroll: 1,
			rows: $row,
			prevArrow: '<button class="slick-prev"><i class="fa fa-angle-left"></i></button>',
			nextArrow: '<button class="slick-next"><i class="fa fa-angle-right"></i></button>',
			responsive: [{
					breakpoint: 1200,
					settings: {
						slidesToShow: 3,
					}
				},
				{
					breakpoint: 768,
					settings: {
						slidesToShow: 2,
					}
				},
				{
					breakpoint: 480,
					settings: {
						slidesToShow: 1,
						arrows: false,
					}
				},
			]
		});
	});

	// latest product carousel active js
	$('.latest-product-active').slick({
		autoplay: false,
		infinite: true,
		fade: false,
		dots: false,
		arrows: true,
		prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
		nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',
		slidesToShow: 5,
		responsive: [{
				breakpoint: 992,
				settings: {
					slidesToShow: 3,
				}
			},
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 2,
				}
			},
			{
				breakpoint: 480,
				settings: {
					slidesToShow: 1,
				}
			},
		]
	});

	// testimonial carousel active js
	$('.testimonial-carousel-active').slick({
		autoplay: false,
		infinite: true,
		fade: false,
		dots: true,
		arrows: false,
		slidesToShow: 1
	});

	// brand slider active js
	var brand = $('.brand-active');
	brand.slick({
		infinite: true,
		arrows: true,
		autoplay: true,
		speed: 1000,
		pauseOnFocus: false,
		pauseOnHover: false,
		slidesToShow: 5,
		prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
		nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',
		responsive: [{
				breakpoint: 992,
				settings: {
					slidesToShow: 4,
				}
			},
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 3,
					arrows: false,
				}
			},
			{
				breakpoint: 575,
				settings: {
					slidesToShow: 2,
					arrows: false,
				}
			},
			{
				breakpoint: 479,
				settings: {
					slidesToShow: 1,
					arrows: false,
				}
			},
		]
	});

	// latest blog carousel active js
	$('.blog-carousel-active2').slick({
		autoplay: false,
		infinite: true,
		fade: false,
		dots: false,
		arrows: true,
		prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
		nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',
		slidesToShow: 4,
		responsive: [{
				breakpoint: 991,
				settings: {
					slidesToShow: 3,
				}
			},
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 2,
				}
			},
			{
				breakpoint: 480,
				settings: {
					slidesToShow: 1,
				}
			},
		]
	});

	// blog carousel active js
	$('.blog-carousel-active3').each(function () {
		var $this = $(this);
		var $arrowContainer = $(this).siblings('.section-title-2').find('.category-append');
		var $row = $this.attr("data-row") ? parseInt($this.attr("data-row"), 10) : 1;
		$this.slick({
			infinite: true,
			arrows: true,
			dots: false,
			slidesToShow: 2,
			slidesToScroll: 1,
			rows: $row,
			prevArrow: '<button class="slick-prev"><i class="fa fa-angle-left"></i></button>',
			nextArrow: '<button class="slick-next"><i class="fa fa-angle-right"></i></button>',
			appendArrows: $arrowContainer,
			responsive: [{
				breakpoint: 480,
				settings: {
					slidesToShow: 1,
				}
			}, ]
		});
	});

	// prodct details slider active
	$('.product-large-slider').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		fade: true,
		arrows: true,
		asNavFor: '.pro-nav',
		prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
		nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',
	});

	// product details slider nav active
	$('.pro-nav').slick({
		slidesToShow: 4,
		slidesToScroll: 1,
		asNavFor: '.product-large-slider',
		centerMode: true,
		arrows: true,
		centerPadding: 0,
		focusOnSelect: true,
		prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
		nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>'
	});

	// prodct details slider active
	$('.product-box-slider').slick({
		autoplay: false,
		infinite: true,
		fade: false,
		dots: false,
		arrows: true,
		prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
		nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',
		slidesToShow: 3,
		responsive: [{
				breakpoint: 768,
				settings: {
					slidesToShow: 2,
				}
			},
			{
				breakpoint: 480,
				settings: {
					slidesToShow: 1,
				}
			},
		]
	});

	// blog gallery slider
	var gallery = $('.blog-gallery-slider');
	gallery.slick({
		arrows: true,
		autoplay: true,
		autoplaySpeed: 5000,
		pauseOnFocus: false,
		pauseOnHover: false,
		fade: true,
		dots: false,
		infinite: true,
		slidesToShow: 1,
		prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
		nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>'
	});

	// image zoom effect
	$('.img-zoom').zoom();

	// quantity change js
    var proQty = $('.pro-qty');
	proQty.prepend('<span class="dec qtybtn">-</span>');
	proQty.append('<span class="inc qtybtn">+</span>');
	proQty.on('click', '.qtybtn', function () {
		var $button = $(this);
		var oldValue = $button.parent().find('input').val();
		if ($button.hasClass('inc')) {
			var newVal = parseFloat(oldValue) + 1;
		} else {
			// Don't allow decrementing below zero
			if (oldValue > 0) {
				var newVal = parseFloat(oldValue) - 1;
			} else {
				newVal = 0;
			}
		}
		$button.parent().find('input').val(newVal);
	});

	// nice select active js
	// $('select').niceSelect();

	// modal fix
	$('.modal').on('shown.bs.modal', function (e) {
        e.preventDefault();
		$('.pro-nav').resize();
	});

	// pricing filter
	var rangeSlider = $(".price-range"),
		amount = $("#amount"),
		minPrice = rangeSlider.data('min'),
		maxPrice = rangeSlider.data('max');
	rangeSlider.slider({
		range: true,
		min: minPrice,
		max: maxPrice,
		values: [minPrice, maxPrice],
		slide: function (event, ui) {
			amount.val("$" + ui.values[0] + " - $" + ui.values[1]);
		}
	});
	amount.val(" $" + rangeSlider.slider("values", 0) +
		" - $" + rangeSlider.slider("values", 1));

	// product view mode change js
	$('.product-view-mode').on('click', 'a', function (e) {
		e.preventDefault();
		var shopProductWrap = $('.shop-product-wrap');
		var viewMode = $(this).data('target');
		$('.product-view-mode a').removeClass('active');
		$(this).addClass('active');
		shopProductWrap.removeClass('grid list').addClass(viewMode);
	});

	// Checkout Page accordion
	$("#create_pwd").on("change", function () {
		$(".account-create").slideToggle("100");
	});

	$("#ship_to_different").on("change", function () {
		$(".ship-to-different").slideToggle("100");
	});

	// Payment Method Accordion
	$('input[name="paymentmethod"]').on('click', function () {
		var $value = $(this).attr('value');
		$('.payment-method-details').slideUp();
		$('[data-method="' + $value + '"]').slideDown();
	});

	// scroll to top
	$('body').on('click', '.scroll-top', function (e) {
        e.preventDefault();
		$('html,body').animate({
			scrollTop: 0
		}, 1000);
	});

	// Mailchimp for dynamic newsletter
	$('#mc-form').ajaxChimp({
		language: 'en',
		callback: mailChimpResponse,
		// ADD YOUR MAILCHIMP URL BELOW HERE!
		url: 'https://company.us19.list-manage.com/subscribe/post?u=2f2631cacbe4767192d339ef2&amp;id=24db23e68a'

	});

	// mailchimp active js
	function mailChimpResponse(resp) {
		if (resp.result === 'success') {
			$('.mailchimp-success').html('' + resp.msg).fadeIn(900);
			$('.mailchimp-error').fadeOut(400);

		} else if (resp.result === 'error') {
			$('.mailchimp-error').html('' + resp.msg).fadeIn(900);
		}
	}

	// google map
	var map_id = $('#map_content');
	if (map_id.length > 0) {
		var $lat = parseFloat(map_id.data('lat')),
			$lng = parseFloat(map_id.data('lng')),
			$zoom = map_id.data('zoom'),
			$maptitle = map_id.data('maptitle'),
			$mapaddress = map_id.data('mapaddress'),
			mymap = L.map('map_content').setView([$lat, $lng], $zoom);
			
			L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
			attribution: 'Map',
			tileSize: 512,
			maxZoom: 18,
			zoomOffset: -1,
			id: 'mapbox/streets-v11',
			accessToken: 'pk.eyJ1IjoiY3Jpc3RpYW5jYTE1NTQiLCJhIjoiY2ttbmtmbnU5MDgwbzJvbGhycnhyb2lnbCJ9.lyVChARjuCj-saQixP9YKw'
			}).addTo(mymap);
			var myIcon = L.icon({
				iconUrl: 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABkAAAApCAYAAADAk4LOAAAFgUlEQVR4Aa1XA5BjWRTN2oW17d3YaZtr2962HUzbDNpjszW24mRt28p47v7zq/bXZtrp/lWnXr337j3nPCe85NcypgSFdugCpW5YoDAMRaIMqRi6aKq5E3YqDQO3qAwjVWrD8Ncq/RBpykd8oZUb/kaJutow8r1aP9II0WmLKLIsJyv1w/kqw9Ch2MYdB++12Onxee/QMwvf4/Dk/Lfp/i4nxTXtOoQ4pW5Aj7wpici1A9erdAN2OH64x8OSP9j3Ft3b7aWkTg/Fm91siTra0f9on5sQr9INejH6CUUUpavjFNq1B+Oadhxmnfa8RfEmN8VNAsQhPqF55xHkMzz3jSmChWU6f7/XZKNH+9+hBLOHYozuKQPxyMPUKkrX/K0uWnfFaJGS1QPRtZsOPtr3NsW0uyh6NNCOkU3Yz+bXbT3I8G3xE5EXLXtCXbbqwCO9zPQYPRTZ5vIDXD7U+w7rFDEoUUf7ibHIR4y6bLVPXrz8JVZEql13trxwue/uDivd3fkWRbS6/IA2bID4uk0UpF1N8qLlbBlXs4Ee7HLTfV1j54APvODnSfOWBqtKVvjgLKzF5YdEk5ewRkGlK0i33Eofffc7HT56jD7/6U+qH3Cx7SBLNntH5YIPvODnyfIXZYRVDPqgHtLs5ABHD3YzLuespb7t79FY34DjMwrVrcTuwlT55YMPvOBnRrJ4VXTdNnYug5ucHLBjEpt30701A3Ts+HEa73u6dT3FNWwflY86eMHPk+Yu+i6pzUpRrW7SNDg5JHR4KapmM5Wv2E8Tfcb1HoqqHMHU+uWDD7zg54mz5/2BSnizi9T1Dg4QQXLToGNCkb6tb1NU+QAlGr1++eADrzhn/u8Q2YZhQVlZ5+CAOtqfbhmaUCS1ezNFVm2imDbPmPng5wmz+gwh+oHDce0eUtQ6OGDIyR0uUhUsoO3vfDmmgOezH0mZN59x7MBi++WDL1g/eEiU3avlidO671bkLfwbw5XV2P8Pzo0ydy4t2/0eu33xYSOMOD8hTf4CrBtGMSoXfPLchX+J0ruSePw3LZeK0juPJbYzrhkH0io7B3k164hiGvawhOKMLkrQLyVpZg8rHFW7E2uHOL888IBPlNZ1FPzstSJM694fWr6RwpvcJK60+0HCILTBzZLFNdtAzJaohze60T8qBzyh5ZuOg5e7uwQppofEmf2++DYvmySqGBuKaicF1blQjhuHdvCIMvp8whTTfZzI7RldpwtSzL+F1+wkdZ2TBOW2gIF88PBTzD/gpeREAMEbxnJcaJHNHrpzji0gQCS6hdkEeYt9DF/2qPcEC8RM28Hwmr3sdNyht00byAut2k3gufWNtgtOEOFGUwcXWNDbdNbpgBGxEvKkOQsxivJx33iow0Vw5S6SVTrpVq11ysA2Rp7gTfPfktc6zhtXBBC+adRLshf6sG2RfHPZ5EAc4sVZ83yCN00Fk/4kggu40ZTvIEm5g24qtU4KjBrx/BTTH8ifVASAG7gKrnWxJDcU7x8X6Ecczhm3o6YicvsLXWfh3Ch1W0k8x0nXF+0fFxgt4phz8QvypiwCCFKMqXCnqXExjq10beH+UUA7+nG6mdG/Pu0f3LgFcGrl2s0kNNjpmoJ9o4B29CMO8dMT4Q5ox8uitF6fqsrJOr8qnwNbRzv6hSnG5wP+64C7h9lp30hKNtKdWjtdkbuPA19nJ7Tz3zR/ibgARbhb4AlhavcBebmTHcFl2fvYEnW0ox9xMxKBS8btJ+KiEbq9zA4RthQXDhPa0T9TEe69gWupwc6uBUphquXgf+/FrIjweHQS4/pduMe5ERUMHUd9xv8ZR98CxkS4F2n3EUrUZ10EYNw7BWm9x1GiPssi3GgiGRDKWRYZfXlON+dfNbM+GgIwYdwAAAAASUVORK5CYII='
		})
		var marker = L.marker([$lat, $lng], {icon: myIcon}).addTo(mymap);
		
		marker.bindPopup('<b>' + $maptitle + '</b><br>' + $mapaddress).openPopup();
		mymap.scrollWheelZoom.disable();

		
	}

}(jQuery));