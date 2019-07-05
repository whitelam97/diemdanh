<?php

if($_SERVER['REQUEST_METHOD']=='GET') {

    $idCB = $_GET['idCB'];
    $hocky= $_GET['hocky'];
    $namhoc= $_GET['namhoc'];

    include("connect.php");

    $sql = "SELECT * FROM `lophp`
LEFT OUTER JOIN hocphan on hocphan.idHP=lophp.idHP
LEFT OUTER JOIN giangday on giangday.idlopHP=lophp.idlopHP
LEFT OUTER JOIN canbo on giangday.idCB=canbo.idCB
LEFT OUTER JOIN hockynamhoc on hockynamhoc.idHK=lophp.idHK
WHERE canbo.idCB='".$idCB."' AND hockynamhoc.hocky='".$hocky."' AND hockynamhoc.namhoc='".$namhoc."'";


    $r = mysqli_query($con, $sql);

    $tkb = array();
    while ($row = mysqli_fetch_assoc($r)){
        array_push($tkb, new LopHocPhanGiangDay(
            $row['mslopHP'],
            $row['tenlopHP'],
            $row['loailopHP'],
            $row['soSV'],
            $row['tuanhoc'],
            $row['bacDT'],
            $row['hocky'],
            $row['namhoc'],
            $row['tenHP'],
            $row['msHP'],
            $row['soTC'],
            $row['msCB'],
            $row['hotenCB']

        ));
    }
    echo json_encode($tkb,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    mysqli_close($con);
}
class  LopHocPhanGiangDay{
    var $mslopHP;
    var $tenlopHP;
    var $loailopHP;
    var $soSV;
    var $tuanhoc;
    var $bacDT;
    var $hocky;
    var $namhoc;
    var $tenHP;
    var $msHP;
    var $soTC;
    var $msCB;
    var $hotenCB;


    public function LopHocPhanGiangDay($mslopHP, $tenlopHP, $loailopHP, $soSV, $tuanhoc, $bacDT, $hocky, $namhoc, $tenHP, $msHP, $soTC, $msCB, $hotenCB)
    {
        $this->mslopHP = $mslopHP;
        $this->tenlopHP = $tenlopHP;
        $this->loailopHP = $loailopHP;
        $this->soSV = $soSV;
        $this->tuanhoc = $tuanhoc;
        $this->bacDT = $bacDT;
        $this->hocky = $hocky;
        $this->namhoc = $namhoc;
        $this->tenHP = $tenHP;
        $this->msHP = $msHP;
        $this->soTC = $soTC;
        $this->msCB = $msCB;
        $this->hotenCB = $hotenCB;
    }


}

?>