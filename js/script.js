/*
function fechaBarraVerde() {
	var div = document.querySelector('.barra-verde');
	div.style.display = 'none';
}

var botao = document.querySelector('.fecha-barra-verde');
botao.addEventListener('click',fechaBarraVerde);
*/

$('.fecha-barra-verde').on('click',function(){
	$('.barra-verde').hide();
});