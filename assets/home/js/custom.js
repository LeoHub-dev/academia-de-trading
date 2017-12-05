function myFunction(response) {
  	var coinList = JSON.parse(response).DISPLAY;
  	var coin;
  	var el = document.createElement('div');
  	el.setAttribute("class", "home__markets-bar");
  
  	var usd = new Array();
 	var out = '<div class="markets-bar">';
  	out += '<div class="markets-bar-marquee"><div class="markets-bar-collection">';
  
  	var i=0;
  	for (coin in coinList) 
  	{
    	usd[i] = "<div class='markets-bar-item'>";
    	usd[i] += "<div class='markets-bar-story'><span class='markets-bar-item__link'><strong> " 
      	+ coin + ": </strong> " 
      	+ coinList[coin].USD.PRICE + arrow(coinList[coin].USD.CHANGEPCT24HOUR) + " / " + coinList[coin].BTC.PRICE + arrow(coinList[coin].BTC.CHANGEPCT24HOUR);
 
    	usd[i] += "</span></div></div>";
    	i++;
  	}

  	for (i = 0; i < usd.length; i++) {
    	out += usd[i];
  	}
  	for (i = 0; i < usd.length; i++) {
    	out += usd[i];
  	}
  	out += '</div></div></div></div>';
  	el.innerHTML = out;
  	var div = document.getElementById("top-header");
  	insertAfter(div, el);
}

function arrow(change24Bitcoin){

    var indicadorBitcoin =""; 
  	var color ="";
  	var porcentajeBitcoinCambio = "";
  
  	if (change24Bitcoin.indexOf('-') != -1)
    {
        //Cuando el precio baja
        indicadorBitcoin = "&#9660;&nbsp";
        color = "down";
    }
    else
    {
        //Cuando el precio sube
        indicadorBitcoin = "&#9650;&nbsp;";
        color = "up";
    }

    porcentajeBitcoinCambio = indicadorBitcoin + change24Bitcoin;
    porcentajeBitcoinCambio = ' <span class="change ' + color + ' " >' + porcentajeBitcoinCambio + '%</span>';

	return porcentajeBitcoinCambio
}

function round(value, decimals) {
  	return Number(Math.round(value + 'e' + decimals) + 'e-' + decimals);
}

function insertAfter(referenceNode, newNode) {
  	referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
}

$(function(){
	'use strict';

	$(window).on('load', function() { 
		$("#loaderDiv").delay(100).fadeOut("slow");
		$("#loaderNoImage").delay(100).fadeOut("slow");
		new WOW().init();
	});



    var currencies = "BTC,ETH,BCH,XRP,LTC,MIOTA,XEM,DASH,NEO,ETC,XMR,STRAT,ZEC";

    var xmlhttp = new XMLHttpRequest();
    var url = "https://min-api.cryptocompare.com/data/pricemultifull?fsyms=" + currencies + "&tsyms=USD,BTC";

    xmlhttp.onreadystatechange = function () {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        myFunction(xmlhttp.responseText);
      }
    }
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
    


	/*--------------------------------------------------
    Scrollspy Bootstrap 
    ---------------------------------------------------*/

    $('body').scrollspy({
    	target: '#header',
    	offset: 100
    });


	/*--------------------------------------------------
    Smooth Scroll 
    ---------------------------------------------------*/

	smoothScroll.init({
		selector: '.smoothScroll',
		speed: 1000,
		offset: 100,
		before: function(anchor, toggle){
			// Check if mobile navigation is active
			var query = Modernizr.mq('(max-width: 767px)');
			// Check if element is navigation eelement
			var navItem = $(toggle).parents("#main-navbar").length;
			// If mobile nav & nav item then close nav
			if (query && navItem !== 0) {
				$("button.navbar-toggle").click();
			}
		}
	});


	/*--------------------------------------------------
    Mixitup
    ---------------------------------------------------

    var mixer = mixitup('#portfolio-grid', {

		selectors: {
			control: '[data-mixitup-control]'
		}
		
	});*/


	/*--------------------------------------------------
    Slick Slider
    ---------------------------------------------------*/

	$('.slider-container').slick({
		arrows: false,
		autoplay: true,
		centerMode: true,
		centerPadding: '100px',
		variableWidth: true,
    speed: 3000,
		responsive: [
			{
				breakpoint: 768,
				settings: {
					centerMode: false,
					variableWidth: false
				}
			}
		]
	});


	/*--------------------------------------------------
    Porfolio cursor
    ---------------------------------------------------*/

	$('.team-member').on('mousedown', function() {
	    $(this).removeClass('grabbable');
	    $(this).addClass('grabbing');
	});

	$('.team-member').on('mouseleave mouseup', function() {
	    $(this).removeClass('grabbing');
	    $(this).addClass('grabbable');
	});

	/*--------------------------------------------------
    Current Year
    ---------------------------------------------------*/

    // Automatically update copyright year in the footer
	var currentTime = new Date();
	var year = currentTime.getFullYear();
	$("#year").text(year);


});