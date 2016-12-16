var mzMessage = {
	'start' : function(data){
		switch (data.type){
			case 'init':
				this.init(data);
				break;
			case 'setFriendStatus':
				this.setFriendStatus(data);
				break;
			case 'ping' :
				this.ping();
				break;
		}
	},
	'init' : function(data){
		if(mzCheck.isLogin && data.type == 'init')mzCheck.bindUserBySocketId(data.data.client_id);
	},
	'setFriendStatus' : function(data){
		layui.use('layim', function(layim){
			layim.setFriendStatus(data.data.id, data.data.status); //设置指定好友在线，即头像取消置灰
		});
	},
	'ping' : function(){
		mzSocket.socket.send("{'type':'response'}");
	}
};