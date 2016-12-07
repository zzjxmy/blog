$(function () {
	var layer, form;
	layui.use(['layer', 'form'], function () {
		layer = layui.layer;
		form = layui.form();
	});
	var mzComment = {
		/**
		 * @param options obj
		 */
		'open': function (options) {
			layer.open(options);
		},
		/**
		 * @param message string
		 * @param options obj or Closure
		 * @param callback Closure
		 */
		'alert': function (message, options, callback) {
			layer.alert(message, options, callback);
		},
		/**
		 * @param content
		 * @param yes Closure
		 * @param cancel Closure
		 * @param options
		 */
		'confirm': function (content, yes, cancel, options) {
			layer.confirm(content, yes, cancel, options);
		},
		'msg': function (content, options, end) {
			layer.msg(content, options, end);
		}
	};

	var defaultCallback = {
		/**
		 * 点击确认按钮时触发
		 * @param index 当前的层
		 * @param layero 当前的DOM对象
		 */
		'yes': function (index,layero) {
			layer.close(index);
		},
		'cancel': function (index) {
			layer.close(index);
		},
		'callback': function (index) {
			layer.close(index);
		},
		'end': function () {
			layer.closeAll();
		},
		'success' : function(layero, index){
			layer.close(index);
		}
	};

	/**
	 *事件绑定函数
	 */
	var mzBindFun = {
		'mzAlert': function (message, options, callback) {
			var msg = message ? message : '无内容';
			var cb = callback ? eval(callback) : defaultCallback.callback();
			if (options.length) {
				mzComment.alert(msg, options, cb);
			} else {
				mzComment.alert(msg, cb)
			}
		},
		'mzMsg': function (content, options, end) {
			var msg = content ? content : '无内容';
			var ed = end ? eval(end) : defaultCallback.end();
			if (options.length) {
				mzComment.msg(msg, options, ed);
			} else {
				mzComment.msg(msg, ed)
			}
		},
		'mzOpen': function (options) {
			mzComment.open(options);
		},
		'mzConfirm': function (content, yes, cancel, options) {
			var mes = content ? content : '无内容';
			var y = yes ? eval(yes) : defaultCallback.yes();
			var n = cancel ? eval(cancel) : defaultCallback.cancel();
			mzComment.confirm(mes, y, n, options);
		}
	};
	kernel.start(mzBindFun);
});