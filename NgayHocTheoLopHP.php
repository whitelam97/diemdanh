<?php

if($_SERVER['REQUEST_METHOD']=='GET') {

    $tenlophp = $_GET['tenlophp'];

    include("connect.php");

    $sql ="SELECT lophp.idlopHP,thoikhoabieu.idTKB,DATE_FORMAT(ADDDATE(hockynamhoc.thoigianBD,7*(thoikhoabieu.sttTuan-1)+thoikhoabieu.thu -2),'%d/%m/%Y') AS ngayhoc
 FROM `lophp`, thoikhoabieu,hockynamhoc WHERE lophp.tenlopHP='".$tenlophp."' AND thoikhoabieu.idlopHP=lophp.idlopHP AND hockynamhoc.idHK=lophp.idHK";

    $r = mysqli_query($con, $sql);

    $tkb = array();
    while ($row = mysqli_fetch_assoc($r)){
        array_push($tkb, new NgayHocTheoLopHP(
            $row['idlopHP'],
            $row['idTKB'],
            $row['ngayhoc']

        ));
    }
    echo json_encode($tkb,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

    mysqli_close($con);
}
class  NgayHocTheoLopHP{
    var $idlopHP;
    var $idTKB;
    var $ngayhoc;

    /**
     * NgayHocTheoLopHP constructor.
     * @param $idlopHP
     * @param $idTKB
     * @param $ngayhoc
     */
    public function NgayHocTheoLopHP($idlopHP, $idTKB, $ngayhoc)
    {
        $this->idlopHP = $idlopHP;
        $this->idTKB = $idTKB;
        $this->ngayhoc = $ngayhoc;
    }


}

?>