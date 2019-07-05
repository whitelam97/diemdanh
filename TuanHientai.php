<?php

if($_SERVER['REQUEST_METHOD']=='GET'){

    $thoigianBD  = $_GET['thoigianBD'];

    include ("connect.php");

    $sql="SELECT EXTRACT(WEEK FROM now())- EXTRACT(WEEK FROM '".$thoigianBD."')+1 as sttTuan, EXTRACT(WEEK FROM now())+1 AS tuanht FROM `hockynamhoc` ORDER BY `sttTuan` DESC";


    $r = mysqli_query($con,$sql);

    $res = mysqli_fetch_array($r);

    $result = array();

    if(sizeof($res)>0){

        array_push($result,array(
                "sttTuan"=>$res['sttTuan'],
                "tuanht"=>$res['tuanht']
            )
        );

        echo json_encode(array("tuanht"=>$result));


    }else {

        array_push($result,array(
                "tuanht"=>'error',

            )
        );

        echo json_encode(array("tuanht"=>$result));
    }

    mysqli_close($con);

}

?>