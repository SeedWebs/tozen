/* skip-link-focus-fix.js - https://git.io/vWdr2 */
!function(){var e=navigator.userAgent.toLowerCase().indexOf("webkit")>-1,t=navigator.userAgent.toLowerCase().indexOf("opera")>-1,n=navigator.userAgent.toLowerCase().indexOf("msie")>-1;(e||t||n)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var e,t=location.hash.substring(1);/^[A-z0-9_-]+$/.test(t)&&(e=document.getElementById(t))&&(/^(?:a|select|input|button|textarea)$/i.test(e.tagName)||(e.tabIndex=-1),e.focus())},!1)}();

/* FitVids.JS */
!function(t){"use strict";t.fn.fitVids=function(e){var i={customSelector:null,ignore:null};if(!document.getElementById("fit-vids-style")){var r=document.head||document.getElementsByTagName("head")[0],a=document.createElement("div");a.innerHTML='<p>x</p><style id="fit-vids-style">.fluid-width-video-wrapper{width:100%;position:relative;padding:0;}.fluid-width-video-wrapper iframe,.fluid-width-video-wrapper object,.fluid-width-video-wrapper embed {position:absolute;top:0;left:0;width:100%;height:100%;}</style>',r.appendChild(a.childNodes[1])}return e&&t.extend(i,e),this.each(function(){var e=['iframe[src*="player.vimeo.com"]','iframe[src*="youtube.com"]','iframe[src*="youtube-nocookie.com"]','iframe[src*="kickstarter.com"][src*="video.html"]',"object","embed"];i.customSelector&&e.push(i.customSelector);var r=".fitvidsignore";i.ignore&&(r=r+", "+i.ignore);var a=t(this).find(e.join(","));(a=(a=a.not("object object")).not(r)).each(function(){var e=t(this);if(!(e.parents(r).length>0||"embed"===this.tagName.toLowerCase()&&e.parent("object").length||e.parent(".fluid-width-video-wrapper").length)){e.css("height")||e.css("width")||!isNaN(e.attr("height"))&&!isNaN(e.attr("width"))||(e.attr("height",9),e.attr("width",16));var i=("object"===this.tagName.toLowerCase()||e.attr("height")&&!isNaN(parseInt(e.attr("height"),10))?parseInt(e.attr("height"),10):e.height())/(isNaN(parseInt(e.attr("width"),10))?e.width():parseInt(e.attr("width"),10));if(!e.attr("name")){var a="fitvid"+t.fn.fitVids._count;e.attr("name",a),t.fn.fitVids._count++}e.wrap('<div class="fluid-width-video-wrapper"></div>').parent(".fluid-width-video-wrapper").css("padding-top",100*i+"%"),e.removeAttr("height").removeAttr("width")}})})},t.fn.fitVids._count=0}(window.jQuery||window.Zepto);


