<?php

if($_SERVER['REQUEST_METHOD']=='GET') {

    $idTKB = $_GET['idTKB'];

    include("connect.php");

    $sql = "SELECT idSV FROM `hoc` WHERE idTKB='".$idTKB."'";

    $r = mysqli_query($con, $sql);

    $tkb = array();
        while ($row = mysqli_fetch_array($r)) {
            array_push($tkb, new SinhVienDaDiemdanh(
                $row['idSV']
            ));
        }
        echo json_encode($tkb, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);


    mysqli_close($con);
}
class  SinhVienDaDiemdanh{
    var $idSV;
    public function SinhVienDaDiemdanh($idSV)
    {
        $this->idSV = $idSV;
    }
}

?>