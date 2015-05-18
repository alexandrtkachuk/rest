App.controller('cUser',function(sResource, md5, fUser){
    
	this.user=fUser;
	this.email='';
    this.pass='';
	
    console.log('user');
    
    
    var result ={info:'', };
    this.result = result;// sResource.getUser.get();
    
	
		if(window.localStorage.taicarshop &&  !fUser.id )
		{
		
			head = {"token":
            window.localStorage.taicarshop};
			sResource.getUser(head,function (todo){
                console.log(todo);
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
        
        var head = {
            "Authorization":"Basic " + hash,
        };
	
		
        sResource.loginUser(head,function callback(todo){
            //result.info = todo;
            console.log(todo);
           
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
                window.localStorage.taicarshop=todo.result.token;
              }
              else{
                result.info = 'Логин или пароль введен неверно';
              }
              
              //console.log(result);
            
        }	);
        
        
    }
    
    //registration
    this.rname ;
    this.remail;
    this.rpass;
    this.rpass2;
    this.registration = function(){
    
        if (!this.rname || !this.remail || !this.rpass || !this.rpass2) {
            return ;
        }
        console.log(this.rname);
        console.log(this.remail);
        console.log(this.rpass);
        console.log(this.rpass2);
        if (this.rpass != this.rpass2) {
            //code  
            result.info = 'Пароли не соответствуют';
            return ;
        }
        
        sResource.user.add({
            name:this.rname,
            email:this.remail,
            pass:md5.createHash(this.rpass)
                       },
            function(todo){
                console.log(todo);
                if (todo.result.res == true)
                {
                    result.info = 'Вы успешно зарегестрированы';
                }
                else
                {
                    result.info = 'Ошибка данных, или такая запись уже есть';
                }
            }) ;
        
    }
    
    //logout
    
    this.logout = function()
    {
        head = {"token":
            window.localStorage.taicarshop};
			sResource.logoutUser(head,function (todo){
              //console.log(todo);
              fUser.logout();
        });
    }
});