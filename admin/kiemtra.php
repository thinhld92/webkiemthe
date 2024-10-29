<?php include_once 'model/nav.php';
// $open = "thongbao";
// require_once __DIR__ .'../../../../autoload/autoload.php';
// $conn = $pdo->open();
function  getInput($string)
{
	return isset($_GET[$string]) ? $_GET[$string] : '';
}
$idcheck = intval(getInput('id'));

$stmt = $db->prepare("SELECT *, COUNT(*) AS numrows FROM blog_baotri WHERE baotri_Id=:baotri_Id");
$stmt->execute(['baotri_Id'=>$idcheck]);
$row = $stmt->fetch();
if (empty($row)) {
  // $_SESSION['error'] = "Dữ liệu không tồn tại";
  // redirectAdmin("thongbao");
	header('Location: baotri_cauhinh.php?action=edit1');
}
$home = $row['baotri_kichhoat'] == 0 ? 1 : 0;
echo "$home";
$stmt2 = $db->prepare("UPDATE blog_baotri SET baotri_kichhoat=:home WHERE baotri_Id=:baotri_Id");
$stmt2->execute(['home'=>$home, 'baotri_Id'=>$idcheck]);
if ($stmt2 > 0) {
  // $_SESSION['success'] = "Cập nhật thành công";
  // redirectAdmin("thongbao");
	header('Location: baotri_cauhinh.php?action=edit2');
}else{
	 header('Location: baotri_cauhinh.php?action=edit3');
}
?>