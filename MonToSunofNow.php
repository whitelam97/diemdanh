<?php

if($_SERVER['REQUEST_METHOD']=='GET'){

    $idHK  = $_GET['idHK'];
    $sttTuan  = $_GET['sttTuan'];


    include ("connect.php");

    $sql="SELECT DATE_FORMAT(ADDDATE(thoigianBD,7*('$sttTuan'-1)),'%d/%m/%Y') AS monday,
DATE_FORMAT( ADDDATE(thoigianBD,7*('$sttTuan'-1)+6),'%d/%m/%Y') AS sunday 
FROM hockynamhoc WHERE idHK='".$idHK."'";

    $r = mysqli_query($con,$sql);

    $res = mysqli_fetch_array($r);

    $result = array();

    if(sizeof($res)>0){

        array_push($result,array(
                "monday"=>$res['monday'],
                "sunday"=>$res['sunday'],
                "ngayht"=>date('d/m/Y',strtotime("now"))
            )
        );

        echo json_encode(array("mondaytosundaynow"=>$result));


    }else {

        array_push($result,array(
                "monday"=>"",
                "sunday"=>"",
                "ngayht"=>"",

            )
        );

        echo json_encode(array("mondaytosundaynow"=>$result));
    }

    mysqli_close($con);

}

?>

