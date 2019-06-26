<?php

//khoa khi da qua thoi gian ket thuc returt true 
if($_SERVER['REQUEST_METHOD']=='GET') {

    $tietKT = $_GET['tietKT'];
    $loai = $_GET['loai'];

    include("connect.php");
    $sql = "SELECT IF(CURTIME()>ADDTIME(thoigianKT,'0:20:00'),'2','0') AS flaglock FROM catiet WHERE stt='".$tietKT."' AND loai='".$loai."'";

    $r = mysqli_query($con,$sql);

    $result = array();
    while ($row = mysqli_fetch_array($r)) {
        array_push($result, array(
            "flaglock" => $row['flaglock']
        ));
    }
    echo json_encode($result, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

    mysqli_close($con);

}
?>