// JavaScript Document

$(document).ready(function(){
	$('#login_button').hover(
		function(){
			$(this).addClass('login_highlight');
		},
		function(){
			$(this).removeClass('login_highlight');
		})
	});