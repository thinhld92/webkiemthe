<?php
ob_start();
session_start();
// error_reporting(0);
$url = 'http://kiemthedemo.test:8080/';
//database credentials
define('DBHOST','127.0.0.1');
define('DBUSER','root');
define('DBPASS','123456');
define('DBNAME','kiemthe_demo');

$db = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME. ';charset=utf8', DBUSER, DBPASS);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

//set timezone
date_default_timezone_set('asia/Ho_Chi_Minh');

$stmt = $db->prepare('SELECT * FROM blog_cauhinh') ;
$stmt->execute();
while ($row = $stmt->fetch())
{  
   $title_web = $row['title'];
   $link_dangky = $row['link_dangky'];
   $link_napthe = $row['link_napthe'];
   $link_taigame = $row['taigame'];
   $keywords = $row['keywords'];
   $descr = $row['descr'];
   $link_congdong = $row['link_congdong'];
   $link_hotro = $row['link_hotro'];
   $Tips = $row['tips'];
   $phone = $row['phone'];
   $og_image = $row['og_image'];
   $link_huongdan = $row['link_huongdan'];
   $link_huongdan_nap = $row['link_huongdan_nap'];
   $link_dacquyenvip = $row['link_datquyenvip'];
   $link_auto = $row['link_auto'];
}

$ch_popup = $db->prepare('SELECT * FROM blog_baotri WHERE baotri_Id = 1') ;
$ch_popup->execute();
while ($row = $ch_popup->fetch())
{  
  $popup_link = $row['baotri_Link'];
  $popup_ing = $row['baotri_Img'];
}

$ch_code = $db->prepare('SELECT * FROM blog_baotri WHERE baotri_Id = 2') ;
$ch_code->execute();
while ($row = $ch_code->fetch())
{  
   $code_link = $row['baotri_Link'];
   $code_ing = $row['baotri_Img'];
}

$ch_slide = $db->prepare('SELECT * FROM blog_slide_duoi') ;
$ch_slide->execute();
while ($row = $ch_slide->fetch())
{  
   $slide_img1 = $row['slide_duoi_img'];
   $slide_img2 = $row['slide_duoi_img1'];
   $slide_img3 = $row['slide_duoi_img2'];
   $slide_img4 = $row['slide_duoi_img3'];
   $slide_img5 = $row['slide_duoi_img4'];
}

$ch_baotri_Popup = $db->prepare('SELECT * FROM blog_baotri WHERE baotri_Id = 1') ;
$ch_baotri_Popup->execute();
while ($row = $ch_baotri_Popup->fetch())
{  
   $baotri_Popup = $row['baotri_kichhoat'];
}
$ch_baotr_code = $db->prepare('SELECT * FROM blog_baotri WHERE baotri_Id = 2') ;
$ch_baotr_code->execute();
while ($row = $ch_baotr_code->fetch())
{  
   $baotri_code = $row['baotri_kichhoat'];
}


$ch_logo = $db->prepare('SELECT * FROM blog_logo WHERE logo_Id = 1') ;
$ch_logo->execute();
while ($row = $ch_logo->fetch())
{  
   $link_logotren = $row['logo_Link'];
   $hinh_logotren = $row['logo_Img'];
}

$ch_logo = $db->prepare('SELECT * FROM blog_logo WHERE logo_Id = 2') ;
$ch_logo->execute();
while ($row = $ch_logo->fetch())
{  
   $link_logoduoi = $row['logo_Link'];
   $hinh_logoduoi = $row['logo_Img'];
}

spl_autoload_register('__autoload');
function __autoload($class) {
  $class = strtolower($class);
  //if call from within assets adjust the path
  $classpath = 'classes/class.'.$class . '.php';
  if ( file_exists($classpath)) {
      include $classpath;
  }  

  $classpath = '../classes/class.'.$class . '.php';
  if ( file_exists($classpath)) {
      include $classpath;
  }  
}

$user = new User($db); 
include('functions.php');
include('class.xss_clean.php');
?>