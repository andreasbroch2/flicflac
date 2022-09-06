(function($) {

// $( document ).ready(function() {
// if ($("body").hasClass("home")) {
// $('.is-logo-image').attr("src", "/wp-content/themes/businessbuddy/template-parts/logo.png");
// console.log("Sucess")
//
// }
// });



$(window).scroll(function(){
        var scrollTop = $(window).scrollTop();
        //console.log(scrollTop);
        if(scrollTop > 150){
            $('#fixed-header').addClass('sticky-nav');
            $('body').addClass('sticky-nav');
        } else {
            $('#fixed-header').removeClass('sticky-nav');
            $('body').removeClass('sticky-nav');
        }
    });

    // $(window).scroll(function(){
    //         var scrollTop = $(window).scrollTop();
    //         //console.log(scrollTop);
    //         if(scrollTop > 50){
    //             $('body').addClass('sticky-nav2');
    //         } else {
    //             $('body').removeClass('sticky-nav2');
    //         }
    //     });



/*----------- Overflow on frontpage cover video -----------*/
//$('html').css('overflow', 'hidden');


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
  responsive: [
    {
      breakpoint: 1650,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        centerMode: false,
      }
    },
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        centerMode: true,
      }
    }
  ]
});

})( jQuery )
lazySizes.init(); //fallback if img is above-the-fold
