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
		return mzCheck.isLogin =  data.data.isLogin;
	},
	'bindUserSuccess' : function(data){
		return mzCheck.isBind =  data.data.isBind;
	}
};