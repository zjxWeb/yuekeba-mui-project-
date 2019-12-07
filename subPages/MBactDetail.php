<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title></title>
    <script src="../js/mui.min.js"></script>
    <link href="../css/mui.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="../css/sub.style.css" />
    <link rel="stylesheet" href="../css/icon.style.css" />
    <!--<script type="text/javascript" charset="utf-8">
      	mui.init({ 
    	pullRefresh : { 
	        container:"#refreshDiv",//下拉刷新容器标识，querySelector能定位的css选择器均可，比如：id、.class等    
	        down : {
	            contentdown : "下拉刷新",//可选，在下拉可刷新状态时，下拉刷新控件上显示的标题内容 
	            contentover : "释放立即刷新",//可选，在释放可刷新状态时，下拉刷新控件上显示的标题内容 
	            contentrefresh : "正在刷新...",//可选，正在刷新状态时，下拉刷新控件上显示的标题内容 
	            callback : pullDown //必选，刷新函数，根据具体业务来编写，比如通过ajax从服务器获取新数据；
	        },
	        up : {
	        contentdown: '显示更多评论',
            contentrefresh : "正在加载...",//可选，正在加载状态时，上拉加载控件上显示的标题内容 
            contentnomore:'没有更多评论了',//可选，请求完毕若没有更多数据时显示的提醒内容； 
            callback : pullUp //必选，刷新函数，根据具体业务来编写，比如通过ajax从服务器获取新数据； 
        	} },
        	swipeBack:true
		});
		function pullDown(){
			//以下代码保留
			/*mui.get('list.html',{ //请求接口地址
			    state:'list'   // 参数  键 ：值
			    },function(data){ // data为服务器端返回数据
			    //获得服务器响应 ... 
			    	console.log(data);
			    	alert('12');
			    },'json' 
			);*/
			mui.alert('下拉刷新');
			//隐藏下拉刷新字样。。
			mui('#pullrefreshContainer').pullRefresh().endPulldownToRefresh();

		}
		function pullUp(){
			/*mui.get('list.html',{ //请求接口地址
			    state:'list'   // 参数  键 ：值
			    },function(data){ // data为服务器端返回数据
			    //获得服务器响应 ... 
			    },'json' 
			);*/
			
			//为true不加载重复数据，为false则无限加载
			this.endPullupToRefresh(true); 
		}
    </script>-->
</head>
<body>
	<?php
		if($_GET[id])
			$id = $_GET[id];
		else $id = 1;
		$co = new mysqli("localhost","root","do","kc" );
		 if ($conn->connect_errno) {
        echo $conn->connect_error;
   }
    //$re->query("use kc");
    $qu = ("select * from "."class where id="."'".$id."'");
    echo $qu;
    $re = $co->query($qu);
