<?php
include("config.php");
include("functions.php");
$dz = explode("/",$_SERVER['PATH_INFO']);

     if(!empty($dz['2']))
     {
     $rssstring = processURL("http://gdata.youtube.com/feeds/videos/".$dz['2']."");
     preg_match_all("#<title(.*?)>(.*?)</title>#s",$rssstring,$titles);
     preg_match_all("#<media:description type='plain'>(.*?)</media:description>#s",$rssstring,$desc);
     $__title=$titles[2][0];
     }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=strip_tags($_REQUEST['search_query']);?><?=$__title;?> youtube meta search</title>
<meta name="description" content="<?=$desc['1']['0'];?>"/>
<!-- Add My Libraries -->


<!-- Add jQuery library -->
<script type="text/javascript">
<script type="text/javascript" src="../lib/jquery-1.10.1.min.js", "js")
</script>
<!-- Add jQuery library -->
<script type="text/javascript" src="../lib/jquery-1.10.1.min.js"></script>

<!-- Add mousewheel plugin (this is optional) -->
<script type="text/javascript" src="../lib/jquery.mousewheel-3.0.6.pack.js"></script>

<!-- Add fancyBox main JS and CSS files -->
<script type="text/javascript" src="../source/jquery.fancybox.js?v=2.1.5"></script>
<script type="text/javascript" src="../source/jquery.fancybox.css?v=2.1.5" media="screen" />

<!-- Add Button helper (this is optional) -->
<script type="text/javascript" src="../source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
<script type="text/javascript" src="../source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>

<!-- Add Thumbnail helper (this is optional) -->
<script type="text/javascript" src="../source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
<script type="text/javascript" src="../source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

<!-- Add Media helper (this is optional) -->
<script type="text/javascript" src="../source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

<script type="text/javascript">
		$(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */

			$('.fancybox').fancybox();

			/*
			 *  Different effects
			 */

			// Change title type, overlay closing speed
			$(".fancybox-effects-a").fancybox({
				helpers: {
					title : {
						type : 'outside'
					},
					overlay : {
						speedOut : 0
					}
				}
			});

			// Disable opening and closing animations, change title type
			$(".fancybox-effects-b").fancybox({
				openEffect  : 'none',
				closeEffect	: 'none',

				helpers : {
					title : {
						type : 'over'
					}
				}
			});

			// Set custom style, close if clicked, change title type and overlay color
			$(".fancybox-effects-c").fancybox({
				wrapCSS    : 'fancybox-custom',
				closeClick : true,

				openEffect : 'none',

				helpers : {
					title : {
						type : 'inside'
					},
					overlay : {
						css : {
							'background' : 'rgba(238,238,238,0.85)'
						}
					}
				}
			});

			// Remove padding, set opening and closing animations, close if clicked and disable overlay
			$(".fancybox-effects-d").fancybox({
				padding: 0,

				openEffect : 'elastic',
				openSpeed  : 150,

				closeEffect : 'elastic',
				closeSpeed  : 150,

				closeClick : true,

				helpers : {
					overlay : null
				}
			});

			/*
			 *  Button helper. Disable animations, hide close button, change title type and content
			 */

			$('.fancybox-buttons').fancybox({
				openEffect  : 'none',
				closeEffect : 'none',

				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,

				helpers : {
					title : {
						type : 'inside'
					},
					buttons	: {}
				},

				afterLoad : function() {
					this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
				}
			});


			/*
			 *  Thumbnail helper. Disable animations, hide close button, arrows and slide to next gallery item if clicked
			 */

			$('.fancybox-thumbs').fancybox({
				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,
				arrows    : false,
				nextClick : true,

				helpers : {
					thumbs : {
						width  : 50,
						height : 50
					}
				}
			});

			/*
			 *  Media helper. Group items, disable animations, hide arrows, enable media and button helpers.
			*/
			$('.fancybox-media')
				.attr('rel', 'media-gallery')
				.fancybox({
					openEffect : 'none',
					closeEffect : 'none',
					prevEffect : 'none',
					nextEffect : 'none',

					arrows : false,
					helpers : {
						media : {},
						buttons : {}
					}
				});

			/*
			 *  Open manually
			 */

			$("#fancybox-manual-a").click(function() {
				$.fancybox.open('1_b.jpg');
			});

			$("#fancybox-manual-b").click(function() {
				$.fancybox.open({
					href : 'iframe.html',
					type : 'iframe',
					padding : 5
				});
			});

			$("#fancybox-manual-c").click(function() {
				$.fancybox.open([
					{
						href : '1_b.jpg',
						title : 'My title'
					}, {
						href : '2_b.jpg',
						title : '2nd title'
					}, {
						href : '3_b.jpg'
					}
				], {
					helpers : {
						thumbs : {
							width: 75,
							height: 50
						}
					}
				});
			});


		});
	</script>




