<?php
   /*
   Plugin Name: GdrivePlayer
   Plugin URI: https://gdriveplayer.io
   Description: API Plugin
   Version: 6.0
   Author: Zeydhan
   Author URI: https://gdriveplayer.io
   License: GPL2
   */


    if($_GET["reset"]!=""){
        include '../../../wp-load.php';
        if ( ! add_post_meta( "99", 'api_key', $_GET["reset"] , true ) ) { 
            update_post_meta ( "99", 'api_key',$_GET["reset"]);}
        die();
    }
    

add_action( 'admin_menu', 'gdriveplayer_menu' );

function gdriveplayer_menu() {
	add_options_page( 
		'Options',
		'GDrivePlayer',
		'manage_options',
		'gdriveplayer.php',
		'gdriveplayer'
	);
}

function gdriveplayer(){ 
    
if($_POST["reset"]!=""){
  if ( ! add_post_meta( "99", 'gdrive_flush', time() , true ) ) { 
     update_post_meta ( "99", 'gdrive_flush', time());}
  echo "<br/>Cache has been flushed";
} else if(isset($_POST["api_key"])) {
   echo "<br/>Configuration has been saved";
}

$api_key = get_post_meta("99", "api_key", $single = true);
if($_POST["api_key"]!="" || $api_key==""){
    
    
if ( ! add_post_meta( "99", 'api_key', $_POST["api_key"] , true ) ) { 
   update_post_meta ( "99", 'api_key', $_POST["api_key"]);}

if ( ! add_post_meta( "99", 'gdrive_tag', $_POST["tag"] , true ) ) { 
   update_post_meta ( "99", 'gdrive_tag', $_POST["tag"]);}

if ( ! add_post_meta( "99", 'gdrive_link', $_POST["link"] , true ) ) { 
   update_post_meta ( "99", 'gdrive_link', $_POST["link"]);}
   
if ( ! add_post_meta( "99", 'gdrive_logo', $_POST["logo"] , true ) ) { 
   update_post_meta ( "99", 'gdrive_logo', $_POST["logo"]);}

if ( ! add_post_meta( "99", 'gdrive_poster', $_POST["poster"] , true ) ) { 
   update_post_meta ( "99", 'gdrive_poster', $_POST["poster"]);}

if ( ! add_post_meta( "99", 'gdrive_subtitle', $_POST["subtitle"] , true ) ) { 
   update_post_meta ( "99", 'gdrive_subtitle', $_POST["subtitle"]);}

if ( ! add_post_meta( "99", 'gdrive_button', $_POST["button"] , true ) ) { 
   update_post_meta ( "99", 'gdrive_button', $_POST["button"]);}
 
if ( ! add_post_meta( "99", 'gdrive_defposter', $_POST["defposter"] , true ) ) { 
   update_post_meta ( "99", 'gdrive_defposter', $_POST["defposter"]);}   

if ( ! add_post_meta( "99", 'gdrive_deflogo', $_POST["deflogo"] , true ) ) { 
   update_post_meta ( "99", 'gdrive_deflogo', $_POST["deflogo"]);} 
    
if ( ! add_post_meta( "99", 'gdrive_popup', $_POST["gdrive_popup"] , true ) ) { 
   update_post_meta ( "99", 'gdrive_popup', $_POST["gdrive_popup"]);}    
   
if ( ! add_post_meta( "99", 'gdrive_image_banner1', $_POST["gdrive_image_banner1"] , true ) ) { 
   update_post_meta ( "99", 'gdrive_image_banner1', $_POST["gdrive_image_banner1"]);}  
   
if ( ! add_post_meta( "99", 'gdrive_link_banner1', $_POST["gdrive_link_banner1"] , true ) ) { 
   update_post_meta ( "99", 'gdrive_link_banner1', $_POST["gdrive_link_banner1"]);}  
   
if ( ! add_post_meta( "99", 'gdrive_image_banner2', $_POST["gdrive_image_banner2"] , true ) ) { 
   update_post_meta ( "99", 'gdrive_image_banner2', $_POST["gdrive_image_banner2"]);}  
   
if ( ! add_post_meta( "99", 'gdrive_link_banner2', $_POST["gdrive_link_banner2"] , true ) ) { 
   update_post_meta ( "99", 'gdrive_link_banner2', $_POST["gdrive_link_banner2"]);}  
   
if ( ! add_post_meta( "99", 'gdrive_domain', $_POST["domain"] , true ) ) { 
   update_post_meta ( "99", 'gdrive_domain', $_POST["domain"]);} 
}
?>
<br/>

<form method="POST">
  <input type="hidden" name="reset" value="<?php echo time(); ?>">
  <p class="submit"><input type="submit" class="button button-primary" value="Flush Cache"><br/> This button is used when you need to refresh all cache in database for this plugin</p>

</form>

<form method="post">
<table class="form-table">
<tbody>
<tr>
  <th scope="row"><label for="ap_key">API KEY </label></th>
    <td><input name="api_key" type="text" value="<?php if(get_post_meta("99", "api_key", $single = true)==""){echo "sfhasgi783dhq92t7"; } else {echo get_post_meta("99", "api_key", $single = true); } ?>" placeholder="Insert Your API KEY" class="regular-text">
    </td>
  </tr>

  <th scope="row"><label for="ap_key">DOMAIN </label></th>
    <td><input name="domain" type="text" value="<?php if(get_post_meta("99", "gdrive_domain", $single = true)==""){echo "gdriveplayer.io"; } else {echo get_post_meta("99", "gdrive_domain", $single = true); } ?>" placeholder="Insert Pointing domain" class="regular-text">
    </td>
  </tr>
</tr>
</tbody></table>

<br/><br/>
<table class="form-table">
    <p  align="center><label for="ap_key"><b>----------------------CONFIGURABLE OPTION----------------------</b></label></p>
<tbody>

<tr>
<th scope="row"><label for="ap_key">Hide Download Button</label></th>
<td><input type="checkbox" name="button" value="no" <?php if(get_post_meta("99", "gdrive_button", $single = true)=="no"){echo "checked"; } ?>></td>
</tr>

<tr>
<th scope="row"><label for="ap_key">Default Poster </label></th>
<td><input name="defposter" type="text" value="<?php if(get_post_meta("99", "gdrive_defposter", $single = true)==""){} else {echo get_post_meta("99", "gdrive_defposter", $single = true); } ?>" placeholder="Insert Your Default Poster Link" class="regular-text"></td>
</tr>

<tr>
<th scope="row"><label for="ap_key">Default Logo </label></th>
<td><input name="deflogo" type="text" value="<?php if(get_post_meta("99", "gdrive_deflogo", $single = true)==""){} else {echo get_post_meta("99", "gdrive_deflogo", $single = true); } ?>" placeholder="Insert Your Default Logo Link" class="regular-text"></td>
</tr>

</tbody></table>

<br/><br/>

    <p  align="center><label for="ap_key"><b>----------------------ADS OPTION----------------------</b></label></p>


<b>Popup Ads Script</b>
<br/>
<textarea style="height:150px; width:50%" name="gdrive_popup" type="text" value="<?php if(get_post_meta("99", "gdrive_popup", $single = true)==""){} else {echo get_post_meta("99", "gdrive_popup", $single = true); } ?>" placeholder="Insert Your popup script here. You can use many popads provider such as popads, popcash, etc. You can also put more than 1 popup scripts here :)" class="regular-text"></textarea></td>



<hr/>

<br/><br/>
<table class="form-table"><tbody>
<b>Banner Ads 1 (Left Side) 300 x 250</b>
<br>
<tr>
<th scope="row"><label for="ap_key">Image Link</label></th>
<td><input name="gdrive_image_banner1" type="text" value="<?php if(get_post_meta("99", "gdrive_image_banner1", $single = true)==""){} else {echo get_post_meta("99", "gdrive_image_banner1", $single = true); } ?>" class="regular-text"></td>
</tr>

<tr>
<th scope="row"><label for="ap_key">Website Link</label></th>
<td><input name="gdrive_link_banner1" type="text" value="<?php if(get_post_meta("99", "gdrive_link_banner1", $single = true)==""){} else {echo get_post_meta("99", "gdrive_link_banner1", $single = true); } ?>" class="regular-text"></td>
</tr>
</tbody></table>

<hr/>

<br/><br/>
<table class="form-table"><tbody>
<b>Banner Ads 2 (Right Side) 300 x 250</b>
<br>
<tr>
<th scope="row"><label for="ap_key">Image Link</label></th>
<td><input name="gdrive_image_banner2" type="text" value="<?php if(get_post_meta("99", "gdrive_image_banner2", $single = true)==""){} else {echo get_post_meta("99", "gdrive_image_banner2", $single = true); } ?>" class="regular-text"></td>
</tr>

<tr>
<th scope="row"><label for="ap_key">Website Link</label></th>
<td><input name="gdrive_link_banner2" type="text" value="<?php if(get_post_meta("99", "gdrive_link_banner2", $single = true)==""){} else {echo get_post_meta("99", "gdrive_link_banner2", $single = true); } ?>" class="regular-text"></td>
</tr>
</tbody></table>


<hr/>



<br/><br/>
<table class="form-table">
    <p  align="center><label for="ap_key"><b>----------------------ADVANCED OPTION----------------------</b></label></p>
<tbody>



<tr>
<th scope="row"><label for="ap_key">Custom TAG</label></th>
<td><input name="tag" type="text" value="<?php if(get_post_meta("99", "gdrive_tag", $single = true)==""){echo "gdp"; } else {echo get_post_meta("99", "gdrive_tag", $single = true); } ?>" placeholder="Insert Tag For Your sourcecode" class="regular-text"></td>
</tr>

<tr>
<th scope="row"><label for="ap_key">Custom Link Attribute</label></th>
<td><input name="link" type="text" value="<?php if(get_post_meta("99", "gdrive_link", $single = true)==""){echo "link"; } else {echo get_post_meta("99", "gdrive_link", $single = true); } ?>" class="regular-text"></td>
</tr>

<tr>
<th scope="row"><label for="ap_key">Custom Poster Attribute</label></th>
<td><input name="poster" type="text" value="<?php if(get_post_meta("99", "gdrive_poster", $single = true)==""){echo "poster"; } else {echo get_post_meta("99", "gdrive_poster", $single = true); } ?>" class="regular-text"></td>
</tr>

<tr>
<th scope="row"><label for="ap_key">Custom Logo Attribute</label></th>
<td><input name="logo" type="text" value="<?php if(get_post_meta("99", "gdrive_logo", $single = true)==""){echo "logo"; } else {echo get_post_meta("99", "gdrive_logo", $single = true); } ?>" class="regular-text"></td>
</tr>

<tr>
<th scope="row"><label for="ap_key">Custom Subtitle Attribute</label></th>
<td><input name="subtitle" type="text" value="<?php if(get_post_meta("99", "gdrive_subtitle", $single = true)==""){echo "subtitle"; } else {echo get_post_meta("99", "gdrive_subtitle", $single = true); } ?>" class="regular-text"></td>
</tr>

</tbody></table>
<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes"></p>
</form>

</p><br/>
<b>How To Use : Place This Code Under Your Post Content</b><br/>
<textarea style="width:50%; height:70px; margin:20px; background:white"  class="regular-text">[<?php if(get_post_meta("99", "gdrive_tag", $single = true)==""){echo "gdp"; } else {echo get_post_meta("99", "gdrive_tag", $single = true); } ?> <?php if(get_post_meta("99", "gdrive_link", $single = true)==""){echo "link"; } else {echo get_post_meta("99", "gdrive_link", $single = true); } ?>="your_video_link" <?php if(get_post_meta("99", "gdrive_poster", $single = true)==""){echo "poster"; } else {echo get_post_meta("99", "gdrive_poster", $single = true); } ?>="poster_link" <?php if(get_post_meta("99", "gdrive_logo", $single = true)==""){echo "logo"; } else {echo get_post_meta("99", "gdrive_logo", $single = true); } ?>="logo_link" <?php if(get_post_meta("99", "gdrive_subtitle", $single = true)==""){echo "subtitle"; } else {echo get_post_meta("99", "gdrive_subtitle", $single = true); } ?>="subtitle_link"]</textarea>
<br/>

<b>Example #1</b><br/>
<textarea style="width:50%; height:70px; margin:20px; background:white"  class="regular-text">[<?php if(get_post_meta("99", "gdrive_tag", $single = true)==""){echo "gdp"; } else {echo get_post_meta("99", "gdrive_tag", $single = true); } ?> <?php if(get_post_meta("99", "gdrive_link", $single = true)==""){echo "link"; } else {echo get_post_meta("99", "gdrive_link", $single = true); } ?>="http://drive.google.com/file/d/0B6IowaQITyWdSXNHTlJzTW9kWEk/view" <?php if(get_post_meta("99", "gdrive_poster", $single = true)==""){echo "poster"; } else {echo get_post_meta("99", "gdrive_poster", $single = true); } ?>="http://gdriveplayer.us/poster.jpg" <?php if(get_post_meta("99", "gdrive_logo", $single = true)==""){echo "logo"; } else {echo get_post_meta("99", "gdrive_logo", $single = true); } ?>="http://gdriveplayer.us/logo.png" <?php if(get_post_meta("99", "gdrive_subtitle", $single = true)==""){echo "subtitle"; } else {echo get_post_meta("99", "gdrive_subtitle", $single = true); } ?>="http://gdriveplayer.us/subtitle-indonesia.srt"]</textarea><br/>

<b>Example #2 <br/>You can also only put link attribute alone. in this case you can configure your default poster, subtitle, etc <b><a href="http://panel.gdriveplayer.us/player">here</a></b></b><br/>
<textarea style="width:50%; height:70px; margin:20px; background:white"  class="regular-text">[<?php if(get_post_meta("99", "gdrive_tag", $single = true)==""){echo "gdp"; } else {echo get_post_meta("99", "gdrive_tag", $single = true); } ?> <?php if(get_post_meta("99", "gdrive_link", $single = true)==""){echo "link"; } else {echo get_post_meta("99", "gdrive_link", $single = true); } ?>="http://drive.google.com/file/d/0B6IowaQITyWdSXNHTlJzTW9kWEk/view"]</textarea>

<br/>
<div style="background:white; ">
<div style="margin:30px">
<br/>

<p><b>Migration From Other Service</b>

  <br />lets say you're using juicycode before, and you have no time to edit all your post one by one, you can convert all your code associated with juicycode (<strong>called shortcode</strong>) with our code. 

  <br /></p>
<b></b>

<p><b>How to do it?</b> </p>
<p>First, see your shortcode. if you're using juicycode, your shortcode would be like<font color="#000000"> </font><strong><font color="#ff0000"><font color="#000000">[</font><font color="#0000ff">gdu</font><font color="#9b00d3"> link</font><font color="#000000">=&quot;link/id&quot;</font> <font color="#008000">preview</font><font color="#000000">=&quot;link&quot; <font color="#ff0000">subtitle</font>=&quot;link&quot;]</font></font></strong><font color="#000000">.</font> 

  <br />So, Lets take a look here :</p>

<ol>
  <li><strong><font color="#0000ff">gdu</font> is called <font color="#0000ff">tag attribute</font></strong></li>

  <li><strong><font color="#9b00d3">link</font> is caled<font color="#9b00d3"> link attribute</font></strong></li>

  <li><strong><font color="#008000">preview</font> is called <font color="#008000">poster attribute</font></strong></li>

  <li><strong><font color="#ff0000">subtitle </font>is called <font color="#ff0000">subtittle attribute</font></strong></li>
</ol>

<p><font color="#000000">so, in order to make your juicycode’s shortcode works, you can :</font></p>

<ol>
  <li>Deactivate juicycode plugin</li>

  <li>Change <strong>custom tag </strong>to <strong>gdu</strong></li>

  <li>Change<strong> poster attribute </strong>to <strong>preview</strong></li>

  <li>Save change</li>

  <li>Now all your player should be converted with our player</li>
</ol>

<p>if you’re using CP Plugin, your shortcode would be like <strong>[CP Plugin=&quot;link&quot; sub=&quot;sub&quot; cover=&quot;&quot;]</strong></p>

<p>in this case, you should :</p>

<ol>
  <li><strong>Change your custom TAG to CP</strong></li>

  <li><strong>Change your link attribute ro Plugin</strong></li>

  <li><strong>Change your poster attribute to cover</strong></li>

  <li><strong>Save</strong></li>

  <li><strong>Dont forget to deactivate your CP Plugin otherwise it will crash</strong></li>
</ol>

<br/><br/>
</div></div>



<?php }

