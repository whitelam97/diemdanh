<?php
include ("connect.php");
$sql = "SELECT * FROM `quyentruycap` ORDER BY `quyentruycap`.`idQuyen` DESC";
$r = mysqli_query($con,$sql);
$res = mysqli_fetch_array($r);
$result = array();
if(sizeof($res)>0) {
    while ($row = mysqli_fetch_array($r)) {
        array_push($result, array(
            "nhomnguoidung" => $row['nhomnguoidung']
        ));
    }
    echo json_encode($result, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
}else {
	 array_push($result,array(
     "error"=>'error',
 )
 );
    echo json_encode($result, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
 }
 mysqli_close($con);
?>





