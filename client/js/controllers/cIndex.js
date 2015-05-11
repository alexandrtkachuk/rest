App.controller('cIndex',function(fResource){

    console.log('test');
    
    var test = fResource.getCar.get({id:1});
    console.log(test);
    
});