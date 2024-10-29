<?php

    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&  strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
    {
        include('../../config/config.php');
        $idgiaodich = $_REQUEST['idgiaodich'];

        $cardData = $database->get("card", [
            "username",
            "menhgia",
            "mathe",
            "seri",
            "trangthai",
            "idgiaodich",
            "loaithe"
        ], [
            "idgiaodich" => $idgiaodich
        ]);

        if($cardData)
        {
            $username = $cardData['username'];
            $amount = $cardData['menhgia'];
            $xukhuyenmai = getTyLeNapKhuyenMai($username,$amount);

            $xu = intval(($cardData['menhgia']/1000)*1.2) +  $xukhuyenmai;

            $data = $database->update("account", [
                "xu[+]" =>  $xu,
                "xu_khoa[+]" =>  $xu
            ], [
                "loginName" => $username
            ]);

            $updateCard = $database->update("card", [
                "trangthai" =>  2
            ], [
                "idgiaodich" => $idgiaodich
            ]);

            if($data)
            {
                $admin = $_SESSION['username_admin'];
                $content = "Duyệt  giao dịch $idgiaodich mệnh giá : $amount ";
                logAdmin($admin,$content);
                $return['type'] = 0;
                $return['msg'] =  "Cập nhật thành công giao dịch $idgiaodich";
                echo json_encode($return);
                exit();
            }else
            {
                $return['type'] = 1;
                $return['msg'] =  "Lỗi Update";
                echo json_encode($return);
                exit();
            }

        }else
        {
            $return['type'] = 1;
            $return['msg'] =  "Không tìm thấy giao dịch";
            echo json_encode($return);
            exit();

        }

    }else {
        header('Location: index.html');
        exit();
    }

?>