<script>function mousOverImage(name,id,nr){if(name)imname = name;imname.src = "http://img.youtube.com/vi/"+id+"/"+nr+".jpg";nr++;if(nr > 3)nr = 1;timer =  setTimeout("mousOverImage(false,'"+id+"',"+nr+");",500);}</script>
<!-- Fancybox head -->
	<title>fancyBox - Fancy jQuery Lightbox Alternative | Demonstration</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<!-- Add jQuery library -->
	<script type="text/javascript" src="../lib/jquery-1.10.1.min.js"></script>

	<!-- Add mousewheel plugin (this is optional) -->
	<script type="text/javascript" src="../lib/jquery.mousewheel-3.0.6.pack.js"></script>

	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="../source/jquery.fancybox.js?v=2.1.5"></script>
	<link rel="stylesheet" type="text/css" href="../source/jquery.fancybox.css?v=2.1.5" media="screen" />

	<!-- Add Button helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="../source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
	<script type="text/javascript" src="../source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>

	<!-- Add Thumbnail helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="../source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
	<script type="text/javascript" src="../source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

	<!-- Add Media helper (this is optional) -->
	<script type="text/javascript" src="../source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */

//$('.fancybox').fancybox();
$(".fancybox").fancybox({
    beforeShow : function() {
        var alt = this.element.find('img').attr('alt');
        
        this.inner.find('img').attr('alt', alt);
        
        this.title = alt;
    }
});

			/*
			 *  Different effects
			 */

			// Change title type, overlay closing speed
			$(".fancybox-effects-a").fancybox({
				helpers: {
					title : {
						type : 'outside'
					},
					overlay : {
						speedOut : 0
					}
				}
			});

			// Disable opening and closing animations, change title type
			$(".fancybox-effects-b").fancybox({
				openEffect  : 'none',
				closeEffect	: 'none',

				helpers : {
					title : {
						type : 'over'
					}
				}
			});

			// Set custom style, close if clicked, change title type and overlay color
			$(".fancybox-effects-c").fancybox({
				wrapCSS    : 'fancybox-custom',
				closeClick : true,

				openEffect : 'none',

				helpers : {
					title : {
						type : 'inside'
					},
					overlay : {
						css : {
							'background' : 'rgba(238,238,238,0.85)'
						}
					}
				}
			});

			// Remove padding, set opening and closing animations, close if clicked and disable overlay
			$(".fancybox-effects-d").fancybox({
				padding: 0,

				openEffect : 'elastic',
				openSpeed  : 150,

				closeEffect : 'elastic',
				closeSpeed  : 150,

				closeClick : true,

				helpers : {
					overlay : null
				}
			});

			/*
			 *  Button helper. Disable animations, hide close button, change title type and content
			 */

			$('.fancybox-buttons').fancybox({
				openEffect  : 'none',
				closeEffect : 'none',

				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,

				helpers : {
					title : {
						type : 'inside'
					},
					buttons	: {}
				},

				afterLoad : function() {
					this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
				}
			});


			/*
			 *  Thumbnail helper. Disable animations, hide close button, arrows and slide to next gallery item if clicked
			 */

			$('.fancybox-thumbs').fancybox({
				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,
				arrows    : false,
				nextClick : true,

				helpers : {
					thumbs : {
						width  : 50,
						height : 50
					}
				}
			});

			/*
			 *  Media helper. Group items, disable animations, hide arrows, enable media and button helpers.
			*/
			$('.fancybox-media')
				.attr('rel', 'media-gallery')
				.fancybox({
					openEffect : 'elastic',
					closeEffect : 'elastic',
					prevEffect : 'fade',
					nextEffect : 'fade',

					arrows : true,
					helpers : {
						media : {},
						buttons : {}
					}
				});

			/*
			 *  Open manually
			 */

			$("#fancybox-manual-a").click(function() {
				$.fancybox.open('1_b.jpg');
			});

			$("#fancybox-manual-b").click(function() {
				$.fancybox.open({
					href : 'iframe.html',
					type : 'iframe',
					padding : 5
				});
			});

			$("#fancybox-manual-c").click(function() {
				$.fancybox.open([
					{
						href : '1_b.jpg',
						title : 'My title'
					}, {
						href : '2_b.jpg',
						title : '2nd title'
					}, {
						href : '3_b.jpg'
					}
				], {
					helpers : {
						thumbs : {
							width: 75,
							height: 50
						}
					}
				});
			});


		});
	</script>
	<style type="text/css">
		.fancybox-custom .fancybox-skin {
			box-shadow: 0 0 50px #222;
		}

		body {
	max-width: 700px;
	margin: 0 auto;
	background-color: #000000;
	margin-left: 0px;
	margin-right: 0px;
		}
	body,td,th {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	color: #006600;
	font-size: 10px;
}
a:link {
	color: #00FF00;
}
a:visited {
	color: #0066CC;
}
a:hover {
	color: #006600;
}
a:active {
	color: #FFFFFF;
}
</style>
<!-- End of Fancybox head --> 
<!-- Tubespider original css -->
<style type="text/css">
body {padding:1px;margin: 0px;color: #333;font-size: 11px;font-family: arial, helvetica, sans-serif;background-color:#000000;}
img{border:0px;}
h2 {border-left: 10px solid #636563;font-size: 18px;padding:5px;margin:5px;}
a{color: #ffffff;text-decoration: none; font-weight:bold}
a:hover{text-decoration: none;color: #cc0000;}
.content {padding:0px;border: #9c9c9c 1px solid;background: #fff;margin:auto;}
.mytop 
{
 position: fixed;
 height:55px;
 padding:0px 0px 0px 0px;
 background-color:#000000;
 margin: 0px;
 width:100%;
 z-index:9999;
 }
.mytop h1{font-size: 26px;padding: 10px 26px 10px 26px;color: #ffffff;text-decoration:none;margin:0px;}
.mytop h1 a {text-decoration:none;color:#fff;}
.center {
	background-color:#000000;
    padding:5px 2px 5px 5px;
    float: left;
    margin: 0px;
    left: 50%;
    right: 50%;
    width: 100%;
}
.left {padding:5px 2px 5px 5px;float: left;margin: 0px;width: 150px;}
.footer {background-color:#EDEDED;text-align: center;color:#000;clear: both;padding: 10px 0px 0px 10px;
margin:10px 0px 0px 0px;border-top: #9C9A9C 2px dashed;min-height:20px;}
#results{border-bottom:#CFCFCF 1px dashed; padding:5px; font-size:12px;float:left; height:150px;}
</style>

<!-- End of tubespider css -->

</head>
<body>
<div class="content">
    <div class="mytop">
        <h1><a href="/tubespider">Tube Spider</a> <?=$_text['lang03']." ".$_POST['search_query'];?></h1>
		</div>
<div class="center" align="center">
<br><br><br><br><br>
<form action="<?=$_URL;?>/index.php" id="content" method="post" name="v">
<div>
<?=$_text['lang01'];?>
</div>
<input name="search_query" value="<?=urldecode($_GET['search_query']);?>" type="text" style="width:200px; font-size:16px; font-weight:bold" />
<input name="search" type="hidden" value="v" />
<input name="" value="<?=$_text['lang02'];?>" type="submit" />
</form>

<?php
    if((isset($_POST['search'])) || ($dz['1']=="search"))
        {
            if(isset($_POST['search']))
            {
                $_POST['search_query']=$_POST['search_query'];
            }
            else
            {
                $_POST['search_query']=$dz['2'];
            }
            if (empty($_POST['search_query']))
            {
                echo "<div id=\"error\">".$_text['lang04']."</div>";
            }
            else
            {
?>

				<div id="allres">
					<?php
					$_out=get_vid(urlencode($_POST['search_query']),'50');
					$_n=count($_out);
					for($i=0;$i<$_n;$i++)
					{// results div for each video returned
						$_out[$i]['id']=str_replace("","",$_out[$i]['id']);
						echo "<div id=\"results\"> <a class=\"fancybox-media\" href=\"".$_HTP."www.youtube.com/watch?v=".$_out[$i]['id']."&autoplay=1\"><img alt=".substr($_out[$i]['title'],0,20)." style=\"width: 120px; height: 90px;\" src=\"".($_out[$i]['thumb'])."\"  ><p>".substr($_out[$i]['title'],0,20)."</p></a></div>\n";
					}
					?>
					</div>
				<?php
			}
		}
	  
	  
// viewer for selected video
if($dz['1']=="view"){youtube_t($dz['2']);}if((empty($dz['1'])) && (empty($_POST['search'])))
{
    $_out[$i]['id']=str_replace("","",$_out[$i]['id']);
    $_out=get_vid($_dv,$_conf['count']);$_n=count($_out);for($i=0;$i<$_n;$i++)
    {
	//http://www.youtube.com/watch?
	//.$_URL."/index.php/view/                                  
        echo "<div id=\"results\">\n";
		echo "<a class=\"fancybox-media\" href=\"".$_HTP."www.youtube.com/watch?v=".$_out[$i]['id']."&autoplay=1\">\n";
		echo "<img style=\"width: 120px; height: 90px;\" src=\"".($_out[$i]['thumb'])."\"  ><p>".substr($_out[$i]['title'],0,20)."</p></a> </div>\n";
    }
}
?>
</div> //end main content
<div class="left">PUT Stuff HERE</div>
<div class="footer"><a href="http://www.scriptme.com">Scriptme</a></div></div>
</body></html>
