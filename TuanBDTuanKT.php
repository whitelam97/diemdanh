<?php

if($_SERVER['REQUEST_METHOD']=='GET') {

    $hk = $_GET['hk'];
    $nh = $_GET['nh'];

    include("connect.php");

    $sql ="SELECT EXTRACT(WEEK FROM thoigianBD) AS tuanBD,EXTRACT(WEEK FROM thoigianKT) AS tuanKT FROM `hockynamhoc` WHERE hocky='" . $hk . "' AND namhoc='" . $nh . "'";

    $r = mysqli_query($con, $sql);

    $tkb = array();
    while ($row = mysqli_fetch_assoc($r)){
        array_push($tkb, new TuanBDTuanKT(
            $row['tuanBD'],
            $row['tuanKT']
        ));
    }
    echo json_encode($tkb,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

    mysqli_close($con);
}
class  TuanBDTuanKT{
    var $tuanBD;
    var $tuanKT;

    public function TuanBDTuanKT($tuanBD, $tuanKT)
    {
        $this->tuanBD = $tuanBD;
        $this->tuanKT = $tuanKT;
    }


}

?>