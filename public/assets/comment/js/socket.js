var mzSocket = {
	'socket' : {},
	'onConnect' : function(connection){
		mzAjax.options.async = true;
		mzCheck.checkUserIsLogin();
		if(connection){
			var socket = this.socket = new WebSocket(connection);
			socket.onopen = this.onOpen;
			socket.onmessage = this.onMessage;
			socket.onerror = this.onError;
		}else{
			throw 'connection is empty';
		}
	},
	'onOpen' : function(data){

	},
	'onMessage' : function(data){
		var json = mzFunction.toJson(data.data);
		if(mzCheck.isLogin && json.type == 'init') mzCheck.bindUserBySocketId(json.client_id);
	},
	'onSend' : function(data){
		this.socket.send(data);
	},
	'onError' : function(data){
		console.log(data);
	}
};

mzSocket.onConnect('ws://127.0.0.1:8282');