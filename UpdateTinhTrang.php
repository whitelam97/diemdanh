<?php
include("connect.php");
$tinhtrang=$_POST['tinhtrang'];
$idTKB=$_POST['idTKB'];

$query="UPDATE `thoikhoabieu` SET `tinhtrang` = '$tinhtrang' WHERE `thoikhoabieu`.`idTKB` = '$idTKB'";
if (mysqli_query($con,$query)){
    echo "success";
}else{
    echo "error";
}
?>