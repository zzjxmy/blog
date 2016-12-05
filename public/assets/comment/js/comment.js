$(function(){
	layui.use(['layer', 'form'], function(){
		var layer = layui.layer
			,form = layui.form();
		var comment = {
			/**
			 * @param options obj
			 */
			'open' : function(options){
				layer.open(options);
			},
			/**
			 * @param message string
			 * @param options obj or Closure
			 * @param callback Closure
			 */
			'alert' : function(message,options,callback){
				layer.alert(message,options,callback);
			},
			/**
			 * @param content
			 * @param options
			 * @param yes
			 * @param cancel
			 */
			'confirm' : function(content, options, yes, cancel){
				layer.confirm(content, options, yes, cancel);
			}
		};

		var bind = {
			'mz-open' : function(){
				var dom = $(this);
				comment.open({
					'title' : dom.attr('title'),

				});
			}
		};
	});
});