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
        $qu = ("select id from class where type like "."'".'%'.$text_Ar[$i].'%'."'");
       // echo ("qu=".$qu."<br>");
        $re = $msq->query($qu);
        //print_r("re=".$re."<br>");
           while($row = $re->fetch_row()) {
            foreach($re as $value){
                foreach($value as $va){
                    $str = $str.$va.",";
                }
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
?>