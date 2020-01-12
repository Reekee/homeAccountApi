<?php
    include_once("config/autoload.php");

    $user_id = @$REQUEST->user_id;

    if( $user_id=="" ) {
        echo json_encode(array(
            "status"=>false,
            "msg"=>"ไม่พบข้อมูล"
        ));
        exit();
    }


    $date = date("Y-m-d");

    $sql = "
        SELECT 
            IFNULL(SUM(income_amount),0) as sum_income
        FROM income
        WHERE user_id='1'
            AND income_date='".$date."'
    ";
    $rs1 = $DATABASE->QueryObj($sql);

    $sql = "
        SELECT 
            IFNULL(SUM(widthdraw_amount),0) as sum_widthdraw
        FROM widthdraw
        WHERE user_id='1'
            AND widthdraw_date='".$date."'
    ";
    $rs2 = $DATABASE->QueryObj($sql);

    echo json_encode(array(
        "status"=>true,
        "sum_income"=>$rs1[0]["sum_income"],
        "sum_widthdraw"=>$rs2[0]["sum_widthdraw"]
    ));