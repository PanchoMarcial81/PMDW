$(document).ready(function(){
	/** Activando Slippry **/
	$('#slippry').slippry({
		captions: false,
		pager: false
	});

	/** Detectar el ancho del diamante, y poner el mismo valor de HEIGHT **/
	var dn_width = $('.grid-item').width();
	$(".grid-item").css({
		height: dn_width
	});

	/** Detectar el ancho del diamante, y poner el mismo valor de HEIGHT **/
	var dn_width = $('.diamante').width();
	$(".diamante").css({
		height: dn_width
	});

	/** Agregamos la clase al hacer scroll a la barra de navegacion, despues de llegar al contenedor de nosotros **/
	var slider = $("#slider").height();
	$(window).scroll(function() {
		var scroll = $(window).scrollTop();
		if (scroll >= $("#nosotros").offset().top -200) {
			$("#nav").addClass('nav-overlay');
		}else{
			$("#nav").removeClass('nav-overlay');
		}
	});
	$(window).scroll();

	var map;
  	function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
		  	center: {lat: 43.5293, lng: -5.6773},
          	zoom: 13,
        });
        var marker = new google.maps.Marker({
          	position: {lat: 43.542194, lng: -5.676875},
          	map: map,
	  		title: 'Acuario de Gijón'
        });
    }
});