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
  var Sage = {
    // All pages
    'common': {
      init: function() {
        // JavaScript to be fired on all pages
        AOS.init();
        
        /* header class change on scrolling */
        var myElement = document.querySelector("header");
        var headroom  = new Headroom(myElement);

        /* nav menu for mobile devices */
        var menuRight = document.getElementById( 'cbp-spmenu-s2' ),
        showRight = document.getElementById( 'showRight' );
        closeMenu = document.getElementById( 'closeMenu' );
        showRight.onclick = function() {
          classie.toggle( menuRight, 'cbp-spmenu-open' );
        };
        closeMenu.onclick = function() {
          console.log('close menu');
          classie.toggle( menuRight, 'cbp-spmenu-open' );
        };

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
          console.log('close modal');
          document.querySelector(".modal.is-active").classList.remove('is-active'); 
        });
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
        
        var multiSlides  = document.querySelector('.js_multislides');
        // http://easings.net/
        lory(multiSlides, {
          infinite: 6,
          slidesToScroll: 1
        });

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
    'page_template_template_internal': {
      init: function() {
        // JavaScript to be fired on the about us page
        var wp_content = document.querySelector('.wp-content');
        var sticky_consultation_form = document.querySelector('.form-consult.sticky .fsBody');
        var form_consult = document.querySelector('.form-consult');

        function offset(el) {
            var rect = el.getBoundingClientRect(),
            scrollLeft = window.pageXOffset || document.documentElement.scrollLeft,
            scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            return { top: rect.top + scrollTop, left: rect.left + scrollLeft, width: rect.width, height: rect.height };
        }

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
                document.querySelector('.form-consult.sticky .fsBody .fsForm').style.marginBottom = "44px";
              }
              if(sticky_consultation_form.getBoundingClientRect().bottom >= wp_content.getBoundingClientRect().bottom - 72) {           
                form_consult.style.position = "absolute";
                form_consult.style.bottom = ".75rem";
                form_consult.style.left = ".75rem";
                form_consult.style.width = "calc(100% - 1.5rem)";
                sticky_consultation_form.style.position = "relative";
                sticky_consultation_form.style.top = "0px";
                sticky_consultation_form.style.left = "0px";
                sticky_consultation_form.style.width = "100%";
                document.querySelector('.form-consult.sticky .fsBody .fsForm').style.marginBottom = "0";
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
