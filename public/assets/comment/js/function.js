var mzFunction = {
	'getCookie' : function(name) {
		if (document.cookie.length>0)
		{
			var c_start = document.cookie.indexOf(name + "=");
			console.log(document.cookie);
			if (c_start != -1)
			{
				c_start = c_start + name.length+1;
				var c_end = document.cookie.indexOf(";",c_start);
				if (c_end == -1) c_end = document.cookie.length;
				return unescape(document.cookie.substring(c_start,c_end));
			}
		}
		return null;
	},
	'setCookie' : function(name,value,sec) {
		var exdate = new Date();
		exdate.setDate(exdate.getTime() + sec?sec:86400*1000);
		document.cookie = name + "=" + escape(value) + ((sec == null) ? "" : ";expires=" + exdate.toGMTString());
	},
	'delCookie' : function(name){
		var exp = new Date();
		exp.setTime(exp.getTime() - 1);
		var val = this.getCookie(name);
		if(val!=null)document.cookie= name + "="+val+";expires="+exp.toGMTString();
	},
	'toJson' : function(str){
		return str?JSON.parse(str):{};
	}
};

/**
 * 渲染绑定事件
 * @param obj 当前的DOM对象
 * @param mzAttr 需要eval的对象属性
 * @param mzBindFun 待绑定的函数
 * @param type config配置 绑定对应的函数
 */
function startFun(obj,mzAttr,mzBindFun,type){
	for (var a = 0; a < mzAttr.length; a++) {
		var _script = '';
		if ((typeof(obj.attr('mz-' + mzAttr[a])) != "undefined")) {
			if (mzAttr[a] == 'options') {
				_script = 'var ' + mzAttr[a] + ' =' + obj.attr('mz-' + mzAttr[a]) + ";";
			} else {
				_script = 'var ' + mzAttr[a] + ' =' + "'" + obj.attr('mz-' + mzAttr[a]) + "';";
			}
		} else {
			_script =  'var ' + mzAttr[a] + ' =' + 'null;';
		}
		eval(_script);
		commentParams.stop = stop;
	}
	switch (type) {
		case 'mz-alert':
			mzBindFun.mzAlert(msg, options, callback);
			break;
		case 'mz-confirm':
			mzBindFun.mzConfirm(content, yes, cancel, options);
			break;
		case 'mz-msg':
			break;
		case 'mz-open':
			break;
	}
}

/**
 * 调用绑定之前所用的函数
 * @param obj 当前DOM对象
 * @param layer 当前layer对象
 */
function beforeFun(obj,layer){
	//保存当前的DOM对象
	commentParams.obj = obj;
	commentParams.layer = layer;
	return false;
}

/**
 * 调用之后，清空内容
 * @returns {boolean}
 */
function alterFun(){
	return false;
}

/**
 * 调用结束
 */
function endFun(){
	return false;
}

/**
 * 阻止冒泡事件 和 阻止预发生事件
 * @param obj 当前DOM对象
 * @param evt WINDOWS event函数
 * @param stop attr DOM元素属性，是否阻止预发生事件 default false
 */
function prevent(obj, evt,stop) {
	var e = (evt) ? evt : window.event;
	if (window.event) {
		if(!commentParams.stop){
			window.event.returnValue = false;
		}
		e.cancelBubble = true;     // ie下阻止冒泡
	} else {
		if(!commentParams.stop){
			e.preventDefault();
		}
		e.stopPropagation();     // 其它浏览器下阻止冒泡
	}
}

/**
 * a标签跳转函数
 * @param index 当前的layer层次
 * @constructor 当前的弹出层DOM对象
 */
function Location(index, layero){
	window.location.href = commentParams.obj.attr('href');
}