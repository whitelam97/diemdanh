<?php
include("connect.php");
$matkhau=$_POST['matkhau'];
$idCB=$_POST['idCB'];

$query="UPDATE canbo SET matkhau= MD5('$matkhau') WHERE idCB='$idCB'";

if (mysqli_query($con,$query)){
    echo "success";
}else{
    echo "error";
}
?>