<?php

if($_SERVER['REQUEST_METHOD']=='GET') {

    $idlopHP = $_GET['idlopHP'];

    include("connect.php");

    $sql = "SELECT a.idSV, mssv, hotenSV, msLopCN,
 (SELECT SUM(sotiet) AS tongbuoi FROM thoikhoabieu e, hoc f, lophp c WHERE idSV=a.idSV AND c.idlopHP='" . $idlopHP . "' AND e.idTKB=f.idTKB AND e.idLopHP =c.idLopHP)AS cohoc, 
 (SELECT SUM(sotiet) FROM thoikhoabieu e, lophp c WHERE e.idlopHP='" . $idlopHP . "' AND e.idLopHP =c.idLopHP )AS tongbuoi FROM sinhvien a, thuoc b, lophp c, lopchuyennganh d 
 WHERE c.idlopHP='" . $idlopHP . "' AND c.idlopHP=b.idlopHP AND b.idSV=a.idSV AND a.idLopCN=d.idLopCN ORDER BY mssv";

    $r = mysqli_query($con, $sql);
    $tkb = array();
    if(mysqli_num_rows($r) > 0) {
        while ($row = mysqli_fetch_assoc($r)) {
            if($row['cohoc']==null){
                array_push($tkb, new DanhSachSVThuocLopHP(
                    $row['idSV'],
                    $row['mssv'],
                    $row['hotenSV'],
                    $row['msLopCN'],
                   "0",
                    $row['tongbuoi']
                ));
            }
            else {
                array_push($tkb, new DanhSachSVThuocLopHP(
                    $row['idSV'],
                    $row['mssv'],
                    $row['hotenSV'],
                    $row['msLopCN'],
                    $row['cohoc'],
                    $row['tongbuoi']
                ));
            }
        }
        echo json_encode($tkb, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
    else{
        array_push($tkb, new DanhSachSVThuocLopHP("15004047","15001047","Nguyen Van A","1CTT15A","5","10"));
        echo json_encode($tkb, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    mysqli_close($con);
}
class  DanhSachSVThuocLopHP{
    var $idSV;
    var $mssv;
    var $hotenSV;
    var $msLopCN;
    var $cohoc;
    var $tongbuoi;

    public function DanhSachSVThuocLopHP($idSV, $mssv, $hotenSV, $msLopCN, $cohoc, $tongbuoi)
    {
        $this->idSV = $idSV;
        $this->mssv = $mssv;
        $this->hotenSV = $hotenSV;
        $this->msLopCN = $msLopCN;
        $this->cohoc = $cohoc;
        $this->tongbuoi = $tongbuoi;
    }


}

?>