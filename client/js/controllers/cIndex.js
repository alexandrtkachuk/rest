App.controller('cIndex',function(fResource,fCart){

    console.log('test');
    
    //var test = fResource.getCar.get({id:1});
    //console.log(test);
    
    this.all = fResource.getAllCars.get();
    //console.log(this.all );
    //this.all
	this.buy = function(id)
	{
		fCart.buy(id);
	}
    this.cart = fCart;
});
