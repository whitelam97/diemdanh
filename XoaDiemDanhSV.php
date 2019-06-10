<?php
include("connect.php");

$idSV=$_POST['idSV'];
$idTKB=$_POST['idTKB'];

$query="DELETE FROM `hoc` WHERE `hoc`.`idSV` ='$idSV' AND `hoc`.`idTKB` = '$idTKB'";
if (mysqli_query($con,$query)){
    echo "success";
}else{
    echo "error";
}

?>