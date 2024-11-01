<?php
/*
Plugin Name: JDS WP Global
Plugin URI: http://2php.info/wordpress/wpglobal
Description: automatically Post Your Content In Other Languages, Increase Your Blog Traffic, Go Global. Gain 46% traffic you are losing by not publishing your content in other languages. Visit plugin site for more details.
Version: 1.0
Author: JDS Developers Ltd.
Author URI: http://jdsdevelopers.org
License: GPL2
*/
/*  Copyright 2013  JDS Developers Ltd.  (email : support@jdsdevelopers.org)

    This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License, version 2, as published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more details.

    You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

$blogurl = get_bloginfo ( 'wpurl' );

$processurl = $blogurl."/wp-content/plugins/jdswpglobal";

$redirecturl = $blogurl."/wp-admin/admin.php?page=jdswpglobal_topmenuslug";

global $wpdb;


add_action('admin_menu', 'jdswpglobal_top_menu');

function jdswpglobal_top_menu() {
add_menu_page('JDS WP Global Plugin', 'WP Global Settings', 'read', 'jdswpglobal_topmenuslug', 'jdswpglobal_settings_page');
}

function jdswpglobal_settings_page() {
global $wpdb;
$myrow21 = $wpdb->get_row( "SELECT * FROM ".$wpdb->prefix."jdswpglobaldata WHERE datanumber = '1'" );
?>
<div>
<h2 align="center"><font color="blue">
Congrats, You Just Earned 25 PayPoints For Installing This Plugin, You Can Redeem It By <a href="http://paypoints.org/?r=jdswpglobalinstall" target="_blank">Clicking Here</a>.
</font></h2><br><br>
<h2 align="center">JDS WP Global Settings Page</h2>
<?php
if($_POST[apikey]!="")
{
$sql1 = "UPDATE ".$wpdb->prefix."jdswpglobaldata SET apikey = '$_POST[apikey]', zhCN = '$_POST[zhCN]', es = '$_POST[es]', ja = '$_POST[ja]', pt = '$_POST[pt]', de = '$_POST[de]', fr = '$_POST[fr]', ru = '$_POST[ru]', categoryid = '$_POST[categoryid]' WHERE datanumber = '1'";
$wpdb->query($sql1);
?>
<font color="green">
Thank you for updating the settings :)<br><br>
</font>
<?php
}
?>
<font face="calibri" size="3">
Thank you for installing JDS WP Global Plugin. This plug in automatically post your english content in other language(s) you select below increasing your blog traffic by over 46%!
<br><br>Please fill the form below & click on save settings. If settings are not saved in one attempt, try second time and it will save.
<br><br>
<form action="<?php echo($redirecturl); ?>" method="post">
<strong>Your Google Translation API Key</strong> (Visit <a href="https://developers.google.com/translate/" target="_blank">Google Translate API Page</a> For Instructions To Get It)<br><input type="text" name="apikey" value="<?php echo($myrow21->apikey); ?>"><br><br>
<strong>Select Languages In Which You Want Your Content To Be Published</strong> (You Can Select More Than One)<br><br>
<input type="checkbox" name="zhCN" value="yes" <?php if($myrow21->zhCN=="yes") echo("checked"); ?>>Chinese<br>
<input type="checkbox" name="es" value="yes" <?php if($myrow21->es=="yes") echo("checked"); ?>>Spanish<br>
<input type="checkbox" name="ja" value="yes" <?php if($myrow21->ja=="yes") echo("checked"); ?>>Japanese<br>
<input type="checkbox" name="pt" value="yes" <?php if($myrow21->pt=="yes") echo("checked"); ?>>Portuguese<br>
<input type="checkbox" name="de" value="yes" <?php if($myrow21->de=="yes") echo("checked"); ?>>German<br>
<input type="checkbox" name="fr" value="yes" <?php if($myrow21->fr=="yes") echo("checked"); ?>>French<br>
<input type="checkbox" name="ru" value="yes" <?php if($myrow21->ru=="yes") echo("checked"); ?>>Russian<br>
<br>(This plugin is also available in Afrikaans, Albanian, Arabic, Azerbaijani, Basque, Bengali, Belarusian, Bulgarian, Catalan, Chinese Traditional, Croatian, Czech, Danish, Dutch, Esperanto, Estonian, Filipino, Finnish, Galician, Georgian, Greek, Gujarati, Haitian Creole, Hebrew, Hindi, Hungarian, Icelandic, Indonesian, Irish, Italian, Kannada, Korean, Latin, Latvian, Lithuanian, Macedonian, Malay, Maltese, Norwegian, Persian, Polish, Romanian, Serbian, Slovak, Slovenian, Swahili, Swedish, Tamil, Telugu, Thai,	Turkish, Ukrainian, Urdu, Vietnamese, Welsh, Yiddish. To request, please email support-wpglobal@2php.info)
<br><br>

<strong>Set Category ID To Post Other Language Content Into</strong> (<a href="http://www.wprecipes.com/how-to-find-wordpress-category-id" target="_blank">Click Here To Know How To Get Category ID</a>) <br>
<input type="text" name="categoryid" value="<?php echo($myrow21->categoryid); ?>"><br><br><input type="submit" value="Save Settings">
</form><br><br>
<h2 align="center"><font color="blue">
Congrats, You Just Earned 25 PayPoints For Installing This Plugin, You Can Redeem It By <a href="http://paypoints.org/?r=jdswpglobalinstall" target="_blank">Clicking Here</a>.
</font></h2><br>
</div>
<?php
}

function jdswpglobal_create_set_tables()
{
global $wpdb;

$sql1  = " CREATE TABLE IF NOT EXISTS ".$wpdb->prefix."jdswpglobaldata (";
	$sql1 .= "   `datanumber` varchar(100),";
	$sql1 .= "   `apikey` varchar(255),";
	$sql1 .= "   `zhCN` varchar(255),";
	$sql1 .= "   `es` varchar(255),";
	$sql1 .= "   `ja` varchar(255),";
	$sql1 .= "   `pt` varchar(255),";
	$sql1 .= "   `de` varchar(255),";
	$sql1 .= "   `fr` varchar(255),";
	$sql1 .= "   `ru` varchar(255),";
	$sql1 .= "   `categoryid` varchar(255),";
$sql1 .= "   PRIMARY KEY  (`datanumber`)";
	$sql1 .= " ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";


$wpdb->query($sql1);

$sql2 = "INSERT INTO ".$wpdb->prefix."jdswpglobaldata (datanumber) VALUES ('1')";

$wpdb->query($sql2);

}

register_activation_hook( __FILE__, 'jdswpglobal_create_set_tables' );

function jdswpglobal_del_tables()
{
global $wpdb;

$sql3 = "DROP TABLE ".$wpdb->prefix."jdswpglobaldata";

$wpdb->query($sql3);

}

register_deactivation_hook( __FILE__, 'jdswpglobal_del_tables' );


function jdswpglobal_postcontent($post_id)
{
if ( !wp_is_post_revision( $post_id ) && get_the_title( $post_id )!="Auto Draft" ) {

global $wpdb;
$myrow22 = $wpdb->get_row( "SELECT * FROM ".$wpdb->prefix."jdswpglobaldata" );

$jdspc = get_post($post_id);

if($myrow22->zhCN=="yes")
{
$url = "http://jdsdevelopers.org/jdswpglobalapi.php";
$fields = array(
            'content' => $jdspc->post_title,
            'apikey' => $myrow22->apikey,
            'categoryid' => $myrow22->categoryid,
            'sourcelang' => 'en',
            'targetlang' => 'zh-CN'
          );
foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
$fields_string = rtrim($fields_string, '&');
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, count($fields));
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$jdstitle = curl_exec($ch);
curl_close($ch);

$fields = array(
            'content' => $jdspc->post_content,
            'apikey' => $myrow22->apikey,
            'categoryid' => $myrow22->categoryid,
            'sourcelang' => 'en',
            'targetlang' => 'zh-CN'
          );
foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
$fields_string = rtrim($fields_string, '&');
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, count($fields));
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$jdscontent = curl_exec($ch);
curl_close($ch);

$jcptitle = $jdstitle;
$jcpcontent = $jdscontent;
  $my_post = array(
     'post_title' => $jcptitle,
     'post_content' => $jcpcontent,
     'post_status' => 'publish',
     'post_type' => 'post',
     'post_author' => 1,
     'post_category' => 1
  );
wp_insert_post( $my_post );
}//end if ZH CN

if($myrow22->es=="yes")
{
$url = "http://jdsdevelopers.org/jdswpglobalapi.php";
$fields = array(
            'content' => $jdspc->post_title,
            'apikey' => $myrow22->apikey,
            'categoryid' => $myrow22->categoryid,
            'sourcelang' => 'en',
            'targetlang' => 'es'
          );
foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
$fields_string = rtrim($fields_string, '&');
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, count($fields));
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$jdstitle = curl_exec($ch);
curl_close($ch);

$fields = array(
            'content' => $jdspc->post_content,
            'apikey' => $myrow22->apikey,
            'categoryid' => $myrow22->categoryid,
            'sourcelang' => 'en',
            'targetlang' => 'es'
          );
foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
$fields_string = rtrim($fields_string, '&');
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, count($fields));
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$jdscontent = curl_exec($ch);
curl_close($ch);

$jcptitle = $jdstitle;
$jcpcontent = $jdscontent;
  $my_post = array(
     'post_title' => $jcptitle,
     'post_content' => $jcpcontent,
     'post_status' => 'publish',
     'post_type' => 'post',
     'post_author' => 1,
     'post_category' => $myrow22->categoryid
  );
wp_insert_post( $my_post );
}//end if es

if($myrow22->ja=="yes")
{
$url = "http://jdsdevelopers.org/jdswpglobalapi.php";
$fields = array(
            'content' => $jdspc->post_title,
            'apikey' => $myrow22->apikey,
            'categoryid' => $myrow22->categoryid,
            'sourcelang' => 'en',
            'targetlang' => 'ja'
          );
foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
$fields_string = rtrim($fields_string, '&');
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, count($fields));
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$jdstitle = curl_exec($ch);
curl_close($ch);

$fields = array(
            'content' => $jdspc->post_content,
            'apikey' => $myrow22->apikey,
            'categoryid' => $myrow22->categoryid,
            'sourcelang' => 'en',
            'targetlang' => 'ja'
          );
foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
$fields_string = rtrim($fields_string, '&');
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, count($fields));
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$jdscontent = curl_exec($ch);
curl_close($ch);

$jcptitle = $jdstitle;
$jcpcontent = $jdscontent;
  $my_post = array(
     'post_title' => $jcptitle,
     'post_content' => $jcpcontent,
     'post_status' => 'publish',
     'post_type' => 'post',
     'post_author' => 1,
     'post_category' => $myrow22->categoryid
  );
wp_insert_post( $my_post );
}//end if ja

if($myrow22->pt=="yes")
{
$url = "http://jdsdevelopers.org/jdswpglobalapi.php";
$fields = array(
            'content' => $jdspc->post_title,
            'apikey' => $myrow22->apikey,
            'categoryid' => $myrow22->categoryid,
            'sourcelang' => 'en',
            'targetlang' => 'pt'
          );
foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
$fields_string = rtrim($fields_string, '&');
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, count($fields));
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$jdstitle = curl_exec($ch);
curl_close($ch);

$fields = array(
            'content' => $jdspc->post_content,
            'apikey' => $myrow22->apikey,
            'categoryid' => $myrow22->categoryid,
            'sourcelang' => 'en',
            'targetlang' => 'pt'
          );
foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
$fields_string = rtrim($fields_string, '&');
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, count($fields));
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$jdscontent = curl_exec($ch);
curl_close($ch);

$jcptitle = $jdstitle;
$jcpcontent = $jdscontent;
  $my_post = array(
     'post_title' => $jcptitle,
     'post_content' => $jcpcontent,
     'post_status' => 'publish',
     'post_type' => 'post',
     'post_author' => 1,
     'post_category' => $myrow22->categoryid
  );
wp_insert_post( $my_post );
}//end if pt

if($myrow22->de=="yes")
{
$url = "http://jdsdevelopers.org/jdswpglobalapi.php";
$fields = array(
            'content' => $jdspc->post_title,
            'apikey' => $myrow22->apikey,
            'categoryid' => $myrow22->categoryid,
            'sourcelang' => 'en',
            'targetlang' => 'de'
          );
foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
$fields_string = rtrim($fields_string, '&');
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, count($fields));
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$jdstitle = curl_exec($ch);
curl_close($ch);

$fields = array(
            'content' => $jdspc->post_content,
            'apikey' => $myrow22->apikey,
            'categoryid' => $myrow22->categoryid,
            'sourcelang' => 'en',
            'targetlang' => 'de'
          );
foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
$fields_string = rtrim($fields_string, '&');
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, count($fields));
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$jdscontent = curl_exec($ch);
curl_close($ch);

$jcptitle = $jdstitle;
$jcpcontent = $jdscontent;
  $my_post = array(
     'post_title' => $jcptitle,
     'post_content' => $jcpcontent,
     'post_status' => 'publish',
     'post_type' => 'post',
     'post_author' => 1,
     'post_category' => $myrow22->categoryid
  );
wp_insert_post( $my_post );
}//end if de

if($myrow22->ru=="yes")
{
$url = "http://jdsdevelopers.org/jdswpglobalapi.php";
$fields = array(
            'content' => $jdspc->post_title,
            'apikey' => $myrow22->apikey,
            'categoryid' => $myrow22->categoryid,
            'sourcelang' => 'en',
            'targetlang' => 'ru'
          );
foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
$fields_string = rtrim($fields_string, '&');
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, count($fields));
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$jdstitle = curl_exec($ch);
curl_close($ch);

$fields = array(
            'content' => $jdspc->post_content,
            'apikey' => $myrow22->apikey,
            'categoryid' => $myrow22->categoryid,
            'sourcelang' => 'en',
            'targetlang' => 'ru'
          );
foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
$fields_string = rtrim($fields_string, '&');
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, count($fields));
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$jdscontent = curl_exec($ch);
curl_close($ch);

$jcptitle = $jdstitle;
$jcpcontent = $jdscontent;
  $my_post = array(
     'post_title' => $jcptitle,
     'post_content' => $jcpcontent,
     'post_status' => 'publish',
     'post_type' => 'post',
     'post_author' => 1,
     'post_category' => $myrow22->categoryid
  );
wp_insert_post( $my_post );
}//end if ru

if($myrow22->fr=="yes")
{
$url = "http://jdsdevelopers.org/jdswpglobalapi.php";
$fields = array(
            'content' => $jdspc->post_title,
            'apikey' => $myrow22->apikey,
            'categoryid' => $myrow22->categoryid,
            'sourcelang' => 'en',
            'targetlang' => 'fr'
          );
foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
$fields_string = rtrim($fields_string, '&');
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, count($fields));
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$jdstitle = curl_exec($ch);
curl_close($ch);

$fields = array(
            'content' => $jdspc->post_content,
            'apikey' => $myrow22->apikey,
            'categoryid' => $myrow22->categoryid,
            'sourcelang' => 'en',
            'targetlang' => 'fr'
          );
foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
$fields_string = rtrim($fields_string, '&');
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, count($fields));
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$jdscontent = curl_exec($ch);
curl_close($ch);

$jcptitle = $jdstitle;
$jcpcontent = $jdscontent;
  $my_post = array(
     'post_title' => $jcptitle,
     'post_content' => $jcpcontent,
     'post_status' => 'publish',
     'post_type' => 'post',
     'post_author' => 1,
     'post_category' => $myrow22->categoryid
  );
wp_insert_post( $my_post );
}//end if fr


}//end wp post revision check
}

add_action( 'publish_post', 'jdswpglobal_postcontent' );
?>