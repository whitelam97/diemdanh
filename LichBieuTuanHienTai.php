
<?php

if($_SERVER['REQUEST_METHOD']=='GET') {

    $idCB = $_GET['idCB'];
    $sttTuan = $_GET['sttTuan'];
    $idHK = $_GET['idHK'];

    include("connect.php");

    $sql ="select lophp.tenlopHP,ph.tenPhong,tkb.thu,tkb.tietBD,tkb.sotiet,
EXTRACT(Week FROM hockynamhoc.thoigianBD)+'" . $sttTuan . "'  AS ht from thoikhoabieu tkb 
left outer join canbo cb on tkb.idCB=cb.idCB 
left outer join lophp on tkb.idlopHP=lophp.idlopHP 
left outer join phonghoc ph on tkb.idPhong= ph.idPhong 
left outer join hockynamhoc on hockynamhoc.idHK= lophp.idHK 
where cb.idCB='" . $idCB . "'  AND tkb.sttTuan='" . $sttTuan . "'  AND hockynamhoc.idHK='" . $idHK . "'ORDER BY `tkb`.`thu` ASC";
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