//  echo $re;
	$i = 0;
    while ($row=$re->fetch_row()) {
        foreach ($row as $key => $value) {
            $ar[$i]=$value;
            $i++;
        }
    }
    $i=1;
		?>
	<div id="pullrefresh" class="mui-content mui-scroll-wrapper">
		<div class="mui-scroll">
			<div class="detail-cover" style="background: url(../images/shu.webp) no-repeat center;background-size: cover;">
				<div class="detail-cover-musk">
					<div class="detail-title"><span class="info"></span></div>
					<div class="detail-user-brief">
						<div class="detail-avatar"><img class="info" src="../images/<?php echo $ar[0]; ?>.webp" alt="" /></div>
						<div class="detail-user">
							<div class="detail-username info" id="name"><?php echo $ar[$i];$i++ ?>(<?php echo $ar[$i];$i++ ?>)</div>
							<div class="detail-userattr" id="yijuhua"><?php echo $ar[$i];$i++ ?></div>
						</div>
					</div>
					<div class="detail-act-brief">
						<div class="detail-act-location mui-ellipsis"><span class="public-icon icon-location3"></span><span style="font-size: 14px;">上课地点：</span><span class="info" style="font-size: 14px;" id="shangkedidian"><?php echo $ar[$i];$i++ ?></span></div>
						<div class="detail-act-duration"><span class="public-icon icon-clock"></span><span style="font-size: 14px;">上课时间：</span><span class="info" style="font-size: 14px;" id="shangkeshijain"><?php echo $ar[$i];$i++ ?></span></div>
						<div class="detail-act-duration mui-ellipsis"><span class="public-icon icon-user2"></span>人数进度：<div class="detail-progress-box"><div class="detail-progress info" style="width:100%;"></div></div><label class="info" id="dangqianrenshu"><?php echo $ar[$i];$i++ ?></label>/<label class="info" id="zongrenshu"><?php echo $ar[$i];$i++ ?></label>人</div>
						<div class="detail-datass">
							<p class="" >原价：<span id="yuanjia"><?php echo $ar[$i];$i++ ?></span></p>
							<h4>众筹价 ¥<span id="xianjia"><?php echo ($ar[$i]*$ar[$i-1]/100); ?>元</span> <span class="concessional-rate">优惠<span id="youhui"><?php echo $ar[$i];$i++ ?></span>%</span></h4>
						</div>
						<!--<div class="detail-data">
							<div class="detail-data-cell">
								<span>课程收费</span>
								<div class="info">1200<span>元/人</span></div>
							</div>
							<div class="detail-data-cell">
								<span>关注人数</span>
								<div class="info">409<span>人</span></div>
							</div>
							<div class="detail-data-cell">
								<span>排名第<label>1</label></span>
								<span>评论<label class="info">0</label>条</span>
							</div>
						</div>-->
					</div>
				</div>
			</div>
			<div class="detail-body">
				<ul class="mui-table-view">
					<li class="mui-table-view-cell public-position-relative">
						<div class="detail-cell-title" id="gaiyao">课程概要：</div>
						<div class="detail-state-icon">进行中</div>
						<div>
							<div class="mui-icon icon-paperplane detail-cell-brief"><span>本课程还需要<label class="info">0</label>位学员</span></div>
							<div class="mui-icon icon-paperplane detail-cell-brief"><span id="time"><label id="day">3</label>天<label>18</label>小时<label>20</label>分后开始上课</span></div>
							<div class="mui-icon icon-paperplane detail-cell-brief"><span>详情请加入QQ群了解 <label class="info">5175399787</label></span></div>
							<div class="mui-btn detail-concern-btn" id="like" state='0'>+关注<span class="info">322</span></div>
						</div>
					</li>
				</ul>
				<div class="public-thin-top"></div>
				<ul class="mui-table-view">
					<li class="mui-table-view-cell public-position-relative">
						<div class="detail-cell-title" id="jieshao">教师介绍：<br><?php echo $ar[$i];$i++ ?></div>
						<div class="detail-content">
							<p class="info" id="jieshao"></p>
							<!--<img class="info" src="../images/lj.webp"/>-->
							<div style="height: 10px;"></div>
							<div class="detail-cell-title" style="margin-left: -32px;">教师风格：</div>
							<p class="info" id="fengge"></p>
							<img class="info" src="../images/ljsk1.webp"/>
						</div>
					</li>
				</ul>
				<div class="public-thin-top"></div>
				<ul class="mui-table-view">
					<li class="mui-table-view-cell public-position-relative">
						<div class="detail-cell-title" id="huibao">项目回报：<br><?php echo $ar[$i];$i++ ?></div>
						<div class="detail-content">
							<p class="info" id="huibao"></p>
							<!--<p>2.若众筹不成功，则所有款项原路返回至报名者账户。</p>
							<p>3.凡参加此课程的学员，均可根据政策享受一定优惠。</p>-->
						</div>
					</li>
				</ul>
				<div class="public-thin-top"></div>
				<div id="div_list1">
					<ul class="mui-table-view">
					<div class="detail-cell-title"><span style="margin-left: 15px;">学员评论：</span><div id="reply" class="mui-pull-right mui-btn detail-discuz-add-btn"><label class="icon-pen"></label>写评论</div></div>
					<div id="div_list">
						<!--<li class="mui-table-view-cell detail-discuz-cell">
							<div class="detail-discuz">
								<div class="detail-discuz-avatar"><img src="../images/light.webp" /></div>
								<div class="detail-discuz-main">
									<div class="detail-discuz-username mui-ellipsis">幸福的鱼<span>♂</span></div>
									<div class="detail-discuz-timeplace">6分钟前<span>七里河区龚家湾</span></div>
									<div class="detail-discuz-content">你好，我想参加活动，我想尽自己的一份力，支持你们！</div>
								</div>
							</div>
						</li>-->
					</div>
						<li class="mui-table-view-cell detail-discuz-cell">
							<div class="detail-discuz">
							<div class="detail-discuz-avatar"><img src="../images/crop1.webp" /></div>
								<div class="detail-discuz-main">
									<div class="detail-discuz-username mui-ellipsis detail-discuz-female red">潇雪水寒<span>♀</span></div>
									<div class="detail-discuz-timeplace">2018-7-12<span>城关区南关十字</span></div>
									<div class="detail-discuz-content">很期待老师来给我们上课。</div>
								</div>
							</div>
						</li>
						<li class="mui-table-view-cell detail-discuz-cell">
							<div class="detail-discuz">
							<div class="detail-discuz-avatar"><img src="../images/crop10.webp" /></div>
								<div class="detail-discuz-main">
									<div class="detail-discuz-username mui-ellipsis detail-discuz-female blue">还没睡的。吼起<span>♂</span></div>
									<div class="detail-discuz-timeplace">2018-7-5<span>安宁区西北师范大学</span></div>
									<div class="detail-discuz-content">路过。。</div>
								</div>
							</div>
						</li>
						<li class="mui-table-view-cell detail-discuz-cell">
							<div class="detail-discuz">
							<div class="detail-discuz-avatar"><img src="../images/crop13.webp" /></div>
								<div class="detail-discuz-main">
									<div class="detail-discuz-username mui-ellipsis detail-discuz-female red">Ｓingle °凉兮<span>♀</span></div>
									<div class="detail-discuz-timeplace">2018-6-8<span>安宁区刘家堡广场</span></div>
									<div class="detail-discuz-content">太感谢李娟老师了，我的基础比较弱，李娟老师讲的比较基础、细致，一次就通过了初级会计职称考试，感谢李老师，感谢环球网校。</div>
								</div>
							</div>
						</li>
						<li class="mui-table-view-cell detail-discuz-cell">
							<div class="detail-discuz">
							<div class="detail-discuz-avatar"><img src="../images/crop11.webp" /></div>
								<div class="detail-discuz-main">
									<div class="detail-discuz-username mui-ellipsis detail-discuz-female blue">厌学的小骚年<span>♂</span></div>
									<div class="detail-discuz-timeplace">2018-6-16<span>城关区雁滩</span></div>
									<div class="detail-discuz-content">我很喜欢李老师的课，思路清晰，2018年的实务靠你了！</div>
								</div>
							</div>
						</li>
						<li class="mui-table-view-cell detail-discuz-cell">
							<div class="detail-discuz">
							<div class="detail-discuz-avatar"><img src="../images/crop12.webp" /></div>
								<div class="detail-discuz-main">
									<div class="detail-discuz-username mui-ellipsis detail-discuz-female red">数学太虐心i<span>♀</span></div>
									<div class="detail-discuz-timeplace">2018-5-30<span>七里河区彭家坪</span></div>
									<div class="detail-discuz-content">非常非常感谢李娟老师，让我一次通过了初级会计职称考试。</div>
								</div>
							</div>
						</li>
				    </ul>
				</div>
				
				<!--<ul class="mui-table-view">
					<li class="mui-table-view-cell">
						<button type="button" class="mui-btn-row detail-discuz-more">更多讨论</button>
					</li>
				</ul>-->
				<div class="public-empty-row"></div>
			</div>
			 <!--<div style="height: 20px;"></div>-->
				<div id="reply_input" class="reply-bottom-input" style="display: none;">
			    	<input id="text" type="text" />
			    	<button id="send">发送</button>
			    </div>
		</div>
		
	</div>
	<script src="../js/castapp.js"></script>
    <script>
    	ca.init();
    	
		ca.refreshLoad('pullrefresh',function(clearLoad){
			     div_list.innerHTML='';
			      get_mesg();
			    //alert('下拉刷新了');
			    clearLoad();
			      
			},function(dataState){
			      
			    //alert('上拉加载了');
			    dataState(true);
			      
			});
    	
    	//获取数据
    	var iid=localStorage.getItem('iid');
    	
    	var time=ca.id('time');
    	var day=ca.id('day');
    	
    	var info=ca.className('info');
    	var info1=ca.className('info1');
    	var div_list=ca.id('div_list');
    	
    	var login_phone=localStorage.getItem('phone');
    	var request_url=localStorage.getItem('request_url');
    	get_mesg();
    	function get_mesg(){
    		var request_url=localStorage.getItem('request_url');
    		var img_url=localStorage.getItem('img_url');
    	ca.get({
    		url:request_url+'Info/get_one',
    		data:{
    			id_data:iid
    		},
    		succFn:function(data){
    			var all_json=JSON.parse(data);
    			var json=all_json['0'];
    			info['0'].innerHTML=json.theme;
    			info['1'].src=img_url+json.user_data.touxiang;
    			info['2'].innerHTML=json.user_data.nickname;
    			info['3'].innerHTML=json.place;
    			info['4'].innerHTML=json.act_time;
    			info['5'].style.width=(json.sign_in/json.number)*100+'%';
    			info['6'].innerHTML=json.sign_in+'/'+json.number;
    			info['7'].innerHTML=json.sign_in*json.fee+'元';
    			info['8'].innerHTML=json.like+'人';
    			info['10'].innerHTML=json.number;
    			info['11'].innerHTML=json.fee;
    			info['12'].innerHTML=json.like;
    			info['13'].innerHTML=json.theme;
    			info['14'].src=json.imgo;
    			info['15'].innerHTML=json.pro_content;
    			info['16'].src=json.imgt;
    			info['17'].innerHTML=json.pro_bright;
    			info['18'].innerHTML="1."+json.report;
    			
    			//倒计时
    			
		 		//StringToDate
//  			time.innerHTML=json.next_time;
//  			var t=StringToDate(time.innerHTML);
//  			alert(t);
//  			var date=new Date();
//		 		var year=date.getFullYear();
//		 		var month=date.getMonth()+1;
//		 		var day=date.getDate();
//		 		var h=date.getHours();
//		 		var m=date.getMinutes();
//		 		var t=year +'-'+month +'-'+ day + h+':'+m;
//			    time.innerHTML=json.next_time;


				//alert(d);
  			//alert(time.innerHTML);
//  			alert(day.innerHTML);
    		
    			var reply_arr=all_json['1'];
    			info['9'].innerHTML=reply_arr.length;
    			for(var a=0;a<reply_arr.length;a++){
    				var user1=reply_arr[a].user;
    				var tmpl='<li class="mui-table-view-cell detail-discuz-cell">'
						+'<div class="detail-discuz">'
    				+'<div class="detail-discuz-avatar"><img src="'+img_url+user1.touxiang+'" /></div>'
							+'<div class="detail-discuz-main">'
								+'<div class="detail-discuz-username mui-ellipsis">'+user1.nickname+'<span>♂</span></div>'
								+'<div class="detail-discuz-timeplace">'+reply_arr[a].time+'</div>'
								+'<div class="detail-discuz-content">'+reply_arr[a].content+'</div>'
							+'</div>'
							+'</div>'
					        +'</li>';
							div_list.innerHTML+=tmpl;
    			}
    			
    		}
    	});
    	}
    	//写评论
    	var reply=ca.id('reply');
    	var reply_input=ca.id('reply_input');
    	var text=ca.id('text');
    	var send=ca.id('send');
    	reply.addEventListener('tap',function(){
    		reply_input.style.display="block";
    	});
    	send.addEventListener('tap',function(){
    		var content=text.value;
    		if(content==''){
    			ca.prompt('请写出您的评论');
    			return;
    		}
    	
    	
    	ca.get({
    		url:request_url+'User/add_reply',
    		data:{
    			phone_data:login_phone,
    			iid_data:iid,
    			content_data:content
    		},
    		succFn:function(data){
    			if(data==1){
    				
    				text.value='';
    				div_list.innerHTML='';
    				get_mesg();
    				
    			}else{
    				ca.prompt('网络延迟');
    			}
    		}
    	})
    });
    //关注
		
		var like=ca.id('like');
		like.addEventListener('tap',function(){
			var state=this.getAttribute('state');
			ca.get({
					url:request_url+'User/add_like',
					data:{
						phone:login_phone,
						iid:iid,
						state:state
					},
					succFn:function(data){
						if(data==1){
							//首先要更改话题喜欢的数量
							//其次改变颜色，和state的值
							var like_num=parseInt(info['8'].innerHTML);
							if(state==0){
								like_num++;
								like.style.background="#E54017";
								like.style.color="#fff";
								like.setAttribute('state','1');
								info['8'].innerHTML=like_num;
							}else{
								like_num--;
								like.style.color="#333";
								like.style.background="#fff";
								like.setAttribute('state','0');
								info['8'].innerHTML=like_num;
							}
							info['5'].innerHTML=like_num;
							info['8'].innerHTML=like_num;
							ca.prompt('关注成功');
							
						}else{
							ca.prompt('操作失败');
						}
					}
				})
			});
      

    </script>	
</body>
</html>