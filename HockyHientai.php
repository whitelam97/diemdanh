<?php
include ("connect.php");
$sql = "SELECT * FROM `hockynamhoc` ORDER BY `hockynamhoc`.`idHK` DESC";

$r = mysqli_query($con,$sql);

$res = mysqli_fetch_array($r);

$result = array();

if(sizeof($res)>0){
    array_push($result,array(
            "idHK"=>$res['idHK'],
            "msHK"=>$res['msHK'],
            "hocky"=>$res['hocky'],
            "namhoc"=>$res['namhoc'],
            "thoigianBD"=>$res['thoigianBD'],
            "thoigianKT"=>$res['thoigianKT']
        )
    );

    echo json_encode(array("hocky"=>$result));

}else {

    array_push($result,array(
            "hocky"=>'error',

        )
    );

    echo json_encode(array("hocky"=>$result));
}

mysqli_close($con);

?>
