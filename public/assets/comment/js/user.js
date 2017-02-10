var mzCheck = {
	'isLogin' : false,
	'isBind' : false,
	'ping' : false,
	'time' : 80*1000,
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
	//心跳
	'pingData' : function(){
		setInterval(function(){
			console.log('check is online');
			if(!mzCheck.ping && mzCheck.isBind){
				layer.alert('你已经掉线，请刷新页面重试');
			}else{
				mzCheck.ping = false;
			}
		},this.time)
	},
	'checkUserSuccess' : function(data){
		mzCheck.isLogin =  data.data.isLogin;
		//启动心跳监测
		mzCheck.pingData();
		return true;
	},
	'bindUserSuccess' : function(data){
		return mzCheck.isBind =  data.data.isBind;
	}
};