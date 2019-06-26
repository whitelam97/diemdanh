<?php

if($_SERVER['REQUEST_METHOD']=='GET') {

    $tietBD = $_GET['tietBD'];
    $loai = $_GET['loai'];

    include("connect.php");
    $sql = "SELECT IF(CURTIME()>=thoigianBD,'0','-1') AS flagUnlock FROM catiet WHERE stt='".$tietBD."' AND loai='".$loai."'";

    $r = mysqli_query($con,$sql);

    $result = array();
    while ($row = mysqli_fetch_array($r)) {
        array_push($result, array(
            "flagUnlock" => $row['flagUnlock']
        ));
    }
        echo json_encode($result, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

    mysqli_close($con);

}
?>