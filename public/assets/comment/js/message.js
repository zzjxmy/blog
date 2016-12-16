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
			case 'onMessage' :
				this.onMessage(data);
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
		mzCheck.ping = true;
		console.log(mzCheck.ping);
		mzSocket.socket.send("{'type':'response'}");
	},
	'sendMessage' : function(data){
		if(mzCheck.isLogin){
			mzSocket.socket.send(data);
		}else {
			layui.use('layim', function(layim){
				layim.getMessage({
					system: true //系统消息
					,id: data.to.id //聊天窗口ID
					,type: data.to.type //聊天窗口类型
					,content: '发送失败，请登录后再操作'
				})
			});
		}
	},
	'onMessage' : function (data) {
		layui.use('layim', function(layim){
			layim.getMessage(data.data);
		});
	}
};