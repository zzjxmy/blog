var mzCheck = {
	'isLogin' : false,
	'checkUserIsLogin' : function(){
		var url = '/checkUserIsLogin';
		mzAjax.options.type = 'get';
		mzAjax.onSuccess = this.checkUserSuccess;
		mzAjax.onStart(url,{});
	},
	'checkUserSuccess' : function(data){
		return mzCheck.isLogin =  data.data.isLogin;
	}
};