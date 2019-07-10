<?php
    include("connect.php");
    $sql ="SELECT * FROM `hockynamhoc` ORDER BY `hockynamhoc`.`idHK` DESC";
    $r = mysqli_query($con, $sql);
    $tkb = array();
    while ($row = mysqli_fetch_assoc($r)){
        array_push($tkb, new HocKy(
            $row['hocky'],
            $row['namhoc']
        ));
    }
    echo json_encode($tkb,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    mysqli_close($con);
class  HocKy{
    var $hocky;
    var $namhoc;

    public function HocKY($hocky, $namhoc)
    {
        $this->hocky = $hocky;
        $this->namhoc = $namhoc;
    }
}
?>