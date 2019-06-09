<?php
include ("connect.php");
$sql = "SELECT nhomnguoidung FROM `quyentruycap`";
$r = mysqli_query($con,$sql);
$res = mysqli_fetch_array($r);
$result = array();
if(sizeof($res)>0) {
    while ($row = mysqli_fetch_array($r)) {
        array_push($result, array(
            "nhomnguoidung" => $row['nhomnguoidung']));
    }
    echo json_encode($result, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
}else {

	 array_push($result,array(
     "error"=>'error',

 )
 );

 echo json_encode(array("result"=>$result));
 }

 mysqli_close($con);

?>


