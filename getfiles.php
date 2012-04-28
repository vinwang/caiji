<?php
require('phpQuery-onefile.php');

//得到网页内容
$doc      = file_get_contents("http://www.stone365.com/news/maintain.aspx");
$dom = phpQuery::newDocument($doc);
//网页标题
//$title = pq("head > title")->text();
//$title = $dom['head > title']->text();
//获取a
$a = pq('ul li')->find('a');
foreach($a as $key){
	$url = pq($key)->attr('href');
	$t   = pq($key)->text();
	//$t = iconv('gbk','utf-8',$content);
	$content[$url] = $t;
}

//切割网页内容
/*function get_sub_content($str, $start, $end){
        if ( $start == '' || $end == '' ){
               return;
        }
        $str = explode($start, $str);
        $str = explode($end, $str[1]);
        return $str[0];
}
//取得代码中所有链接
*/
function get_all_url($code){
	//$pat = '/<a(.*?)href="(.*?)"(.*?)>(.*?)<\/a>/i';
    preg_match_all('/<a\s+href=[\"|\']?([^>\"\' ]+)[\"|\']?\s*[^>]*>([^>]+)<\/a>/i',$code,$arr);
    return array('name'=>$arr[2],'url'=>$arr[1]);
        }