App.controller('cUser',function(sResource, md5){
    this.email='';
    this.pass='';
    console.log('user');
    
    
    var result ={info:'', };
    this.result = result;// sResource.getUser.get();
    
    console.log(md5.createHash('test'));
    
    console.log(this.test);
	
	//window.localStorage
	
    this.login = function()
    {
        if (!this.email || !this.pass) {
            return ;
        }
        
        var hash = btoa(this.email+":"+md5.createHash(this.pass));
        
        var head = {"Authorization":
            "Basic " + hash};
       // console.log(head);
        
        sResource.getUser(head,function(todo){
            //result.info = todo;
              if(todo.result.id)
              {
                console.log('good');
                setTimeout(function(){
                    $('#myModal').modal('toggle');
                  }, 2000);
                // $('#myModal').modal('toggle');
                //result.info = 'Логин или пароль введен неверно';
                result.info = 'Добро пожаловать';
                
                //save
                window.localStorage.taicarshop= hash;
              }
              else{
                result.info = 'Логин или пароль введен неверно';
              }
              
              console.log(result);
            
        });
        //this.test =sResource.getUser2.get();
        
    }
    
});