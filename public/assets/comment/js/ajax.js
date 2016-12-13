var mzAjaxCache = mzAjax = {
	'options' : {type : 'POST', async : false, dataType : 'json',jsonp : 'callback'},
	'onStart' : function(url,data){
		$.ajax({
			url : url, type : this.options.type, async : this.options.async, dataType : this.options.dataType,
			jsonp : this.options.jsonp ,data : data,
			beforeSend : this.onBefore, complete : this.onComplete, success : this.onSuccess, error : this.onError
		});
	},
	'onBefore' : function(){
		//get Token
		if(mzAjax.options.type == 'POST'){
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
		}
	},
	'onComplete' : function () {
		//reset
		mzAjax = mzAjaxCache;
	},
	'onSuccess' : function(data){

	},
	'onError' : function(data){
		throw data;
	}
};