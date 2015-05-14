App.factory('fUser', function() {

	var user = {
		name:'', 
		id:false, 
		role:false,
		ButtonEnter:'block',
		ButtonLogout:'none',
		};
	
	user.login = function(result)
	{
		user.name = result.name;
		user.role = result.role;
		user.id = result.id;
		user.ButtonLogout='block';
		user.ButtonEnter = 'none';
	}
	
	user.logout = function ()
	{
		window.localStorage.taicarshop=false;
		user.name = '';
		user.role = false;
		user.id = false;
		user.ButtonLogout='none';
		user.ButtonEnter='block';
	}
	
	return user;

});