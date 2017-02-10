var mzSocket = {
	'socket' : {},
	'onConnect' : function(connection){
		if(connection){
			var socket = this.socket = new WebSocket(connection);
			socket.onopen = this.onOpen;
			socket.onmessage = this.onMessage;
			socket.onerror = this.onError;
		}else{
			throw 'connection is empty';
		}
	},
	'onOpen' : function(data){},
	'onMessage' : function(data){
		console.log(mzFunction.toObj(data.data));
		mzMessage.start(mzFunction.toObj(data.data));
	},
	'onSend' : function(data){
		data.type = 'message';
		console.log(mzFunction.toJson(data));
		this.socket.send(mzFunction.toJson(data));
	},
	'onError' : function(data){
		layer.alert('聊天服务连接失败');
	}
};

mzSocket.onConnect('ws://127.0.0.1:8282');