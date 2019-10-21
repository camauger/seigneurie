
$( document ).ready(function() 
{
	$('.carousel').carousel({
	  interval: 1000000
	});

	$('.woo-single-product-cat h3').equalHeights();

	$('.view-activites-items h3').equalHeights();
	$('.view-activites-items h4').equalHeights();
	$('.activite-item-excerpt').equalHeights();
	$('.caption p.text-center').equalHeights();
	//$('.type-product').equalHeights();
	$('.woo-single-product-cat img').equalHeights();

	
	$('.count').text(
		function(_, text) 
		{
    		return text.replace(/\(|\)/g, '')
    	});;

	$('.img-product-description').zoomify();
}); // ready 
