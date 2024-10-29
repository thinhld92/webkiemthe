<?php
    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&  strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
    {
        include('../config/config.php');

        $captchaUser = filter_var($_REQUEST["captcha"], FILTER_SANITIZE_STRING);
        $username = $_SESSION['username'];
        $date = date("Y-m-d h:i:sa");
        $sotien = str_text($_REQUEST["sotien"]);


        if ( $_SESSION['CAPTCHA_CODE'] != $captchaUser)
        {
            $json['status'] = 1;
            $json['msg'] = "Mã bảo mật sai";
            echo json_encode($json);
            exit();
        }

        if (  $sotien == "" ||  $username=="" || $captchaUser== "")
        {
            $json['status'] = 1;
            $json['msg'] = "Vui lòng nhập đầy đủ thông tin";
            echo json_encode($json);
            exit();
        }
        if (  $sotien < 0 )
        {
            $json['status'] = 1;
            $json['msg'] = "Phải nhập số lớn hơn 0";
            echo json_encode($json);
            exit();
        }
        $trans_id = md5(time());
        $dataCard =   $database->insert("card", [
            "username" => $username,
            "loaithe" => "Momo",
            "menhgia" => $sotien,
            "mathe" => "Momo",
            "seri" => "Momo",
            "trangthai" => 4,
            "idgiaodich" =>  $trans_id,
            "created_at" => $date
        ]);
        if ( $dataCard )
        {
            $json['status'] = 0;
            $json['msg'] = "Gửi thẻ lên thành công , vui lòng chờ duyệt giao dịch";
            $json['url'] = "momo.html";
            echo json_encode($json);
            exit();
        }else {
            $json['status'] = 1;
            $json['msg'] = "Lỗi máy chủ , vui lòng thử lại hoặc liên hệ Admin";
            echo json_encode($json);
            exit();
        }


    }else {
        header('Location: index.html');
        exit();
    }
?>