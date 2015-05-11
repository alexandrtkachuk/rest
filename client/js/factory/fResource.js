App.factory('fResource', function($resource , myConfig) {
    
    var resource = { getCar:null};
    var Todo = $resource(myConfig.backend+'/car/:id');
    
    //return true;
    
    resource.getCar =  $resource(myConfig.backend+'/car/:id', null,
        {
            'get': { method:'GET' }
        });
    
    
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
    return resource;
});