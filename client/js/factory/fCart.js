App.factory('fCart', function() {

	var cart = {test:null};
	
	cart.buy = function(id)
	{
		console.log('cart');
		console.log(id);
	}
	
	return cart;

});