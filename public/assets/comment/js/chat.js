layui.use('layim', function(layim){
	//基础配置
	layim.config({

		init: {
			url: '' //接口地址（返回的数据格式见下文）
			,type: 'get' //默认get，一般可不填
			,data: {} //额外参数
		} //获取主面板列表信息，下文会做进一步介绍
		,title: 'Mz' //主面板最小化后显示的名称
		,min : false //用于设定主面板是否在页面打开时，始终最小化展现
		,right : '0px' //用于设定主面板右偏移量。该参数可避免遮盖你页面右下角已经的bar
		,minRight : "400px" //用户控制聊天面板最小化时、及新消息提示层的相对right的px坐标。
		,initSkin : "" //设置初始背景，默认不开启。可设置./css/modules/layim/skin目录下的图片文件名
		,notice: false //是否开启桌面消息提醒，即在浏览器之外的提醒
		,voice : false //设定消息提醒的声音文件（所在目录：./layui/css/modules/layim/voice/）
		,isfriend : true //是否开启好友
		,isgroup : true //是否开启分组
		,maxLength : 3000 //消息的最大长度
		,skin: {

		} //拓展背景
		//配置我的信息（如果设定了该参数，则优先读取该参数，如果没有，这读取init返回的mine信息）
		,mine: {
			"username": "LayIM体验者" //我的昵称
			,"id": "100000123" //我的ID
			,"status": "online" //在线状态 online：在线、hide：隐身
			,"sign": "在深邃的编码世界，做一枚轻盈的纸飞机" //我的签名
			,"avatar": "a.jpg" //我的头像
		}
		//获取群员接口（返回的数据格式见下文）
		,members: {
			url: '' //接口地址（返回的数据格式见下文）
			,type: 'get' //默认get，一般可不填
			,data: {} //额外参数
		}

		//上传图片接口（返回的数据格式见下文）
		,uploadImage: {
			url: '' //接口地址
			,type: 'post' //默认post
		}

		//上传文件接口（返回的数据格式见下文）
		,uploadFile: {
			url: '' //接口地址
			,type: 'post' //默认post
		}

		//扩展工具栏，下文会做进一步介绍（如果无需扩展，剔除该项即可）
		,tool: [{
			alias: 'code' //工具别名
			,title: '代码' //工具名称
			,icon: '&#xe64e;' //工具图标，参考图标文档
		}]

		,msgbox: layui.cache.dir + 'css/modules/layim/html/msgbox.html' //消息盒子页面地址，若不开启，剔除该项即可
		,find: layui.cache.dir + 'css/modules/layim/html/find.html' //发现页面地址，若不开启，剔除该项即可
		,chatLog: layui.cache.dir + 'css/modules/layim/html/chatLog.html' //聊天记录页面地址，若不开启，剔除该项即可
	});
});