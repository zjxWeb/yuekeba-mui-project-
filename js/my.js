//公共js
//跳转界面
function openPage(id,url,ani){
					mui.openWindow({ 
						id: id,
						url: url,
						styles: {
							popGesture: "none"
						},
						show: {
							aniShow: ani
						},
						waiting: {
							autoShow: false
						}
					})
				}
