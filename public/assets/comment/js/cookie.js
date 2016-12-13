var mzCookie = {
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
	}
};