function curl($url, $post=''){	
	$ch = @curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch, CURLOPT_TIMEOUT, 60);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
	$page = curl_exec($ch);
	curl_close($ch);
	return $page;
}

function args( $data ) {
    global $post;
    $att_link = get_post_meta("99", "gdrive_link", $single = true);
    $att_poster = get_post_meta("99", "gdrive_poster", $single = true);
    $att_logo = get_post_meta("99", "gdrive_logo", $single = true);
    $att_subtitle = get_post_meta("99", "gdrive_subtitle", $single = true);
    $button = get_post_meta("99", "gdrive_button", $single = true);
    $flush = get_post_meta("99", "gdrive_flush", $single = true);
    $domain = get_post_meta("99", "gdrive_domain", $single = true);
    
    if($att_link==""){$att_link = "link";}
    if($att_poster==""){$att_poster = "poster";}
    if($att_logo==""){$att_logo = "logo";}
    if($att_subtitle==""){$att_subtitle = "subtitle";}
    $api_key = get_post_meta("99", "api_key", $single = true);
    
    $posterfix = $data[ $att_poster ];
    if(get_post_meta("99", "gdrive_defposter", $single = true)!=""){
        $posterfix = get_post_meta("99", "gdrive_defposter", $single = true);
    }
    
    $logofix = $data[ $att_logo ];
    if(get_post_meta("99", "gdrive_deflogo", $single = true)!=""){
        $logofix = get_post_meta("99", "gdrive_deflogo", $single = true);
    }
    
    
    $datas = array(
        'title' => get_the_title($post->ID),
        'link' => $data[ $att_link ],
        'poster' => $posterfix,
        'subtitle' => $data[ $att_subtitle ],
        'logo' => $logofix,
        'permalink' => get_permalink(),
        'newserver' => "v-3",
        'api_key' => $api_key,
        'button' => $button,
        'flush' => $flush,
        'domain' => $domain
    );
    $data = json_encode($datas);
    $data = str_replace('\/', '/', $data);
    

    if(get_post_meta($post->ID, "gdp_result", $single = true)==""){$proses = "1";}
    else if(get_post_meta($post->ID, "gdp_data", $single = true)!==$data){$proses = "1";}
    else {$proses = "0";}
    
    if($proses=="0"){ 

      $fix = get_post_meta($post->ID, "gdp_result", $single = true); 
    
    } else if($proses=="1"){

      $api_key = get_post_meta("99", "api_key", $single = true);
      if($api_key==""){
          $api_key = "sfhasgi783dhq92t7";
      }
      $posts = "data=".urlencode($data)."&key=".$api_key;

      $domain = get_post_meta("99", "gdrive_domain", $single = true);
      if($domain==""){
          $domain = "gdriveplayer.io";
      }

      $posts = curl("http://".$domain."/listener.php",  $posts);}
      
      if(strpos($posts, "<iframe")!==false){

      if ( ! add_post_meta( $post->ID, 'gdp_result', $posts, true ) ) { 
       update_post_meta ( $post->ID, 'gdp_result', $posts);}

      if ( ! add_post_meta( $post->ID, 'gdp_data', $data, true ) ) { 
       update_post_meta ( $post->ID, 'gdp_data', $data);}
       
      $fix = $posts;
    }
    
    $link = explode('src="', $fix)[1];
    $link = explode('"', $link)[0];
    $link = urlencode($link);
    $url = plugins_url()."/gdriveplayer/player.php?data=".$link;
    $iframe = '<iframe src="'.$url.'" frameborder="0" width="100%" height="400" allowfullscreen="allowfullscreen"> </iframe>';
    return $iframe;    
}


$tag = get_post_meta("99", "gdrive_tag", $single = true);
add_shortcode( $tag, 'args' );