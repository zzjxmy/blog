var config = {
	'click': {
		'mz-alert': [],
		'mz-confirm': [
			'.mz-bind-a'
		],
		'mz-msg': [],
		'mz-open': []
	}
};
var mzAttr = ['message', 'title', 'content', 'callback', 'options', 'stop', 'yes', 'cancel'];
var commentParams = {};
var kernel = {
	'before' : function(obj){
		beforeFun(obj);
	},
	'start' : function(mzBindFun){
		/**
		 * 读取配置信息
		 */
		$.each(config, function (mzBind, types) {
			$.each(types, function (type, params) {
				for (var i = 0; i < params.length; i++) {
					$(params[i]).bind(mzBind, function () {
						kernel.before($(this));
						startFun($(this),mzAttr,mzBindFun,type);
						kernel.after();
						kernel.end(this,stop);
					});
				}
			});
		});
	},
	'after' : function(){
		alterFun();
	},
	'end' : function(obj,stop){
		prevent(obj, event,stop);
		endFun();
	}
};