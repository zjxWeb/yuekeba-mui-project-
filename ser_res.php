<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title></title>
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<link href="css/mui.min.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="css/build -dream.css"/>
</head>

<body>
<header class="mui-bar mui-bar-nav index-header" style="background-color: #54bbfe;">
	<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
	<h1 class="mui-title">搜索到的老师</h1>
</header>
<div class="mui-content">
    <div class="near-teacher-box">
    	<ul class="near-teacher">
    		<?php
    $text = $_GET[text];
 //   $text = "会计 数学 英语";
    $text_Ar = explode(" ",$text);
   // print_r($text_Ar);
    $num = count($text_Ar);
    //echo ("num=".$num."<br>");
    $t=0;
    $msq = new mysqli("localhost","root","do","kc");
    for ($i=0;$i<$num;$i++ ){
        $qu = ("select * from class where type like "."'".'%'.$text_Ar[$i].'%'."'");
       // echo ("qu=".$qu."<br>");
        $re = $msq->query($qu);
          while($row = $re->fetch_row()) {
            foreach($re as $value){
                //echo $value[id]."<br>";
                echo('<a href = "./subPages/MBactDetail.php?id='.$value[id].'"><li class="teacher-one"><img src="images/jiaoshi'.$value[id].'.webp" /><div class="teacher-message"><p class="teacher-name"><span class="name-teacher">'.$value[name].'</span></p><h6><span class="blue">'.$value[type].'</span></h6><p class="teacher-infm mui-ellipsis">'.substr($value[jieshao],0,133).'...'.'</p></div></li></a>');
               // $str[$t] = $value;
               // $t++;
            }
           }
    }   
    //$strAr = array_unique(explode(",",$str));
    //echo ("str=".$str.'<br>');
    /*$str = array_values($str);
    print_r($str);*/
    echo $str;
?>    	</ul>
    </div>
</div>

<script src="js/mui.min.js"></script>
<script type="text/javascript">
	mui.init()
</script>
</body>

</html>