var mzAjax = {
	'options' : {type : 'POST', async : true, dataType : 'json',jsonp : 'callback'},
	'onStart' : function(url,data){
		this.before();
		$.ajax({
			url : url, type : this.options.type, async : this.options.async, dataType : this.options.dataType,
			jsonp : this.options.jsonp ,data : data,headers: this.options.headers,
			beforeSend : this.onBefore, complete : this.onComplete, success : this.onSuccess, error : this.onError
		});
	},
	'before' : function(){
		//get Token
		if(mzAjax.options.type.toUpperCase() == 'POST'){
			this.options.headers = {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			};
		}
	},
	'onBefore' : function(){

	},
	'onComplete' : function () {
		//reset mzAjax value
		mzAjax = mzAjaxCache;
	},
	'onSuccess' : function(data){

	},
	'onError' : function(data){
		throw data;
	}
};
//clone
var mzAjaxCache = $.extend(true, {}, mzAjax);
