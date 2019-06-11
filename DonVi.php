<?php

    include("connect.php");

    $sql ="SELECT * FROM `donvi` ORDER BY `donvi`.`idDvi` ASC";

    $r = mysqli_query($con, $sql);

    $tkb = array();
    while ($row = mysqli_fetch_assoc($r)){
        array_push($tkb, new DonVi(
            $row['idDvi'],
            $row['msDvi'],
            $row['tenDvi']

        ));
    }
    echo json_encode($tkb,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

    mysqli_close($con);

class  DonVi{
    var $idDvi;
    var $msDvi;
    var $tenDvi;


    public function DonVi($idDvi, $msDvi, $tenDvi)
    {
        $this->idDvi = $idDvi;
        $this->msDvi = $msDvi;
        $this->tenDvi = $tenDvi;
    }


}

?>