/**
 * navigation.js
 *
 * Handles toggling the navigation menu for small screens.
 */

$('.menu-mobile a').click(function(event) {
	event.preventDefault();
  	$( ".nav-main .menu" ).slideToggle( "fast", function() {
   	 // Animation complete.
 	 });

   	$( ".nav-sub" ).slideToggle( "fast", function() {
   	 // Animation complete.
 	 });
});





$('.topic-item-content').prependTo(".topic-item-content-container");
$('.current-content').show();

$('.topic-item a').click(function(event) {
	event.preventDefault();
	 var contentId = $(this).attr('href');
	$('.topic-item-content').hide();
	$(contentId).show();

	$('.topic-item').removeClass('current-topic');
	$(this).parent('.topic-item').addClass('current-topic');
 });



$('#product-purchase-link').click(function(event) {
	event.preventDefault();
	$('.gform_wrapper').slideDown();
	$(this).hide();
});



$(document).ready(function(){
	$("#video, .secondary-video").fitVids();
});




$( 'a[href*="#inner-circle-payment"]' ).click(function() {
	$('#inner-circle-payment').slideDown();
});