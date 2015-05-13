App.controller('cUser',function(sResource, md5){

    console.log('user');
    
    this.test = sResource.getUser.get();
    
    console.log(md5.createHash('test'));
    
    console.log(this.test);
});