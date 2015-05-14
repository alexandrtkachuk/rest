App.controller('cUser',function(sResource, md5, fUser){
    
	this.user=fUser;
	this.email='';
    this.pass='';
	
    console.log('user');
    
    
    var result ={info:'', };
    this.result = result;// sResource.getUser.get();
    
    
	
	//window.localStorage
	
	
	
		
		
		if(window.localStorage.taicarshop &&  !fUser.id)
		{
		
			head = {"Authorization":
            "Basic " + window.localStorage.taicarshop};
			sResource.getUser(head,function (todo){
              if(todo.result.id)
              {
				fUser.login(todo.result);
				
              }
              else{
                window.localStorage.taicarshop = false;
              }
        });
			
			//console.log('test22');
		}  
	//click to login
    this.login = function()
    {
        if (!this.email || !this.pass) {
            return ;
        }
        
        var hash = btoa(this.email+":"+md5.createHash(this.pass));
        
        var head = {"Authorization":
            "Basic " + hash};
	
		
        sResource.getUser(head,function callback(todo){
            //result.info = todo;
              if(todo.result.id)
              {
                console.log('good');
                setTimeout(function(){
                    $('#myModal').modal('toggle');
                  }, 2000);
                // $('#myModal').modal('toggle');
                //result.info = 'Логин или пароль введен неверно';
				console.log(todo.result.name);
				
				fUser.login(todo.result);
                result.info = 'Добро пожаловать';
                
                //save
                window.localStorage.taicarshop= hash;
              }
              else{
                result.info = 'Логин или пароль введен неверно';
              }
              
              //console.log(result);
            
        }	);
        
        
    }
    
});