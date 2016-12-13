var mzSocket = {
	'socket' : {},
	'onConnect' : function(connection){
		if(connection){
			mzCheck.checkUserIsLogin();
			var socket = this.socket = new WebSocket(connection);
			socket.onopen = this.onOpen;
			socket.onmessage = this.onMessage;
			socket.onerror = this.onError;
		}else{
			throw 'connection is empty';
		}
	},
	'onOpen' : function(){
		console.log('connect is success');
	},
	'onMessage' : function(data){
		console.log(data);
	},
	'onSend' : function(data){
		this.socket.send(data);
	},
	'onError' : function(data){
		console.log(data);
	}
};

mzSocket.onConnect('ws://127.0.0.1:8282');