App.controller('cProduct',function(fResource,$stateParams, fCart){
	
	console.log($stateParams);
	this.cart = fCart;
	this.item = fResource.getCar.get({id:$stateParams.id});


});