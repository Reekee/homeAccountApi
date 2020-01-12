<?php
    include_once("config/autoload.php");

    $username = @$REQUEST->username;
    $password = @$REQUEST->password;

    if( $username=="" ) {
        echo json_encode(array(
            "status"=>false,
            "msg"=>"กรุณากรอกชื่อผู้ใช้"
        ));
        exit();
    }
    if( $password=="" ) {
        echo json_encode(array(
            "status"=>false,
            "msg"=>"กรุณากรอกรหัสผ่าน"
        ));
        exit();
    }

    $sql = "
        SELECT * 
        FROM user 
        WHERE username='".$username."' 
            and password='".$password."' 
    ";

    $rs = $DATABASE->QueryObj($sql);

    if( sizeof($rs)==1 ) {
        echo json_encode(array(
            "status"=>true,
            "user"=>$rs[0],
            "msg"=>"เข้าสู่ระบบสำเร็จ"
        ));
    } else {
        echo json_encode(array(
            "status"=>false,
            "msg"=>"เข้าสู่ระบบไม่สำเร็จ"
        ));
    }