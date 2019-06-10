<?php
include("connect.php");

$idSV=$_POST['idSV'];
$idTKB=$_POST['idTKB'];

$query="INSERT INTO `hoc` (`idSV`, `idTKB`, `ngaydiemdanh`) VALUES ('$idSV', '$idTKB', now())";
if (mysqli_query($con,$query)){
    echo "success";
}else{
    echo "error";
}

?>