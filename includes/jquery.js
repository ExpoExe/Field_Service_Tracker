// JavaScript Document

$(document).ready(function(){
	
	$('#intro').hide(0).delay(500).fadeIn(3000)
	
	$('#login').hover(
	function(){$(this).css({'background-color' : '#2499d7', 'border-color' : '#2499d7'})}, 
	function(){$(this).css({'background-color' : '#247BD7', 'border-color' : '#247BD7'})}
	);
		
});