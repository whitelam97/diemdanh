<?php

if($_SERVER['REQUEST_METHOD']=='GET'){

    $idCB  = $_GET['idCB'];
    $sttTuan = $_GET['sttTuan'];
    $idHK  = $_GET['idHK'];

    include ("connect.php");

    $sql="select *,(SELECT catiet.thoigianBD FROM catiet WHERE catiet.id=tkb.tietBD) tgbd,
(SELECT catiet.thoigianKT FROM catiet WHERE catiet.id=tkb.tietBD+tkb.sotiet-1) tgkt from thoikhoabieu tkb 
left outer join canbo cb on tkb.idCB=cb.idCB LEFT OUTER JOIN catiet on tkb.tietBD=catiet.id 
left outer join lophp on tkb.idlopHP=lophp.idlopHP left outer join phonghoc ph on tkb.idPhong= ph.idPhong 
left outer join hockynamhoc on hockynamhoc.idHK= lophp.idHK where cb.idCB='$idCB' AND tkb.sttTuan='$sttTuan' AND tkb.thu=WEEKDAY(now())+2 AND hockynamhoc.idHK='$idHK'";


    $r = mysqli_query($con,$sql);

    $res = mysqli_fetch_array($r);

    $result = array();

    if(sizeof($res)>0){
        while ($row = mysqli_fetch_array($r)) {
            array_push($result,array(
                    "idTKB"=>$res['idTKB'],
                    "sttTuan"=>$res['sttTuan'],
                    "thu"=>$res['thu'],
                    "tietBD"=>$res['tietBD'],
                    "sotiet"=>$res['sotiet'],
                    "daybu"=>$res['daybu'],
                    "idlopHP"=>$res['idlopHP'],
                    "idPhong"=>$res['idPhong'],
                    "tinhtrang"=>$res['tinhtrang'],
                    "idCB"=>$res['idCB'],
                    "thoigiandiemdanh"=>$res['thoigiandiemdanh'],
                    "msCB"=>$res['msCB'],
                    "hotenCB"=>$res['hotenCB'],
                    "idHP"=>$res['idHP'],
                    "mslopHP"=>$res['mslopHP'],
                    "tenlopHP"=>$res['tenlopHP'],
                    "loailopHP"=>$res['loailopHP'],
                    "soSV"=>$res['soSV'],
                    "tuanhoc"=>$res['tuanhoc'],
                    "msPhong"=>$res['msPhong'],
                    "tenPhong"=>$res['tenPhong'],
                    "nhahoc"=>$res['nhahoc'],
                    "sttTang"=>$res['sttTang'],
                    "loaiPhong"=>$res['loaiPhong'],
                    "idHK"=>$res['idHK'],
                    "msHK"=>$res['msHK'],
                    "hocky"=>$res['hocky'],
                    "namhoc"=>$res['namhoc'],
                    "thoigianBD"=>$res['thoigianBD'],
                    "thoigianKT"=>$res['thoigianKT'],
                    "tgbd"=>$res['tgbd'],
                    "tgkt"=>$res['tgkt']
                )
            );
        }
        echo json_encode($result, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

    }else {

        array_push($result,array(
                "tkb"=>'error',
            )
        );

        echo json_encode($result);
    }

    mysqli_close($con);

}
