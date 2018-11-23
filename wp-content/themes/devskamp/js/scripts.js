/*
Theme Name: Materialize
Author: TrendyTheme
*/

/* ======= TABLE OF CONTENTS ================================== 
    # Preloader
    # Enable bootstrap tooltip
    # Detect IE version
    # jQuery for page scrolling feature - requires jQuery Easing plugin
    # Mobile Dropdown Menu
    # Dropdown menu offest
    # Sticky Menu
    # nav sticky header
    # Full screen menu
    # Search
    # Full height element
    # Device Carousel
    # Unwrap span from contact form 7
    # Datepicker
    # File Input Path
    # Tab class
    # Textrotator
    # Counter
    # Magnific Popup
    # Portfolio Individual Gallery
    # Masonry Grid
    # project carousel in digital agency demo
    # Recent Project Carousel
    # Partner Carousel
    # Featured Carousel
    # Latest Blog Carousel
    # Featured Service carousel
    # Gallery
    # Client Thumb Circle Style
    # Partner Carousel
    # Home slider
    # Portfolio filter
    # Portfolio Slider
    # Stellar for background scrolling
    # Flickr photo
    # Countdown
    # Login register form
    # Google Map
========================================================= */

jQuery(function ($) {

    'use strict';


    /* ======= Preloader ======= */
    (function () {
        $('#status').fadeOut();
        $('#preloader').delay(200).fadeOut('slow');
    }());


    /* ======= Enable bootstrap tooltip ======= */
    (function () {
        $('[data-toggle="tooltip"]').tooltip()
    }());

    /* ======= Enable material select style ======= */
    (function () {
        $('select').material_select();
    }());


    /* === Detect IE version === */
    (function () {
        
        function getIEVersion() {
            var match = navigator.userAgent.match(/(?:MSIE |Trident\/.*; rv:)(\d+)/);
            return match ? parseInt(match[1], 10) : false;
        }

        if( getIEVersion() ){
            $('html').addClass('ie'+getIEVersion());
        }

    }());


    /* === jQuery for page scrolling feature - requires jQuery Easing plugin === */
    (function () {
        $('.navbar-nav a[href^="#"], .tt-scroll, .tt-scroll > a').on('click', function (e) {
            e.preventDefault();

            var target = this.hash;
            var $target = $(target);
            var headerHeight = $('.navbar-header, .header-wrapper.sticky .navbar-header').outerHeight();
            
            if (target) {
                $('html, body').stop().animate({
                    'scrollTop': $target.offset().top - headerHeight + "px"
                }, 1200, 'easeInOutExpo', function () {
                    // window.location.hash = target;
                });
            }
        });
    }());


    /* === Mobile Dropdown Menu === */
    (function(){
        $('.dropdown-menu-trigger').each(function() {
            $(this).on('click', function(e){
                $(this).toggleClass('menu-collapsed');
            });
        });
    }());


    /* === Dropdown menu offest === */
    $(window).on('load resize', function () {
        $(".dropdown-wrapper > ul > li, .child-category").each(function() {
            var $this = $(this),
                $win = $(window);

            if ($this.offset().left + 195 > $win.width() + $win.scrollLeft() - $this.width()) {
                $this.addClass("dropdown-inverse");
            } else {
                $this.removeClass("dropdown-inverse");
            }
        });
    });


    /* === Navbar collapse on click === */
    $('.navbar-nav > li > a[href^="#"]').on('click', function(e) {
        $('.mobile-toggle').removeClass('in');
    });


    /* === Sticky Menu === */
    (function () {
        if (materializeJSObject.materialize_sticky_menu == true) {
            var nav = $('.navbar-fixed-top');
            var scrolled = false;

            $(window).scroll(function () {

                if (10 < $(window).scrollTop() && !scrolled) {
                    nav.addClass('sticky').animate({ 'margin-top': '0px' });
                    scrolled = true;
                }

                if (10 > $(window).scrollTop() && scrolled) {
                    nav.removeClass('sticky').css('margin-top', '0px');
                    scrolled = false;
                }
            });
        }
    }());


    /* === nav sticky header === */
    var navBottom = $(".header-bottom-menu .navbar-bottom-fixed").offset();

    $(window).on('scroll', function () {
        var w = $(window).width();
        if ($(".header-bottom-menu .navbar-bottom-fixed").length == 0) {
            
            if ($(this).scrollTop() > 1) {
                $('.navbar-bottom-fixed').addClass("sticky");
            }
            else {
                $('.navbar-bottom-fixed').removeClass("sticky");
            }
        } else {
            if ($(this).scrollTop() > navBottom.top + 100) {
                $('.navbar-bottom-fixed').addClass("sticky");
            }
            else {
                $('.navbar-bottom-fixed').removeClass("sticky");
            }
        }
    });


    /* === Full screen menu === */
    (function(){
        $('#toggle').on('click', function() {
            $(this).toggleClass('active');
            $('#overlay').toggleClass('open');
        });
    }());


    /* === Search === */
    (function () {
        $('.search-trigger').on('click', function (e) {
            $('body').addClass('active-search');
        });

        $('.search-close').on('click', function (e) {
            $('body').removeClass('active-search');
        });
    }());


    /* ======= Full height element ======= */
    $(".tt-fullHeight").height($(window).height());
    $(window).resize(function(){
        $(".tt-fullHeight").height($(window).height());
    });

    /* ======= Device Carousel ======= */
    $('.carousel-inner').find('.item:first' ).addClass( 'active' );


    /* ======= Unwrap span from contact form 7 ======= */
    (function(){
        $(".wpcf7-form .input-field > span > input, .wpcf7-form .input-field .btn > span > input, .wpcf7-form .input-field > span > textarea").unwrap();
    }());


    /* ======= Datepicker ======= */
    (function(){
        $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 15 // Creates a dropdown of 15 years to control year
        });
    }());


    /* ======= File Input Path ======= */
    $(document).on('change', '.file-field input[type="file"]', function () {
        var file_field = $(this).closest('.file-field');
        var path_input = file_field.find('input.file-path');
        var files      = $(this)[0].files;
        var file_names = [];
        for (var i = 0; i < files.length; i++) {
            file_names.push(files[i].name);
        }
        path_input.val(file_names.join(", "));
        path_input.trigger('change');
    });


    /* ======= Tab class ======= */
    $('.vc_tta-style-border-bottom-tab .vc_tta-tab > a, .vc_tta-style-border-tab-transparent .vc_tta-tab > a').addClass( 'waves-effect waves-dark' );
    $('.vc_tta-style-border-tab-background .vc_tta-tab > a, .vc_tta-style-icon-tab .vc_tta-tab > a, .vc_tta-style-border-box-tab .vc_tta-tab > a, .vc_tta-style-vertical-tab .vc_tta-tab > a, .vc_tta-style-rounded-tab .vc_tta-tab > a, .vc_tta-style-square-tab .vc_tta-tab > a, .vc_general.vc_btn3').addClass( 'waves-effect waves-light' );
    $('.vc_tta-panels-container > .vc_tta-panels > .vc_tta-panel').removeClass( 'waves-effect waves-dark' );


    /* === Counter === */
    $('.counter-section').on('inview', function(event, visible, visiblePartX, visiblePartY) {
        if (visible) {
            $(this).find('.timer').each(function () {
                var $this = $(this);
                $({ Counter: 0 }).animate({ Counter: $this.text() }, {
                    duration: 2000,
                    easing: 'swing',
                    step: function () {
                        $this.text(Math.ceil(this.Counter));
                    }
                });
            });
            $(this).off('inview');
        }
    });


    /* ======= Magnific Popup ======= */
    $(window).load(function(){
        $(".image-link, .tt-flickr-photo a").magnificPopup({
            type: 'image',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            fixedContentPos: false,
            gallery:{
                enabled:true
            }
        });
    });
    

    /* ======= Magnific Popup ======= */
    if ($('.tt-lightbox').length > 0) {
        $('.tt-lightbox').magnificPopup({
            type: 'image',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            fixedContentPos: false
            // other options
        });
    }

    $('.popup-video').magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: true,
        fixedContentPos: false
    });

    $('.tt-popup').magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: true,
        fixedContentPos: false
    });


    /* ======= Portfolio Individual Gallery ======= */
    $('.portfolio-slider').each(function () { 
        var _items = $(this).find("li > a");
        var items = [];
        for (var i = 0; i < _items.length; i++) {
            items.push({src: $(_items[i]).attr("href"), title: $(_items[i]).attr("title")});
        }
        $(this).parent().find(".action-btn").magnificPopup({
            items: items,
            type: 'image',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            fixedContentPos: false,
            gallery: {
                enabled: true
            }
        });
    });


    /* === Masonry Grid  === */
    $(window).load(function () {
        $('.masonry-wrap').masonry({
            "columnWidth" : ".masonry-column"
        });
    });


    /* === project carousel in digital agency demo === */
    if ($('.project-carousel').length > 0) {

        $('.project-carousel').owlCarousel({
            loop:true,
            items : 1,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                1000:{
                    items:1
                }
            }
        });
    }


    /* ======= Recent Project Carousel ======= */
    (function () {

        var projectCarousal = $(".recent-project-carousel");
        var projectCarousalItems = parseInt(projectCarousal.attr('data-largescreen'));
        var projectCarousalItemsDesktop = parseInt(projectCarousal.attr('data-desktop'));
        var projectCarousalItemsDesktopSmall = parseInt(projectCarousal.attr('data-desktopsmall'));
        var projectCarousalItemsTablet = parseInt(projectCarousal.attr('data-tablet'));

        projectCarousal.owlCarousel({
            items : projectCarousalItems, //5 items above 1000px browser width
            itemsDesktop : [1024,projectCarousalItemsDesktop], //4 items between 1000px and 901px
            itemsDesktopSmall : [900,projectCarousalItemsDesktopSmall], // betweem 900px and 601px
            itemsTablet: [600,projectCarousalItemsTablet], //2 items between 600 and 480
            itemsMobile : [479,1], //1 item between 480 and 0
            pagination : false // Show pagination
        });

        // Custom Navigation Events
        $(".project-navigation .btn-next").on('click', function(){
            projectCarousal.trigger('owl.next');
        })
        $(".project-navigation .btn-prev").on('click', function(){
            projectCarousal.trigger('owl.prev');
        })
    }());


    /* ======= Partner Carousel ======= */
    (function () {
        var owl = $(".partner-carousel");

        var partnerCarousalItems = parseInt(owl.attr('data-largescreen'));
        var partnerCarousalItemsDesktop = parseInt(owl.attr('data-desktop'));
        var partnerCarousalItemsDesktopSmall = parseInt(owl.attr('data-desktopsmall'));
        var partnerCarousalItemsTablet = parseInt(owl.attr('data-tablet'));

        owl.owlCarousel({
          autoPlay: true,
          items : partnerCarousalItems, //5 items above 1000px browser width
          itemsDesktop : [1024,partnerCarousalItemsDesktop], //4 items between 1000px and 901px
          itemsDesktopSmall : [900,partnerCarousalItemsDesktopSmall], // betweem 900px and 601px
          itemsTablet: [600,partnerCarousalItemsTablet], //2 items between 600 and 480
          itemsMobile : [479,1], //1 item between 480 and 0
          pagination : false // Show pagination
        });
    }());


    /* ======= Featured Carousel ======= */
    (function () {
        var owl = $(".featured-carousel");

        owl.owlCarousel({
            loop:false,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                1000:{
                    items:3
                }
            }
        });
    }());


    /* === Latest Blog Carousel === */
    if ($('.blog-carousel').length > 0) {

        $('.blog-carousel').owlCarousel({
            loop:true,
            margin:26,

            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                1000:{
                    items:3
                }
            }
        });
    }


    /* === Featured Service carousel === */
    if ($('.seo-featured-carousel').length > 0) {

        $('.seo-featured-carousel').owlCarousel({
            loop:true,
            margin:30,

            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                1000:{
                    items:4
                }
            }
        });
    }


    /* === Gallery === */
    $(window).on('load', function () {
        // The slider being synced must be initialized first
        $('.tt-gallery-wrapper').each(function(i, e){

            var ttGalleryNav = $(this).find('.tt-gallery-nav');
            var ttGalleryThumb = $(this).find('.tt-gallery-thumb');
            var ttGallery = $(this).find('.tt-gallery');

            ttGalleryThumb.flexslider({
                animation     : "slide",
                controlNav    : false,
                animationLoop : true,
                slideshow     : false,
                itemWidth     : 70,
                itemMargin    : 10,
                maxItems      : 4,
                asNavFor      : ttGallery
            });

            ttGallery.flexslider({
                animation     : "slide",
                directionNav  : false,
                controlNav    : false,
                animationLoop : false,
                slideshow     : false,
                sync          : ttGalleryThumb
            });

            // Navigation 
            ttGalleryNav.find('.prev').on('click', function (e) {
                ttGallery.flexslider('prev')
                return false;
            });

            ttGalleryNav.find('.next').on('click', function (e) {
                ttGallery.flexslider('next')
                return false;
            });
        });
    }());



    /* ======= Client Thumb Circle Style  ======= */

    if ($('.flex-testimonial').length > 0) {

        $('.flex-testimonial').flexslider({
            animation: "slide",
            controlNav: "thumbnails",
            directionNav: true
        })
    }


    /* ======= Partner Carousel ======= */
    (function () {
        $('.partner-carousel-wrapper').each(function(i, e){

            var partnerCarousal = $(this).find('.partner-carousel');
            var slideRow = parseInt(partnerCarousal.attr('data-sliderow'));
            var itemGutter = parseInt(partnerCarousal.attr('data-gutter'));

            // responsive settings
            var partnerCarousalItems = parseInt(partnerCarousal.attr('data-largescreen'));
            var partnerCarousalItemsDesktop = parseInt(partnerCarousal.attr('data-desktop'));
            var partnerCarousalItemsTablet = parseInt(partnerCarousal.attr('data-tablet'));
            var partnerCarousalItemsMobileLarge = parseInt(partnerCarousal.attr('data-mobilelarge'));
            var partnerCarousalItemsMobile = parseInt(partnerCarousal.attr('data-mobile'));

            var swiper = new Swiper(partnerCarousal, {
                slidesPerView: partnerCarousalItems,
                centeredSlides: false,
                spaceBetween: itemGutter,
                keyboardControl: true,
                nextButton: '.swiper-button-next',
                prevButton: '.swiper-button-prev',
                slidesPerColumn: slideRow,
                breakpoints: {
                    1024: {
                        slidesPerView: partnerCarousalItemsDesktop,
                        spaceBetween: itemGutter
                    },
                    768: {
                        slidesPerView: partnerCarousalItemsTablet,
                        spaceBetween: itemGutter
                    },
                    640: {
                        slidesPerView: partnerCarousalItemsMobileLarge,
                        spaceBetween: itemGutter
                    },
                    320: {
                        slidesPerView: partnerCarousalItemsMobile,
                        spaceBetween: itemGutter
                    }
                }
            });
        });
    }());


    /* ======= Home slider ======= */
    (function(){
        $('.tt-home-slider').superslides({
            play: 7000, 
            pagination: false,
            hashchange: false,
            animation: 'fade'
        });
    }());
    

    /* === Portfolio filter  === */
    if ($('.portfolio-container').length > 0) {
        $(window).on('load', function () {
            
            $('.portfolio-container').each(function(i, e){

                var buttonFilter;
                var ttGrid = $(this).find('.tt-grid');

                var $grid = ttGrid.isotope({
                    itemSelector: '.tt-item',
                    percentPosition: true,
                    masonry: {
                        columnWidth: '.tt-item'
                    },

                    filter: function () {
                        var $this = $(this);
                        var buttonResult = buttonFilter ? $this.is(buttonFilter) : true;
                        return buttonResult;
                    }
                });

                $(this).find('ul.portfolio-filter li').on('click', function () {
                    buttonFilter = $(this).attr('data-filter');
                    $grid.isotope();
                });
            });

            $('.portfolio-filter').each(function (i, buttonGroup) {
                var $buttonGroup = $(buttonGroup);
                $buttonGroup.on('click', 'li', function () {
                    $buttonGroup.find('.active').removeClass('active');
                    $(this).addClass('active');
                });
            });
        });
    }



    /* ======= Portfolio Slider ======= */

    if ($('.portfolio-slider').length > 0) {
        $('.portfolio-wrapper').each(function(i, e){

            var ttPortfolio = $(this).find('.portfolio-slider');

            var ttDirection = ttPortfolio.attr('data-direction');
            
            ttPortfolio.flexslider({
                animation: "slide",
                direction: ttDirection,
                slideshowSpeed: 3000,
                start:function(){
                    imagesLoaded($(".portfolio"),function(){
                        setTimeout(function(){
                            $('.portfolio-filter li:eq(0)').trigger("click");
                        },500);
                    });
                }
            });
        });
    }


    /* ======= Stellar for background scrolling ======= */
    (function () {
        $(window).on('load', function () {
            if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
             
            } else {
                $(window).stellar({
                    horizontalScrolling: false,
                    responsive: true
                });
            }
        });
    }());


    /* === Flickr photo === */
    (function () {

        var ttFlickr = $('.tt-flickr-photo');
        ttFlickr.jflickrfeed({
        limit: ttFlickr.attr('data-photo-limit'),
        qstrings: {
            id: ttFlickr.attr('data-flickr-id')
        },
        itemTemplate: '<li>'+
                        '<a href="{{image}}" title="{{title}}">' +
                            '<img src="{{image_s}}" alt="{{title}}" />' +
                        '</a>' +
                      '</li>'
        });

    }());


    /* === Portfolio Loadmore === */
    $(window).on('load', function () {
        var $content = $('.portfolio-loadmore');
        var $loader = $('.loadmore-btn');

        var perpage = $loader.data('postlimit'); 
        var allPosts = $loader.data('allposts'); 
        var column = $loader.data('grid_column'); 
        var ajaxUrl = $loader.data('url'); 
        var style = $loader.data('style'); 
        var padding = $loader.data('padding'); 
        var title = $loader.data('title');
        var category = $loader.data('category'); 
        var popup = $loader.data('popup');
        var linkButton = $loader.data('link_button');
        var like = $loader.data('like'); 
        var wordLimit = $loader.data('word_limit');
        var buttonText = $loader.data('button_text');
        var offset = $content.find('.portfolio-item').length;
         
        $loader.on( 'click', load_ajax_posts );
         
        function load_ajax_posts() {
            $.ajax({
                type: 'POST',
                dataType: 'html',
                url: materializeJSObject.ajaxurl,
                data: {
                    'perpage'               : perpage, 
                    'gridColumn'            : column, 
                    'portfolioStyle'        : style, 
                    'gridPadding'           : padding, 
                    'titleVisibility'       : title, 
                    'categoryVisibility'    : category, 
                    'popupbuttonVisibility' : popup, 
                    'linkButtonVisibility'  : linkButton, 
                    'likeVisibility'        : like, 
                    'wordLimit'             : wordLimit, 
                    'buttonText'            : buttonText,
                    'offset'                : offset,
                    'action'                : 'materialize_more_post_ajax'
                },
                beforeSend: function(){
                    $('<i class="fa fa-spinner fa-spin"></i>').appendTo( ".loadmore-btn" ).fadeIn(100);
                },
                complete:function(){
                    $('.loadmore-btn .fa-spinner ').remove();
                }
            })
            .done(function(data) {
                var $newItems = $(data);
                $content.isotope('insert', $newItems,function(){
                    $content.isotope('reLayout',{
                        animationEngine: 'jquery',
                        animationOptions: {
                            duration: 400,
                            queue: false
                        }
                    });
                });

                if ($('.portfolio-slider').length > 0) {
                    $('.portfolio-wrapper').each(function(i, e){
                        var ttPortfolio = $(this).find('.portfolio-slider');
                        var ttDirection = ttPortfolio.attr('data-direction');
                        
                        ttPortfolio.flexslider({
                            animation: "slide",
                            direction: ttDirection,
                            slideshowSpeed: 3000,
                            start:function(){
                                imagesLoaded($(".portfolio"),function(){
                                    setTimeout(function(){
                                        $('.portfolio-filter li:eq(0)').trigger("click");
                                    },500);
                                });
                            }
                        });
                    });
                }

                $(".tt-lightbox").magnificPopup({
                    type: 'image',
                    mainClass: 'mfp-fade',
                    removalDelay: 160,
                    fixedContentPos: false,
                    gallery:{
                        enabled:true
                    }
                });

                $('.popup-video').magnificPopup({
                    disableOn: 700,
                    type: 'iframe',
                    mainClass: 'mfp-fade',
                    removalDelay: 160,
                    preloader: true,
                    fixedContentPos: false
                });

                var $gridWrap = $('.tt-grid');
                $gridWrap.imagesLoaded().progress( function() {
                  $gridWrap.isotope('layout');
                });

                var newLenght = $content.find('.portfolio-item').length;

                if(allPosts <= newLenght){
                    $('.loadmore-btn-wrap').fadeOut(400,function(){
                        $('.loadmore-btn-wrap').remove();
                    });
                }
            })

            .fail(function() {
                alert('failed');
                console.log("error");
            });
            
            offset += perpage;
            return false;
        }
    });

    
    /* ======= Countdown ======= */    
    (function () {
        $('[data-countdown]').each(function() {
            var $this = $(this), finalDate = $(this).data('countdown');
            $this.countdown(finalDate, function(event) {
                $this.html(event.strftime(''
                    + '<li><span class="days">%D<span><p>'+materializeJSObject.count_day+'</p></li>'
                    + '<li><span class="hours">%H<span><p>'+materializeJSObject.count_hour+'</p></li>'
                    + '<li><span class="minutes">%M<span><p>'+materializeJSObject.count_minutes+'</p></li>'
                    + '<li><span class="second">%S<span><p>'+materializeJSObject.count_second+'</p></li>'
                ));
            });
        });
    }());


    /* === Login register form === */
    (function(){
        $('.toggle').on('click', function() {
          $('.login-wrapper').stop().addClass('active');
        });

        $('.close').on('click', function() {
          $('.login-wrapper').stop().removeClass('active');
        });

        // Perform AJAX login/register on form submit
        $('form#login, form#register').on('submit', function (e) {
            // if (!$(this).valid()) return false;
            $('p.status', this).show().text(materializeJSObject.loadingmessage);
            var action = 'ajaxlogin';
            var username =  $('form#login #username').val();
            var password = $('form#login #password').val();
            var email = '';
            var security = $('form#login #security').val();
            if ($(this).attr('id') == 'register') {
                var action = 'ajaxregister';
                var username = $('#signonname').val();
                var password = $('#signonpassword').val();
                var email = $('#email').val();
                var security = $('#signonsecurity').val();  
            }  
            var ctrl = $(this);
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: materializeJSObject.ajaxurl,
                data: {
                    'action': action,
                    'username': username,
                    'password': password,
                    'email': email,
                    'security': security
                },
                success: function (data) {
                    $('p.status', ctrl).text(data.message);
                    if (data.loggedin == true) {
                        document.location.href = materializeJSObject.redirecturl;
                    }
                }
            });
            e.preventDefault();
        });
    }());


    /* ======= Product quantity ======= */
    (function(){
        $('.plus').on('click',function(e){
            var val = parseInt($(this).prev('input').val());
            $(this).prev('input').val( val+1 );
        });

        $('.minus').on('click',function(e){
            var val = parseInt($(this).next('input').val());
            if(val !== 0){
                $(this).next('input').val( val-1 );
            } 
        });

        $('.quantity input.btn-quantity').on('click', function(){
            $('.woocommerce').find('.shop_table td.actions input.button').removeAttr( "disabled" );
        });
    }());

    // wishlist count update
    (function(){
        var ttWishListCount = function() {
            $.ajax({
                data      : {
                    action: 'update_wishlist_count'
                },
                success   : function (data) {
                    // console.log( data );
                    $('.tt-wishlist-count span').html( data );
                },

                url: yith_wcwl_l10n.ajax_url
            });
        };

        $('body').on( 'added_to_wishlist removed_from_wishlist', ttWishListCount );
    }());
});


