$(function() {

  var siteSticky = function() {
		$(".js-sticky-header").sticky({topSpacing:0});
	};
	siteSticky();

	var siteMenuClone = function() {

		$('.js-clone-nav').each(function() {
			var $this = $(this);
			$this.clone().attr('class', 'site-nav-wrap').appendTo('.site-mobile-menu-body');
		});


		setTimeout(function() {
			
			var counter = 0;
      $('.site-mobile-menu .has-children').each(function(){
        var $this = $(this);
        
        $this.prepend('<span class="arrow-collapse collapsed">');

        $this.find('.arrow-collapse').attr({
          'data-toggle' : 'collapse',
          'data-target' : '#collapseItem' + counter,
        });

        $this.find('> ul').attr({
          'class' : 'collapse',
          'id' : 'collapseItem' + counter,
        });

        counter++;

      });

    }, 1000);

		$('body').on('click', '.arrow-collapse', function(e) {
      var $this = $(this);
      if ( $this.closest('li').find('.collapse').hasClass('show') ) {
        $this.removeClass('active');
      } else {
        $this.addClass('active');
      }
      e.preventDefault();  
      
    });

		$(window).resize(function() {
			var $this = $(this),
				w = $this.width();

			if ( w > 768 ) {
				if ( $('body').hasClass('offcanvas-menu') ) {
					$('body').removeClass('offcanvas-menu');
				}
			}
		})

		$('body').on('click', '.js-menu-toggle', function(e) {
			var $this = $(this);
			e.preventDefault();

			if ( $('body').hasClass('offcanvas-menu') ) {
				$('body').removeClass('offcanvas-menu');
				$this.removeClass('active');
			} else {
				$('body').addClass('offcanvas-menu');
				$this.addClass('active');
			}
		}) 

		// click outisde offcanvas
		$(document).mouseup(function(e) {
	    var container = $(".site-mobile-menu");
	    if (!container.is(e.target) && container.has(e.target).length === 0) {
	      if ( $('body').hasClass('offcanvas-menu') ) {
					$('body').removeClass('offcanvas-menu');
				}
	    }
		});
	}; 
	siteMenuClone();

});


// Product Slider
$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    responsive:{
        0:{
            items:6
        },
        600:{
            items:6
        },
        1000:{
            items:6
        }
    }
})


// Profile Page Slider Range
const sliderEl = document.querySelector("#range")
const sliderValue = document.querySelector(".value")
if(sliderEl != null){
	sliderEl.addEventListener("input", (event) => {
		const tempSliderValue = event.target.value; 
	
		sliderValue.textContent = tempSliderValue;
	
		const progress = (tempSliderValue / sliderEl.max) * 100;
	
		sliderEl.style.background = `linear-gradient(to right, #00FF62 ${progress}%, #ccc ${progress}%)`;
	})
}



// Deposit Copy Address
let tronBtn = document.getElementById('tron_btn');
let tronVal = document.getElementById('tron_val').innerHTML;

tronBtn.addEventListener('click',function(e){
	e.preventDefault();
	navigator.clipboard.writeText(tronVal);
	document.getElementById('tronMSG').style.display = "flex";
})

let ercBtn = document.getElementById('erc_btn');
let ercVal = document.getElementById('erc_val').innerHTML;

ercBtn.addEventListener('click',function(e){
	e.preventDefault();
	navigator.clipboard.writeText(ercVal);
	document.getElementById('ercMSG').style.display = "flex";
})