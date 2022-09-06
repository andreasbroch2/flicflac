"use strict";

(function ($) {

  $(window).scroll(function () {
    var scrollTop = $(window).scrollTop(); //console.log(scrollTop);

    if (scrollTop > 150) {
      $('#fixed-header').addClass('sticky-nav');
      $('body').addClass('sticky-nav');
    } else {
      $('#fixed-header').removeClass('sticky-nav');
      $('body').removeClass('sticky-nav');
    }
  });
  /*=============================================
             = Typewriter effect banner =
   ===============================================*/

  var TxtRotate = function TxtRotate(el, toRotate, period) {
    let ref = this;
    this.toRotate = toRotate;
    this.el = el;
    this.parentNode = this.el.parentNode;
    this.loopNum = 0;
    this.period = parseInt(period, 10) || 2000;
    this.txt = el.textContent;
    this.tick();
    this.isDeleting = true;
    this.height = this.parentNode.clientHeight;
    ref.parentNode.style.minHeight = this.height + 'px';
    window.addEventListener('resize', function () {
      ref.height = 0;
      ref.parentNode.style.minHeight = ref.height + 'px';
    });
  };

  TxtRotate.prototype.tick = function () {
    var i = this.loopNum % this.toRotate.length;
    var fullTxt = this.toRotate[i];

    if (this.isDeleting) {
      this.txt = fullTxt.substring(0, this.txt.length - 1);
    } else {
      this.txt = fullTxt.substring(0, this.txt.length + 1);
    }

    this.el.classList.add('writing');
    this.el.innerHTML = '<span class="wrap">' + this.txt + '</span>';
    var that = this;
    var delta = Math.random() * (150 - 80) + 80; //var delta = 300 - Math.random() * 100;

    if (this.isDeleting) {
      delta /= 2;
    }

    if (!this.isDeleting && this.txt === fullTxt) {
      delta = this.period;
      this.isDeleting = true;
      this.el.classList.remove('writing');
      this.height = this.height < this.parentNode.clientHeight ? this.parentNode.clientHeight : this.height;
      this.parentNode.style.minHeight = this.height + 'px';
    } else if (this.isDeleting && this.txt === '') {
      this.isDeleting = false;
      this.el.classList.remove('writing');
      this.loopNum++;
      delta = 500;
    }

    setTimeout(function () {
      that.tick();
    }, delta);
  };

  window.onload = function () {
    var elements = document.getElementsByClassName('txt-rotate');

    for (var i = 0; i < elements.length; i++) {
      var toRotate = elements[i].getAttribute('data-rotate');
      var period = elements[i].getAttribute('data-period');

      if (toRotate) {
        new TxtRotate(elements[i], JSON.parse(toRotate), period);
      }
    }
  };


  /*===============================================
  =          REVIEW - ANMELDELSER - SLICK           =
  ===============================================*/
  $(document).on('ready', initReviewSlider);

  function initReviewSlider() {
    if (typeof $.fn.slick !== 'function') {
      return;
    }

  $('.review-container').slick({
    accessibility: true,
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    dots: true,
    arrows: false,
    autoplay: true,
    autoplaySpeed: 5000,
    lazyLoad: 'ondemand',
    centerMode: true,
    responsive: [{
      breakpoint: 1650,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        centerMode: false
      }
    }, {
      breakpoint: 1024,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        centerMode: true
      }
    }]
  });

}


/*========================================
=                    AJAX                =
========================================*/
//Save ajax as function
function runAjax() {
    var filter = $('#filter') // Get form
    var wrapper = $('.all-blog-posts-container') // Get markup grid container
    $.ajax({
        url:filter.attr('action'), // Get form action
        data:filter.serialize(), // Get form data
        type:filter.attr('method'), // Get form method
        beforeSend:function(){
            wrapper.animate({opacity:0},100) // Fade markup out
        },
        success:function(data){
            wrapper.html(data.blogposts)
        },
        complete:function(data){
            wrapper.delay(200).animate({opacity:1},200) // Fade markup in
        },
        error:function(){
            wrapper.css('opacity', 1) // Fade markup in
        }
    })
}

