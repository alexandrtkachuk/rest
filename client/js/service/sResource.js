App.service('sResource', function($resource , myConfig, md5 ) {
    
    
    //var Todo = $resource(myConfig.backend+'/car/:id');
    
    //return true;
    
    this.getCar =  $resource(myConfig.backend+'car/info/:id', null,
        {
            'get': { method:'GET' }
        });
    this.getAllCars =  $resource(myConfig.backend+'car/info/', null,
        {
            'get': { method:'GET' }
        });
    
    this.getUser_old = $resource(myConfig.backend+'user/info/', null,
        {
    
            'get': {
                method:'GET'
                ,headers: {"Authorization": "Basic " + btoa("test@mail.ru:"+md5.createHash('test'))}
            
            } 
            
            
        });
    
    this.getUser = function(temp, callback)
    {   
        
        var t =$resource(myConfig.backend+'user/info/', null,
        {
            'getme': {
                method:'GET'
                ,headers: temp
            }  
        });
        
        return t.getme()
        .$promise.then(callback);  
    }
    
    
  
    
    
    // console.log(md5.createHash('test'));
    /*
    
    Todo.get({id: 2} ,function(todo) {
        //todo.foo += '!';
        todo.$save();
        console.log('me');
        var test = todo;
        console.log(todo);
        //console.log(test.toString());
    });
    */
    
});
