<?php

if($_SERVER['REQUEST_METHOD']=='GET') {

    $idCB = $_GET['idCB'];
    $hocky = $_GET['hocky'];
    $namhoc = $_GET['namhoc'];


    include("connect.php");


    $sql = "SELECT lophp.tenlopHP FROM `lophp`,canbo,giangday,hockynamhoc WHERE
 canbo.idCB='".$idCB."' AND hockynamhoc.hocky='".$hocky."' AND hockynamhoc.namhoc='".$namhoc."' AND 
 canbo.idCB=giangday.idCB AND giangday.idlopHP=lophp.idlopHP AND lophp.idHK=hockynamhoc.idHK";

    $r = mysqli_query($con, $sql);
    $res = mysqli_fetch_array($r);
    $result = array();
    if (sizeof($res) > 0) {
        while ($row = mysqli_fetch_array($r)) {
            array_push($result, array(
                "tenlopHP" => $row['tenlopHP']
            ));
        }
        echo json_encode($result, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    } else {

        array_push($result, array(
                "tenlopHP" => 'Không có lớp học phần',

            )
        );

        echo json_encode($result, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    mysqli_close($con);
}
?>


