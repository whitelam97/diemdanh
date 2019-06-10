<?php
include("connect.php");

$tinhtrang=$_POST['tinhtrang'];
$thoigiandiemdanh=$_POST['thoigiandiemdanh'];
$idTKB=$_POST['idTKB'];

$query="UPDATE `thoikhoabieu` SET `tinhtrang` = '$tinhtrang', `thoigiandiemdanh` = '$thoigiandiemdanh' WHERE `thoikhoabieu`.`idTKB` = '$idTKB'";
if (mysqli_query($con,$query)){
    echo "success";
}else{
    echo "error";
}

?>