/* ======= Google Map ======= */
jQuery(function ($) {
    if ($('.map-section').length > 0) {

        function initialize() {
            var centerMarker = $('.address-0');
            var colorOpt = $('#ttmap');
            var latOne = centerMarker.attr('data-lat');
            var lngOne = centerMarker.attr('data-lng');

            var landColor = colorOpt.attr('data-landcolor');
            var landColorOpacity = colorOpt.attr('data-landcolor-opacity');
            var waterColor = colorOpt.attr('data-watercolor');
            var waterColorOpacity = colorOpt.attr('data-watercolor-opacity');
            var mapZoom = parseInt(colorOpt.attr('data-zoom'));

            var map = new google.maps.Map(document.getElementById('ttmap'), {
                zoom: mapZoom,
                center: new google.maps.LatLng(latOne,lngOne),
                scrollwheel: false,
                styles: [
                    {"featureType": "landscape","stylers": [{"color": landColor}, {"lightness": landColorOpacity}]},
                    {"featureType": "poi",elementType: 'labels.text.fill',"stylers": [{"color": '#585858'}, {"lightness": 10}]},
                    {"featureType": "road.highway","stylers": [{"saturation": -100},{"visibility": "simplified"}]},
                    {"featureType": "road.arterial","stylers": [{"saturation": -100},{"lightness": 30},{"visibility": "on"}]},
                    {"featureType": "road.local","stylers": [{"saturation": -100},{"lightness": 40},{"visibility": "on"}]},
                    {"featureType": "transit","stylers": [{"saturation": -100},{"visibility": "simplified"}]},
                    {"featureType": "administrative.province","stylers": [{"visibility": "off"}]},
                    {"featureType": "water","elementType": "labels","stylers": [{"visibility": "on"},{"lightness": -25},{"saturation": -100}]},
                    {"featureType": "water","elementType": "geometry","stylers": [{"color": waterColor}, {"lightness": waterColorOpacity}]}
                ],
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            var infowindow = new google.maps.InfoWindow();
            var marker;
            var location = {};
            var markers = document.getElementsByClassName("address");

            for (var i = 0; i < markers.length; i++) {
                location = {
                    name : markers[i].getAttribute("data-info"),
                    pointlat : parseFloat(markers[i].getAttribute("data-lat")),
                    pointlng : parseFloat(markers[i].getAttribute("data-lng"))   
                };
                // console.log(location);
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(location.pointlat, location.pointlng),
                    map: map,
                    icon: markers[i].getAttribute("data-marker")
                });

                google.maps.event.addListener(marker, 'click', (function(marker,location) {
                    return function() {
                        infowindow.setContent(location.name);
                        infowindow.open(map, marker);
                    };
                })(marker, location));
            }
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    }
});