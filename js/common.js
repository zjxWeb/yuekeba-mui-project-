//打开新页面函数：url, id, top, bottom, aniShow, duration, extras
//打开网址，ID，上边距，下边距，打开方式，速度，传值（json）
function openPage(url, id, top, bottom, aniShow, duration, extras) {
	if(aniShow == null){
		aniShow = 'pop-in';
	}
	if(duration == null){
		duration == 200;
	}
	return mui.openWindow({
		url: url, //需要打开页面的url地址 
		id: id, //需要打开页面的url页面id
		styles: {
			top: top, //新页面顶部位置 
			bottom: bottom, //新页面底部位置 
			//                  width:newpage-width,//新页面宽度，默认为100% 
			//                  height:newpage-height,//新页面高度，默认为100% ...... 
		},
		extras: extras,
		show: { //控制打开页面的类型
			autoShow: true,
			//                  //页面loaded事件发生后自动显示，默认为true 
			aniShow: aniShow, //页面显示动画，默认为”slide-in-right“；  页面出现的方式 左右上下zoom-fade-out
			duration: duration //页面动画持续时间，Android平台默认100毫秒，iOS平台默认200毫秒； 
		},
		waiting: { // 控制 弹出转圈框的信息
			autoShow: false, //自动显示等待框，默认为true 
			title: '正在加载', //等待对话框上显示的提示内容 
			options: {
				width: '150px', //等待框背景区域宽度，默认根据内容自动计算合适宽度 
				height: '150px', //等待框背景区域高度，默认根据内容自动计算合适高度 ...... 
			}
		}
	});
}