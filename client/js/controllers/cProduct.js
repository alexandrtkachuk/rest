App.controller('cProduct',function(sResource,$stateParams, fCart, fUser){
	console.log($stateParams);
	this.cart = fCart;
	this.user = fUser;
	this.item = sResource.getCar.get({id:$stateParams.id});
	
	this.delete = function(id)
	{
		console.log(id);
		sResource.delete(id, function(todo)
						{
							console.log(todo);
							if (todo.result && todo.result==true ) {
								//code
								window.location = "#/";
							}
						});
	}
});