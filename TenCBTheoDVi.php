<?php

if($_SERVER['REQUEST_METHOD']=='GET') {

    $idDvi = $_GET['idDvi'];

    include("connect.php");

    $sql = "SELECT * FROM `canbo` WHERE idDvi='".$idDvi."'";

    $r = mysqli_query($con, $sql);

    $tkb = array();
    while ($row = mysqli_fetch_array($r)) {
        array_push($tkb, new TenCBTheoDVi(
            $row['hotenCB']
        ));
    }
    echo json_encode($tkb, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);


    mysqli_close($con);
}
class  TenCBTheoDVi{
    var $hotenCB;

    /**
     * TenCBTheoDVi constructor.
     * @param $hotenCB
     */
    public function TenCBTheoDVi($hotenCB)
    {
        $this->hotenCB = $hotenCB;
    }

}

?>