/* For all custom js codes. */
jQuery(document).ready(function($) { 


	// Add dropdown sub-menu for mobile
	$('.site-nav-m .menu-item-has-children').append('<i class="si-caret-down"></i>');
	$('.site-nav-m .menu-item-has-children > i').click(function () {                
		$(this).parent().toggleClass('active');        
	});

	// Add active for mobile toggle icon
	$('.site-toggle').click(function () {                
		$(this).toggleClass('active');
		$('.site-nav-m').toggleClass('active');
	});

	// Close menu (for One Page website)
	$('.site-nav-m a').click(function () {                
		$('.site-toggle, .site-nav-m').removeClass('active');
	});



	// Add active data list
	$('.data-list').click(function () {                
		$('.page-item-list').removeClass('active');
		$(this).closest('.page-item-list').addClass('active');
	});	




	// Responsive Video
	$('.container, .entry-content').fitVids();

	// Auto show Back to Top button in .seed-fixed-3
	if($('.seed-fixed-3').length != 0) { 
		$('.seed-fixed-3').fadeOut();
		$(window).on('scroll',function(){
			var showbutton = Math.round($(window).scrollTop());
			if (showbutton > 400) {
				$('.seed-fixed-3').fadeIn();
			} else {
				$('.seed-fixed-3').fadeOut();
			}
		});
	}

	// For Overlay style
	$(window).on('scroll',function(){
		var stop = $(window).scrollTop();
		if (stop > 38) {
			$('.site-header').addClass('active');
		} else {
			$('.site-header').removeClass('active');
		}
	});



	// Slick.js
	var isSlickLoaded = (typeof $.fn.Slick !== 'undefined');
	if(isSlickLoaded) {

		$('.slick-col-1').slick({
			infinite: true,
			dots: true,
			nextArrow: '<a><i class="slick-next si-chevron-right"></i></a>',
			prevArrow: '<a><i class="slick-prev si-chevron-left"></i></a>',
			speed: 800
		});
		$('.slick-col-2').slick({
			infinite: true,
			dots: false,
			nextArrow: '<a><i class="slick-next si-chevron-right"></i></a>',
			prevArrow: '<a><i class="slick-prev si-chevron-left"></i></a>',
			speed: 500,
			mobileFirst: true,
			responsive: [{
				breakpoint: 992,
				settings: {
					slidesToShow: 2,
				}
			}, {
				breakpoint: 768,
				settings: {
					slidesToShow: 2,
				}
			}, {
				breakpoint: 300,
				settings: {
					slidesToShow: 1,
				}
			}]
		});
		$('.slick-col-3').slick({
			infinite: true,
			dots: false,
			nextArrow: '<a><i class="slick-next si-chevron-right"></i></a>',
			prevArrow: '<a><i class="slick-prev si-chevron-left"></i></a>',
			speed: 500,
			mobileFirst: true,
			responsive: [{
				breakpoint: 992,
				settings: {
					slidesToShow: 3,
				}
			}, {
				breakpoint: 768,
				settings: {
					slidesToShow: 2,
				}
			}, {
				breakpoint: 300,
				settings: {
					slidesToShow: 1,
				}
			}]
		});
		$('.slick-col-4').slick({
			infinite: true,
			dots: true,
			nextArrow: '<a><i class="slick-next si-chevron-right"></i></a>',
			prevArrow: '<a><i class="slick-prev si-chevron-left"></i></a>',
			speed: 500,
			mobileFirst: true,
			responsive: [{
				breakpoint: 992,
				settings: {
					slidesToShow: 4,
				}
			}, {
				breakpoint: 768,
				settings: {
					slidesToShow: 2,
				}
			}, {
				breakpoint: 300,
				settings: {
					slidesToShow: 1,
				}
			}]
		});
		$('.slick-col-5').slick({
			infinite: true,
			dots: true,
			nextArrow: '<a><i class="slick-next si-chevron-right"></i></a>',
			prevArrow: '<a><i class="slick-prev si-chevron-left"></i></a>',
			speed: 500,
			mobileFirst: true,
			responsive: [{
				breakpoint: 992,
				settings: {
					slidesToShow: 5,
				}
			}, {
				breakpoint: 768,
				settings: {
					slidesToShow: 2,
				}
			}, {
				breakpoint: 300,
				settings: {
					slidesToShow: 1,
				}
			}]
		});
		$('.slick-col-6').slick({
			infinite: true,
			dots: true,
			nextArrow: '<a><i class="slick-next si-chevron-right"></i></a>',
			prevArrow: '<a><i class="slick-prev si-chevron-left"></i></a>',
			speed: 500,
			mobileFirst: true,
			responsive: [{
				breakpoint: 992,
				settings: {
					slidesToShow: 6,
				}
			}, {
				breakpoint: 768,
				settings: {
					slidesToShow: 3,
				}
			}, {
				breakpoint: 300,
				settings: {
					slidesToShow: 2,
				}
			}]
		});
	}

	var isIE = /*@cc_on!@*/false || !!document.documentMode;
	if( isIE ){
		var body = document.getElementById("page");
		var innerDiv = document.createElement('div');
		
		body.appendChild(innerDiv);
		innerDiv.className = 'bg-ie';

		alert("Not Suport IE (ไม่รองรับ IE)");
	}
});










