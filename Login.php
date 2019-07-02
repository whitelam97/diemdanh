<?php

if($_SERVER['REQUEST_METHOD']=='GET'){

    $msCB  = $_GET['msCB'];
    $matkhau  = $_GET['matkhau'];
    $nhomnguoidung  = $_GET['nhomnguoidung'];

    include ("connect.php");
//
//    $sql="SELECT * FROM canbo
//LEFT OUTER JOIN duoccap on canbo.idCB=duoccap.idCB
//LEFT OUTER JOIN donvi on canbo.idDvi=donvi.idDvi
//LEFT OUTER JOIN quyentruycap on duoccap.idQuyen=quyentruycap.idQuyen
//WHERE msCB='".$msCB."' AND matkhau=MD5('$matkhau')
//AND quyentruycap.nhomnguoidung='".$nhomnguoidung."'";


    $sql="SELECT * FROM canbo
LEFT OUTER JOIN duoccap on canbo.idCB=duoccap.idCB
LEFT OUTER JOIN donvi on canbo.idDvi=donvi.idDvi
LEFT OUTER JOIN quyentruycap on duoccap.idQuyen=quyentruycap.idQuyen
WHERE msCB='".$msCB."' AND matkhau='".$matkhau."'
AND quyentruycap.nhomnguoidung='".$nhomnguoidung."'";

    $r = mysqli_query($con,$sql);
    $res = mysqli_fetch_array($r);
    $result = array();
    if(sizeof($res)>0){
        array_push($result,array(
                "idCB"=>$res['idCB'],
                "msCB"=>$res['msCB'],
                "hotenCB"=>$res['hotenCB'],
                "ngaysinh"=>$res['ngaysinh'],
                "gioitinh"=>$res['gioitinh'],
                "chucvu"=>$res['chucvu'],
                "sdt"=>$res['sdt'],
                "email"=>$res['email'],
                "matkhau"=>$res['matkhau'],
                "idDvi"=>$res['idDvi'],
                "msDvi"=>$res['msDvi'],
                "tenDvi"=>$res['tenDvi'],
                "idQuyen"=>$res['idQuyen'],
                "msQuyen"=>$res['msQuyen']
            )
        );

        echo json_encode(array("canbo"=>$result));


    }else {

        array_push($result,array(
                "monday"=>"error",
            )
        );

        echo json_encode(array("canbo"=>$result));
    }

    mysqli_close($con);

}

?>

