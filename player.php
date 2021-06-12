<?php 
include("../../../wp-load.php");
$loading = plugins_url()."/gdriveplayer/loading.gif";
$url = $_GET["data"];
$url = urldecode($url);
$url = urldecode($url);
?>
<style type="text/css">*{margin:0;padding:0}#picasa{position:absolute;width:100%!important;height:100%!important}.jw-button-color:hover,.jw-toggle,.jw-toggle:hover,.jw-open,.jw-progress{color:#008fee!important;}.jw-active-option{background-color:#008fee!important;}.jw-progress{background:#008fee!important;}.jw-skin-seven .jw-toggle.jw-off{color:#fff!important}</style>
<center>    
        <iframe id="frame" style="width:100%; height:100%" src="<?php echo $url; ?>" allowfullscreen="true" frameborder="0" marginwidth="0" marginheight="0" scrolling="no"></iframe>
</center>
<?php echo get_post_meta("99", "gdrive_popup", $single = true); ?>
<?php 
$banner1 = get_post_meta("99", "gdrive_image_banner1", $single = true);
$banner2 = get_post_meta("99", "gdrive_image_banner2", $single = true);

$link1  = get_post_meta("99", "gdrive_link_banner1", $single = true);
$link2  = get_post_meta("99", "gdrive_link_banner2", $single = true);

if($banner1=="" && $banner2==""){} else { ?>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<style type="text/css">
.popUpBannerInner {
	max-width: 600px;
	margin: 0 auto;
}
.popUpBannerContent {
	position: fixed;
	top: 40px;
}
.closeButton {
	color: red;
	text-decoration: none;
	font-size: 18px;
}
	
	</style>
<div class="popUpBannerBox"> 
<div class="popUpBannerInner"> 
<div class="popUpBannerContent"> 
<table style="margin-left: auto; margin-right: auto;"><tr>
<td><a href="<?php echo $link1; ?>" target="_blank" rel="nofollow"><img style="width:100%"  src="<?php echo $banner1; ?>" ></a></td>
<td><a href="<?php echo $link2; ?>" target="_blank" rel="nofollow"><img style="width:100%"  src="<?php echo  $banner2; ?>"></a></td>
</tr></table>
<p><a href="#" class="closeButton" style="background:#000;display: block;text-align: center;">X Close Ads</a></p>
</div>
</div>
</div>
<script type="text/javascript">
	function showPopUpBanner() {
		$('.popUpBannerBox').fadeIn("2000");
	}
	setTimeout(showPopUpBanner, 1000);

	$('.popUpBannerBox').click(function(e) {
		if ( !$(e.target).is('.popUpBannerContent, .popUpBannerContent *' ) ) {
			$('.popUpBannerBox').fadeOut("2000");
			return false;
		}
	});

	$('.closeButton').click(function() {
		$('.popUpBannerBox').fadeOut("2000");
		return false;
	});
</script><?php } ?>