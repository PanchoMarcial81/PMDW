$(document).ready(function(){
	/** Activando Slippry **/
	$('#slippry').slippry({
		captions: false,
		pager: false
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
});