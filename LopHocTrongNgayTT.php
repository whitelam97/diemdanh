<?php

if($_SERVER['REQUEST_METHOD']=='GET') {

    $sttTuan = $_GET['sttTuan'];
    $idHK = $_GET['idHK'];

    include("connect.php");

    $sql = "select *,(SELECT IF(lophp.loailopHP!=\"TH\",(SELECT  catiet.thoigianBD FROM catiet WHERE catiet.id=tkb.tietBD ),
(SELECT  catiet.thoigianBD FROM catiet WHERE catiet.stt=((tkb.tietBD+1)DIV 3+1) AND catiet.loai=\"1\" ))) tgbd,
(SELECT IF(lophp.loailopHP!=\"TH\",(SELECT catiet.thoigianKT FROM catiet WHERE catiet.id=tkb.tietBD+tkb.sotiet-1),
(SELECT  catiet.thoigianKT FROM catiet WHERE catiet.stt=(((tkb.tietBD+1)DIV 3+1)+tkb.sotiet DIV 3 -1) AND catiet.loai=\"1\" ))) tgkt ,
DATE_FORMAT(now(),\"%T\") AS timenow
from thoikhoabieu tkb 
left outer join canbo cb on tkb.idCB=cb.idCB 
LEFT OUTER JOIN catiet on tkb.tietBD=catiet.id 
left outer join lophp on tkb.idlopHP=lophp.idlopHP 
left outer join phonghoc ph on tkb.idPhong= ph.idPhong 
left outer join hockynamhoc on hockynamhoc.idHK= lophp.idHK 
left outer join donvi on donvi.idDvi= cb.idDvi 
where  tkb.sttTuan='" . $sttTuan . "' AND tkb.thu=WEEKDAY(now())+2 AND hockynamhoc.idHK='" . $idHK . "'ORDER BY `tkb`.`tietBD` ASC";


    $r = mysqli_query($con, $sql);

    $tkb = array();
    while ($row = mysqli_fetch_assoc($r)){
        array_push($tkb, new tkbcb(
            $row['idTKB'],
            $row['sttTuan'],
            $row['thu'],
            $row['tietBD'],
            $row['sotiet'],
            $row['daybu'],
            $row['idlopHP'],
            $row['idPhong'],
            $row['tinhtrang'],
            $row['idCB'],
            $row['thoigiandiemdanh'],
            $row['msCB'],
            $row['hotenCB'],
            $row['idHP'],
            $row['mslopHP'],
            $row['tenlopHP'],
            $row['loailopHP'],
            $row['soSV'],
            $row['tuanhoc'],
            $row['msPhong'],
            $row['tenPhong'],
            $row['nhahoc'],
            $row['sttTang'],
            $row['loaiPhong'],
            $row['idHK'],
            $row['msHK'],
            $row['hocky'],
            $row['namhoc'],
            $row['thoigianBD'],
            $row['thoigianKT'],
            $row['tgbd'],
            $row['tgkt'],
            $row['tenDvi'],
            $row['timenow']
        ));
    }
    echo json_encode($tkb,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

    mysqli_close($con);
}
class  tkbcb{
    var $idTKB;
    var $sttTuan;
    var $thu;
    var $tietBD;
    var $sotiet;
    var $daybu;
    var $idlopHP;
    var $idPhong;
    var $tinhtrang;
    var $idCB;
    var $thoigiandiemdanh;
    var $msCB;
    var $hotenCB;
    var $idHP;
    var $mslopHP;
    var $tenlopHP;
    var $loailopHP;
    var $soSV;
    var $tuanhoc;
    var $msPhong;
    var $tenPhong;
    var $nhahoc;
    var $sttTang;
    var $loaiPhong;
    var $idHK;
    var $msHK;
    var $hocky;
    var $namhoc;
    var $thoigianBD;
    var $thoigianKT;
    var $tgbd;
    var $tgkt;
    var $tenDvi;
    var $timenow;

    function tkbcb($idTKB, $sttTuan, $thu, $tietBD, $sotiet, $daybu, $idlopHP, $idPhong, $tinhtrang, $idCB, $thoigiandiemdanh, $msCB, $hotenCB, $idHP, $mslopHP, $tenlopHP, $loailopHP, $soSV, $tuanhoc, $msPhong, $tenPhong, $nhahoc, $sttTang, $loaiPhong, $idHK, $msHK, $hocky, $namhoc, $thoigianBD, $thoigianKT, $tgbd, $tgkt,$tenDvi,$timenow)
    {
        $this->idTKB = $idTKB;
        $this->sttTuan = $sttTuan;
        $this->thu = $thu;
        $this->tietBD = $tietBD;
        $this->sotiet = $sotiet;
        $this->daybu = $daybu;
        $this->idlopHP = $idlopHP;
        $this->idPhong = $idPhong;
        $this->tinhtrang = $tinhtrang;
        $this->idCB = $idCB;
        $this->thoigiandiemdanh = $thoigiandiemdanh;
        $this->msCB = $msCB;
        $this->hotenCB = $hotenCB;
        $this->idHP = $idHP;
        $this->mslopHP = $mslopHP;
        $this->tenlopHP = $tenlopHP;
        $this->loailopHP = $loailopHP;
        $this->soSV = $soSV;
        $this->tuanhoc = $tuanhoc;
        $this->msPhong = $msPhong;
        $this->tenPhong = $tenPhong;
        $this->nhahoc = $nhahoc;
        $this->sttTang = $sttTang;
        $this->loaiPhong = $loaiPhong;
        $this->idHK = $idHK;
        $this->msHK = $msHK;
        $this->hocky = $hocky;
        $this->namhoc = $namhoc;
        $this->thoigianBD = $thoigianBD;
        $this->thoigianKT = $thoigianKT;
        $this->tgbd = $tgbd;
        $this->tgkt = $tgkt;
        $this->tenDvi=$tenDvi;
        $this->timenow=$timenow;
    }

}

?>