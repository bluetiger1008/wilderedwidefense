/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {
  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  function offset(el) {
      var rect = el.getBoundingClientRect(),
      scrollLeft = window.pageXOffset || document.documentElement.scrollLeft,
      scrollTop = window.pageYOffset || document.documentElement.scrollTop;
      return { top: rect.top + scrollTop, left: rect.left + scrollLeft, width: rect.width, height: rect.height, bottom: rect.top + scrollTop + rect.height };
  }
  
  var Sage = {
    // All pages
    'common': {
      init: function() {
        // JavaScript to be fired on all pages
        AOS.init();
        
        /* header class change on scrolling */
        var myElement = document.querySelector("header");
        var headroom  = new Headroom(myElement);

        headroom.init();       
        
        /* sticky footer cta button actions */
        var btnCall = document.querySelector(".btn-call"),
          btnEmail = document.querySelector(".btn-email"),
          btnCloseModal = document.getElementsByClassName("modal-close");

        btnCall.onclick = function() {
          document.getElementById('call-modal').classList.add('is-active');
        };
       
        btnEmail.onclick = function() {
          document.getElementById('email-modal').classList.add('is-active');
        };

        $('.delete').click(function() {
          document.querySelector(".modal.is-active").classList.remove('is-active'); 
        });

        /* awards logo slider */
        var multiSlides  = document.querySelector('.awards-multiple-slider');
        // http://easings.net/
        if(multiSlides) {
          lory(multiSlides, {
            infinite: 6,
            slidesToScroll: 1
          });  
        }

        $('#search_submit').click(function () {
            $('#input_search').toggleClass('expanded');
        });

        $('#mobile_search_submit').click(function () {
          console.log('toggle');
            $('#mobile_input_search').toggleClass('expanded');
        });

        /* nav menu for mobile devices */
        var menuRight = document.getElementById( 'cbp-spmenu-s2' ),
        showRight = document.getElementById( 'showRight' );
        closeMenu = document.getElementById( 'closeMenu' );
        showRight.onclick = function() {
          classie.toggle( menuRight, 'cbp-spmenu-open' );
          document.querySelector('.mobile-menu-items').classList.add('is-show-menu');   
        };
        closeMenu.onclick = function() {
          classie.toggle( menuRight, 'cbp-spmenu-open' );
          document.querySelector('.cbp-spmenu').classList.remove('is-active-submenu');
          document.querySelector('.mobile-menu-items').classList.remove('is-show-menu');   
          document.querySelector('.sub-menu').classList.remove('is-active');
        };

        var $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);
        // Check if there are any navbar burgers
        // document.querySelector('.mobile-menu-items').classList.add('is-overflow-visible');   

        var $navbarLink = Array.prototype.slice.call(document.querySelectorAll('.menu-item-has-children'), 0);
        if ($navbarLink.length > 0) {
          [].forEach.call($navbarLink, function($el) {
            var li = document.createElement("li");            
            var link = document.createElement("a");
            var li2 = document.createElement("li"); 
                        
            link.href = "#";
            link.innerHTML = '<i class="fa fa-chevron-left"></i> Back';
            li.classList.add('menu-item', 'back');
            li2.classList.add('menu-item', 'parent');
            li.appendChild(link);
            
            // Add a click event on each of them
            // nl.forEach(function ($el) {
            var $navbarLinkItem = $el.querySelector(':first-child').cloneNode(true);
            var $navbarSubMenu = $el.querySelector('.sub-menu');
            var $link = $el.firstChild;
            li2.appendChild($navbarLinkItem);                                
            $navbarSubMenu.insertAdjacentElement('afterbegin', li2);
            $navbarSubMenu.insertAdjacentElement('afterbegin', li);
        
            $link.addEventListener('click', function (e) {
                e.stopPropagation();
                e.preventDefault();
               
                // document.querySelector('.mobile-menu-items').classList.toggle('is-overflow-visible');                            
                $navbarSubMenu.classList.toggle('is-active');
                document.querySelector('.cbp-spmenu').classList.toggle('is-active-submenu');

            });
            li.addEventListener('click', function (e) {
                e.stopPropagation();
                e.preventDefault();
                $navbarSubMenu.classList.toggle('is-active');
                document.querySelector('.cbp-spmenu').classList.toggle('is-active-submenu');
                setTimeout(function() {
                    // document.querySelector('.mobile-menu-items').classList.toggle('is-overflow-visible');                
                }, 500);
            });            
          });
        }

      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
        /* page content victory slider */
        if(document.querySelector('.js_simple_dots') !== null) {
          var victory_slider       = document.querySelector('.js_simple_dots'),
            dot_count         = victory_slider.querySelectorAll('.js_slide').length,
            dot_container     = victory_slider.querySelector('.js_dots'),
            dot_list_item     = document.createElement('li');

          victory_slider.addEventListener('before.lory.init', handleDotEvent);
          victory_slider.addEventListener('after.lory.init', handleDotEvent);
          victory_slider.addEventListener('after.lory.slide', handleDotEvent);
          victory_slider.addEventListener('on.lory.resize', handleDotEvent);

          var dot_navigation_slider = lory(victory_slider, {
              infinite: 1,
              enableMouseEvents: true
          });

          /* jshint ignore:start */
          function handleDotEvent(e) {
            if (e.type === 'before.lory.init') {
              for (var i = 0, len = dot_count; i < len; i++) {
                var clone = dot_list_item.cloneNode();              
                dot_container.appendChild(clone);
              }
              dot_container.childNodes[0].classList.add('active');

            }
            if (e.type === 'after.lory.init') {
              for (var i = 0, len = dot_count; i < len; i++) {
                dot_container.childNodes[i].addEventListener('click', function(e) {
                  dot_navigation_slider.slideTo(Array.prototype.indexOf.call(dot_container.childNodes, e.target));
                });
              }
            }
            if (e.type === 'after.lory.slide') {
              for (var i = 0, len = dot_container.childNodes.length; i < len; i++) {
                dot_container.childNodes[i].classList.remove('active');
              }
              dot_container.childNodes[e.detail.currentSlide - 1].classList.add('active');
            }
            if (e.type === 'on.lory.resize') {
                for (var i = 0, len = dot_container.childNodes.length; i < len; i++) {
                    dot_container.childNodes[i].classList.remove('active');
                }
                dot_container.childNodes[0].classList.add('active');
            }
          }
          /* jshint ignore:end */
        }        
      }      
    },
    // Home page
    'home': {
      init: function() {
        // JavaScript to be fired on the home page
        /* homepage awards slider */

        /* jshint ignore:start */
        var slides = document.querySelectorAll('#hero-text-slider .slide');
        var currentSlide = 0;     
        var slideInterval = setInterval(nextSlide,5000);  

        function nextSlide(){
          slides[currentSlide].className = 'slide';
          currentSlide = (currentSlide+1)%slides.length;
          slides[currentSlide].className = 'slide showing';
        }
        /* jshint ignore:end */

        /* award team slider */
        var award_team_slider = document.querySelector('.js_award_team_slider');
        var lory_team_slider = lory(award_team_slider, {
            infinite: 1
        });
        var child_slider = award_team_slider.querySelectorAll('.js_slide');
        lory_team_slider.slideTo(1);
      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
        var testimonial_slider = document.querySelector('.js_testimonial_slider');
                
        lory(testimonial_slider, {
            infinite: 1
        });
      }
    },
    // About us page, note the change from about-us to about_us.
    'about_us': {
      init: function() {
        // JavaScript to be fired on the about us page
      }
    },
    'douglas': {
      init: function() {
        var victories_slider = document.querySelector('.js_victories_slider');
        var testimonials_slider = document.querySelector('.js_testimonials_slider');

        lory(victories_slider, {
            infinite: 1
        });
        lory(testimonials_slider, {
            infinite: 1
        });

        $('a[href^="#"]').on('click',function (e) {
            e.preventDefault();

            var target = this.hash;
            var $target = $(target);

            $('html, body').stop().animate({
                'scrollTop': $target.offset().top
            }, 900, 'swing', function () {
                window.location.hash = target;
            });
        });

      }
    },
    'single': {
      init: function() {
        var sidebar = new StickySidebar('#side-bar', {
          topSpacing: 20
        });
      }
    },
    'internal': {
      init: function() {
        // JavaScript to be fired on the about us page
        var sticky_consultation_form = document.querySelector('.form-consult.sticky .fsBody');
        var form_consult = document.querySelector('.form-consult');
        var left_contents = document.querySelectorAll('.left-content');
        var last_left_content = left_contents[left_contents.length - 1];

        if(sticky_consultation_form) {
          var sticky_form_offset =  offset(sticky_consultation_form);  
        }

        /* sticky side consultation form */
        function resetConsultationFormPosition() {
          var form_consult_offset = offset(form_consult);
          if(sticky_form_offset) {
            if( window.screen.width > 769 ) {
              if(document.documentElement.scrollTop > sticky_form_offset.top) {
                sticky_consultation_form.style.position = "fixed";
                sticky_consultation_form.style.top = "50px";
                form_consult.style.width = "100%";
                sticky_consultation_form.style.left = form_consult_offset.left + "px";
                sticky_consultation_form.style.width = form_consult_offset.width + "px";
                form_consult.style.position = "relative";
                form_consult.style.left = "0px";
              } else if(document.documentElement.scrollTop < sticky_form_offset.top) {
                form_consult.style.position = "relative";
                form_consult.style.left = "0px";
                form_consult.style.bottom = "0px";
                form_consult.style.width = "100%";
                sticky_consultation_form.style.position = "relative";
                sticky_consultation_form.style.top = "0px";
                sticky_consultation_form.style.left = "0px";
                sticky_consultation_form.style.width = "100%";
                document.querySelector('.form-consult.sticky .fsBody .fsForm').style.marginBottom = "0";
              }
              if(sticky_consultation_form.getBoundingClientRect().bottom >= last_left_content.getBoundingClientRect().bottom - 30) {
                form_consult.style.width = "100%";
                form_consult.style.position = "relative";
                form_consult.style.left = "0px";
                sticky_consultation_form.style.position = "fixed";
                sticky_consultation_form.style.top = last_left_content.getBoundingClientRect().bottom - sticky_consultation_form.getBoundingClientRect().height + "px";
                sticky_consultation_form.style.left = form_consult_offset.left + "px";
                sticky_consultation_form.style.width = form_consult_offset.width + "px";
              }  
            } else {
              form_consult.style.position = "relative";
              form_consult.style.left = "0px";
              form_consult.style.bottom = "0px";
              sticky_consultation_form.style.position = "relative";
              sticky_consultation_form.style.top = "0px";
              sticky_consultation_form.style.left = "0px";
              sticky_consultation_form.style.width = "100%";
            }
          }
        }

        resetConsultationFormPosition();

        window.addEventListener('scroll', function(e) {
          resetConsultationFormPosition();
        });
        
        window.onresize = function() {
          resetConsultationFormPosition();
        };
      }
    },
    'testimonials': {
      init: function() {        
        var btnTestimonialSubmit = document.querySelector("#btnTestimonialSubmit");

        btnTestimonialSubmit.onclick = function() {
          document.getElementById('testimonial-modal').classList.add('is-active');
        };  
      }
    }


  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
