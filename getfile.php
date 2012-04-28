<?php

//得到网页内容
$doc = file_get_contents("http://www.stone365.com/news/maintain.aspx");
preg_match_all('/<a\s+href=[\"|\']?([^>\"\' ]+)[\"|\']?\s*[^>]*>([^>]+)<\/a>/i',$doc,$arr);
foreach($arr['1'] as $key=>$val){
	$b = strstr($val,'http://www.stone365.com');
	if($b){
		$url[] = $val;
	}
}

print_r($url);

//切割网页内容
function get_sub_content($str, $start, $end){
        if ( $start == '' || $end == '' ){
               return;
        }
        $str = explode($start, $str);
        $str = explode($end, $str[1]);
        return $str[0];
}