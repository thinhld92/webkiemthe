<?php
 error_reporting(0);
/**
 * 
 */

class news{
  //protected $db;
   private function con()
  {
     include 'includes/config.php';
      $db = new mysqli(DBHOST, DBUSER, DBPASS,DBNAME);    

/* check connection */
       if ($db->connect_errno) {
       // printf("Connect failed:\n", $db->connect_error);
          printf("Connect failed");
     exit();
       } 
       return $db;
  }
  public function Get_num_news($cat)
  {
    mysqli_query($this->con(),"SET NAMES 'utf8'"); 
     $query1 = "SELECT * FROM blog_post_cats order by id DESC";
    
      if ($cat!="") {
               $query1 = "SELECT * FROM blog_post_cats WHERE category='$cat' order by id DESC";
        }
   
    $result1 = mysqli_query($this->con(),$query1);

    $num = mysqli_num_rows($result1);
	mysqli_free_result($result1);
	mysqli_close($this->con());
    return $num;
   }
  public function Get_news($cat)
  {
	$result = Array();
    mysqli_query($this->con(),"SET NAMES 'utf8'"); 
   $query1 = "SELECT * FROM blog_post_cats order by id DESC ";
    
      if ($cat!="") {
               $query1 = "SELECT * FROM blog_post_cats WHERE category='$cat' order by id DESC ";
        }
    $result1 = mysqli_query($this->con(),$query1);
	$i = 0;
	while($row = mysqli_fetch_array($result1))
	{
	$result[$i]=$row;
	$i++;
    }
	mysqli_free_result($result1);
	mysqli_close($this->con());
    return $result;
   }
   public function Get_new_one($cid)
  {
    mysqli_query($this->con(),"SET NAMES 'utf8'"); 
    $query1 = "SELECT * FROM news WHERE url = '$cid'  LIMIT 1";
    $result1 = mysqli_query($this->con(),$query1);
      $row = mysqli_fetch_array($result1);
	mysqli_free_result($result1);
	mysqli_close($this->con());
    return $row;
   }
      public function Get_new_one_cid($cid)
  {
    mysqli_query($this->con(),"SET NAMES 'utf8'"); 
    $query1 = "SELECT * FROM news WHERE cid = '$cid'  LIMIT 1";
    $result1 = mysqli_query($this->con(),$query1);
      $row = mysqli_fetch_array($result1);
	mysqli_free_result($result1);
	mysqli_close($this->con());
    return $row;
   }
   public function convert2html($content)
  {
    mysqli_query($this->con(),"SET NAMES 'utf8'"); 
	$content = mysqli_real_escape_string($this->con(), $content);
    return $content;
   }
      public function update_new($title,$category,$newcontent,$author,$today,$id)
  {
    mysqli_query($this->con(),"SET NAMES 'utf8'"); 
		   $url = friendlyurl($title).'.html';
      $sql="UPDATE news SET  title = '$title', category = '$category', content = '$newcontent', author='$author', c_time='$today',url='$url' WHERE  id = '$id'";
      $result1 = mysqli_query($this->con(),$sql);
      if ($result1) {
	  	mysqli_free_result($result1);
		mysqli_close($this->con());
        return true;
      }else
      {
	  	
		mysqli_close($this->con());
        return false;
      }
   }
  public function add_new($cid, $title, $category, $newcontent, $author, $today)
  {
       mysqli_query($this->con(),"SET NAMES 'utf8'"); 
	   $url = friendlyurl($title).'.html';
      $sql="INSERT INTO news ( cid, title, category, content, author, c_time,url) VALUES ( '$cid', '$title', '$category', '$newcontent', '$author', '$today','$url')";
      $result1 = mysqli_query($this->con(),$sql);
      if ($result1) {
	  	mysqli_free_result($result1);
		mysqli_close($this->con());
        return true;
      }else
      {
		mysqli_close($this->con());
         return false;
      }
   }
  public function Del_news($cid)
  {
    $sql ="DELETE FROM news WHERE cid = '$cid' ";
    $result1 = mysqli_query($this->con(),$sql);
      if ($result1) {
	  	mysqli_free_result($result1);
		mysqli_close($this->con());
        return true;
      }else
      {
		mysqli_close($this->con());
         return false;
      }
   
   }
   
 }/* emd class */

function friendlyurl($str) {
  $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
  $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
  $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
  $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
  $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
  $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
  $str = preg_replace("/(đ)/", 'd', $str);
  $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'a', $str);
  $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'e', $str);
  $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'i', $str);
  $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'o', $str);
  $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'u', $str);
  $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'y', $str);
  $str = preg_replace("/(Đ)/", 'd', $str);
  $str = str_replace(" ", "-", str_replace("&*#39;","",$str));
  return $str;
  }

function get_first_image($post) {
  $first_img = "";
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post, $matches);
  $first_img = $matches[1][0];
 
  if(empty($first_img)) {
    $first_img = "./themes/vltkw/res/img.zing.vn/products/vltkw/skin-2017/images/logo.png";
  }
  return $first_img;
}
function get_first_image_sk($post) {
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post, $matches);
  $first_img = $matches[1][0];
 
  if(empty($first_img)) {
    $first_img = "//img.zing.vn/upload/vltkw/source/thumb/451e10de8e2fb18a9f795679b52dc9f6-VLTK88.jpg";
  }
  return $first_img;
}

$date = date('d-m-Y');
$str = "1234567890QWERTYUIOPLKJHGFDSAZXCVBNM";
$code=str_shuffle($str);

?>
