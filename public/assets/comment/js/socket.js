var mzSocket = {
	'socket' : {},
	'onConnect' : function(connection){
		mzAjax.options.async = false;
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
	'onOpen' : function(data){},
	'onMessage' : function(data){
		console.log(data);
		mzMessage.start(mzFunction.toJson(data.data));
	},
	'onSend' : function(data){
		this.socket.send(data);
	},
	'onError' : function(data){
		console.log(data);
	}
};

mzSocket.onConnect('ws://127.0.0.1:8282');