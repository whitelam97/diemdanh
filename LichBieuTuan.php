<?php

if($_SERVER['REQUEST_METHOD']=='GET') {

    $idCB = $_GET['idCB'];
    $sttTuan = $_GET['sttTuan'];
    $hocky = $_GET['hocky'];
    $namhoc = $_GET['namhoc'];

    include("connect.php");

    $sql ="";
    $r = mysqli_query($con, $sql);

    $tkb = array();
    while ($row = mysqli_fetch_assoc($r)){
        array_push($tkb, new LichBieuTuan(
            $row['tenlopHP'],
            $row['tenPhong'],
            $row['thu'],
            $row['tietBD'],
            $row['sotiet'],
            $row['ht']
        ));
    }
    echo json_encode($tkb,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

    mysqli_close($con);
}
class  LichBieuTuan{
    var $tenlopHP;
    var $tenPhong;
    var $thu;
    var $tietBD;
    var $sotiet;
    var $ht;


    public function LichBieuTuan($tenlopHP, $tenPhong, $thu, $tietBD, $sotiet, $ht)
    {
        $this->tenlopHP = $tenlopHP;
        $this->tenPhong = $tenPhong;
        $this->thu = $thu;
        $this->tietBD = $tietBD;
        $this->sotiet = $sotiet;
        $this->ht = $ht;
    }



}

?>