//Run ajax on form change
$('#filter').change(function(){
    var offset = $('input#offset')
    offset.val(0)
    runAjax()
    return false
})
//Reset when 'all' is pressed
$('#resetform').click(function() {
    $('#filter input').each(function () {
        $(this).attr('checked',false)
    })
    $(this).attr('checked',true)
    runAjax()
})
//Label click = input click
$('#filter label, #filter-tags label').click(function() {
    $(this).siblings('input').click()
    $(this).parent().siblings().children('input').attr('checked',false)

    $(this).parent().addClass('current')
    $(this).parent().siblings().removeClass('current')
})



/*===============================================
=          Table of contents - Accordion           =
===============================================*/
$('.table-of-contents .info .headline').click(function(){
   //Add or remove active class from clicked element
   if ($(this).hasClass('active')) {
      $(this).removeClass('active');
   } else {
      $(this).addClass('active');
   }
   //Slide content that belong to clicked element
   $(this).next('.toc-table').slideToggle();
   //SlideUp all other content
   $(this).parent('.info').siblings('.info').children('.toc-table').slideUp();
   //Remove active class from all other content boxes
   $(this).parent('.info').siblings('.info').children('.headline').removeClass('active');
})

function convertToSlug( str ) {
  //replace all special characters | symbols with a space
  str = str.replace(/[`~!@#$%^&*()_\-+=\[\]{};:'"\\|\/,.<>?\s]/g, ' ')
           .toLowerCase();
  // trim spaces at start and end of string
  str = str.replace(/^\s+|\s+$/gm,'');
  // replace space with dash/hyphen
  str = str.replace(/\s+/g, '-');
  return str;
}


document.addEventListener('DOMContentLoaded', function() {
    if ($('#toc').length > 0) {
        htmlTableOfContents();
    }
} );

function htmlTableOfContents( documentRef ) {
    var documentRef = documentRef || document;
    var toc = documentRef.getElementById("toc");
//  Use headings inside <article> only:
//  var headings = [].slice.call(documentRef.body.querySelectorAll('article h1, article h2, article h3, article h4, article h5, article h6'));
    var headings = [].slice.call(documentRef.body.querySelectorAll('.bbh-inner-section h1, .bbh-inner-section h2, .bbh-inner-section h3, .bbh-inner-section h4, .bbh-inner-section h5, .bbh-inner-section h6'));
    var h2_counter = 0;
    var h3_counter = 0;
    var h4_counter = 0;
    var h5_counter = 0;
    var h6_counter = 0;
    headings.forEach(function (heading, index) {

        if(heading.tagName.toLowerCase() == 'h2'){
            h2_counter++;
        }else if(heading.tagName.toLowerCase() == 'h3'){
            h3_counter++;
        }else if(heading.tagName.toLowerCase() == 'h4'){
            h4_counter++;
        }else if(heading.tagName.toLowerCase() == 'h5'){
            h5_counter++;
        }else if(heading.tagName.toLowerCase() == 'h6'){
            h6_counter++;
        }

        var ref = convertToSlug(heading.textContent);
        if ( heading.hasAttribute( "id" ) ){
            ref = heading.getAttribute( "id" );
            heading.setAttribute( "class", 'bbh-toc-link' );
        }else{
            heading.setAttribute( "id", ref );
            heading.setAttribute( "class", 'bbh-toc-link' );
        }
        var link = documentRef.createElement( "a" );
        link.setAttribute( "href", "#"+ ref );
        link.textContent = heading.textContent;

        var div = documentRef.createElement( "div" );
        div.setAttribute( "class", heading.tagName.toLowerCase() );
        var span = documentRef.createElement( "span" );

        if(heading.tagName.toLowerCase() == 'h2'){
            span.textContent = h2_counter;
            h3_counter = 0;
        }else if(heading.tagName.toLowerCase() == 'h3'){
            span.textContent = h2_counter + '.' + h3_counter ;
            h4_counter = 0;
        }else if(heading.tagName.toLowerCase() == 'h4'){
            span.textContent = h2_counter + '.' + h3_counter + '.' + h4_counter;
            h5_counter = 0;
        }else if(heading.tagName.toLowerCase() == 'h5'){
            span.textContent = h2_counter + '.' + h3_counter + '.' + h4_counter + '.' + h5_counter;
            h6_counter = 0;
        }else if(heading.tagName.toLowerCase() == 'h6'){
            span.textContent = h2_counter + '.' + h3_counter + '.' + h4_counter + '.' + h5_counter + '.' + h6_counter;
        }


        div.appendChild( span );
        div.appendChild( link );
        toc.appendChild( div );
    });
}

try {
    module.exports = htmlTableOfContents;
} catch (e) {
    // module.exports is not defined
}



/*===============================================
=          FAQ           =
===============================================*/

$('.collapse-section .info .headline').click(function(){
   //Add or remove active class from clicked element
   if ($(this).hasClass('active')) {
      $(this).removeClass('active');
   } else {
      $(this).addClass('active');
   }
   //Slide content that belong to clicked element
   $(this).next('.text').slideToggle();
   //SlideUp all other content
   $(this).parent('.info').siblings('.info').children('.text').slideUp();
   //Remove active class from all other content boxes
   $(this).parent('.info').siblings('.info').children('.headline').removeClass('active');
})







/*===============================================
=            businessbuddies Slider             =
===============================================*/

$(document).on('ready', initBuddySlider);

function initBuddySlider() {
  if (typeof $.fn.slick !== 'function') {
    return;
  }
  $('.buddy-container').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    nextArrow: ('.right-arrow'),
    prevArrow: ('.left-arrow'),
    responsive: [
  {
    breakpoint: 815,
    settings: {
      slidesToShow: 2,
      slidesToScroll: 1,
    }
  },
  {
    breakpoint: 601,
    settings: {
      slidesToShow: 1.5,
      slidesToScroll: 1
    }
  },
  {
    breakpoint: 481,
    settings: {

      slidesToShow: 1,
      slidesToScroll: 1
    }
  }
]
  });

}



/*===============================================
=               Blog Post Slider                =
===============================================*/
$(document).on('ready', initBlogPostSlider);

function initBlogPostSlider() {
  if (typeof $.fn.slick !== 'function') {
    return;
  }
  $('.post-container').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    nextArrow: ('.blog-arrow-right'),
    prevArrow: ('.blog-arrow-left'),
    responsive: [
  {
    breakpoint: 769,
    settings: {
      slidesToShow: 2.5,
      slidesToScroll: 1,
    }
  },
  {
    breakpoint: 601,
    settings: {
      slidesToShow: 2,
      slidesToScroll: 2
    }
  },
  {
    breakpoint: 480,
    settings: {
      slidesToShow: 1,
      slidesToScroll: 1
    }
  }
]
  });

};



/*===============================================
=                Review Slider                 =
===============================================*/
$(document).on('ready', initNewReviewSlider);

function initNewReviewSlider() {
  if (typeof $.fn.slick !== 'function') {
    return;
}
  $('.review-slider-container').slick({
    slidesToShow: 2,
    slidesToScroll: 1,
     arrows: false,
     dots: true,
     responsive: [
   {
     breakpoint: 861,
     settings: {
       slidesToShow:1,
       slidesToScroll: 1,

     }
   }

 ]
  });

};


/*===============================================
=                Buddies Ajax                 =
===============================================*/
function runBuddiesAjax() {
    var filter = $('#filter-buddies') // Get form
    var wrapper = $('#responseBuddies') // Get markup grid container
    $.ajax({
        url:filter.attr('action'), // Get form action
        data:filter.serialize(), // Get form data
        type:filter.attr('method'), // Get form method
        beforeSend:function(){
            wrapper.animate({opacity:0},100)// Fade markup out
        },
        success:function(data){

            if(data.buddies){
                wrapper.html(data.buddies) // insert data from output buffer in archives-cases.php
            }
        },
        complete:function(){
           wrapper.delay(200).animate({opacity:1},200) // Fade markup in
        },
        error:function(error){
            wrapper.css('opacity', 1) // Fade markup in
            console.log(error) // Console log error
        }
    })
}

//Run ajax on form change
$('#filter-buddies').change(function(){
    runBuddiesAjax()
    console.log('change')
    return false
})

$(document).ready(function(){
    runBuddiesAjax()

})
//Reset when 'all' is pressed
$('#resetform').click(function() {
  $('#filter-buddies input').each(function () {
    $(this).attr('checked',false)
  })
  $(this).attr('checked',true)
  runAjax()
})


})(jQuery);

lazySizes.init(); //fallback if img is above-the-fold
