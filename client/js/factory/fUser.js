App.factory('fUser', function() {

	var user = {
		name:'', 
		id:false, 
		role:false,
		ButtonEnter:'block',
		ButtonLogout:'none',
		ButtonReg:'block',
		ButtonDel:'none'
		};
	
	user.login = function(result)
	{
		user.name = result.name;
		user.role = result.role;
		user.id = result.id;
		user.ButtonLogout='block';
		user.ButtonEnter = 'none';
		user.ButtonReg='none';
		if (user.role == 0) {
			user.ButtonDel = 'block';
		}
	}
	
	user.logout = function ()
	{
		window.localStorage.taicarshop=false;
		user.name = '';
		user.role = false;
		user.id = false;
		user.ButtonLogout='none';
		user.ButtonEnter='block';
		user.ButtonReg='block';
		user.ButtonDel = 'none';
	}
	
	return user;

});