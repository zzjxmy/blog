var mzCheck = {
	'isLogin' : false,
	'isBind' : false,
	'checkUserIsLogin' : function(){
		var url = '/checkUserIsLogin';
		mzAjax.options.type = 'get';
		mzAjax.onSuccess = this.checkUserSuccess;
		mzAjax.onStart(url,{});
	},
	'bindUserBySocketId' : function(socketId){
		var url = '/bindUserBySocketId';
		mzAjax.onSuccess = this.bindUserSuccess;
		mzAjax.onStart(url,{'socketId':socketId});
	},
	'checkUserSuccess' : function(data){
		mzCheck.isLogin =  data.data.isLogin;
		return true;
	},
	'bindUserSuccess' : function(data){
		return mzCheck.isBind =  data.data.isBind;
	}
};