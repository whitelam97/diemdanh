<?php

if($_SERVER['REQUEST_METHOD']=='GET'){

    $email = $_GET['email'];

    include ("connect.php");

    $sql="SELECT * FROM `canbo` WHERE email='".$email."'";
    $r = mysqli_query($con,$sql);
    $res = mysqli_fetch_array($r);
    $result = array();
    if(sizeof($res)>0){
        array_push($result,array(
                "idCB"=>$res['idCB'],
                "msCB"=>$res['msCB']
            )
        );
        echo json_encode(array("tuanht"=>$result));
    }else {
        array_push($result,array(
                "idCB"=>'Null',
                "msCB"=>'Null',
            )
        );
        echo json_encode(array("tuanht"=>$result));
    }

    mysqli_close($con);

}

?>