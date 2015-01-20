// JavaScript Document

$(document).ready(function(){
	
	$('#intro').hide(0).delay(500).fadeIn(3000);
	
	$('#login').hover(
	function(){$(this).css({'background-color' : '#2499d7', 'border-color' : '#2499d7'})}, 
	function(){$(this).css({'background-color' : '#247BD7', 'border-color' : '#247BD7'})}
	);
	
	$('.view_button').hover(
	function(){$(this).css({'background-color' : '#2499d7'})}, 
	function(){$(this).css({'background-color' : '#247BD7'})}
	);
	
	$('#update_button').hover(
	function(){$(this).css({'background-color' : '#2499d7'})}, 
	function(){$(this).css({'background-color' : '#247BD7'})}
	);
	
	$('#logout').hover(
	function(){$(this).css({'background-color' : '#2499d7', 'border-color' : '#2499d7'})}, 
	function(){$(this).css({'background-color' : '#247BD7', 'border-color' : '#247BD7'})}
	);
	
	if(window.location.href.indexOf("success") > -1) {
		$('#statFade1').hide(0).delay(500).fadeIn(1000);
		$('#statFade2').hide(0).delay(1000).fadeIn(1000);
		$('#statFade3').hide(0).delay(1500).fadeIn(1000);
	}
	
	$('#addCall').hide(0);
	$('#addStudy').hide(0);
	
	$('.returnUpdate').hover(
	function(){$(this).css({'background-color' : '#2499d7', 'border-color' : '#2499d7'})}, 
	function(){$(this).css({'background-color' : '#393636', 'border-color' : '#247BD7'})}
	);
	
	$('.selectAdd1').hover(
	function(){$(this).css({'background-color' : '#2499d7', 'border-color' : '#2499d7'})}, 
	function(){$(this).css({'background-color' : '#393636', 'border-color' : '#247BD7'})}
	);
	
	$('.selectAdd2').hover(
	function(){$(this).css({'background-color' : '#2499d7', 'border-color' : '#2499d7'})}, 
	function(){$(this).css({'background-color' : '#393636', 'border-color' : '#247BD7'})}
	);

	$('.returnUpdate').click(function(){document.location.href = "main.php";});
	
	$('.selectAdd1').click(function(){
		
		$('#addCall').slideToggle('slow');
		$('#addStudy').slideUp('slow');
		
		});
	
	$('.selectAdd2').click(function(){
		
		$('#addStudy').slideToggle('slow');
		$('#addCall').slideUp('slow');
		
		});
	
});