<?php

use App\Core\View;

View::$activeItem = 'object';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EMSS</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="<?= View::assets('css/bootstrap.css') ?>" />
    <link rel="stylesheet" href="<?= View::assets('vendors/toastify/toastify.css') ?>" />
    <link rel="stylesheet" href="<?= View::assets('vendors/perfect-scrollbar/perfect-scrollbar.css') ?>" />
    <link rel="stylesheet" href="<?= View::assets('vendors/bootstrap-icons/bootstrap-icons.css') ?>" />
    <link rel="stylesheet" href="<?= View::assets('css/app.css') ?>" />
    <link rel="shortcut icon" href="<?= View::assets('images/logo/logo_.png') ?>" type="image/x-icon" />
    <link rel="stylesheet" href="<?= View::assets('css/quan.css') ?>" />
    <style>
        body {
            font-family: 'Times New Roman';
            background-color: white;
            color: black;
            line-height: 15px;
        }

        #quochieu {
            text-align: center;
            margin-top: 50px;
            line-height: 10px;
            font-weight: bold;
            font-size: 20px;
        }

        #date {
            text-align: right;
        }

        #app {
            width: 80%;
            margin-left: auto;
            margin-right: auto;
        }

        #date {
            font-style: italic;
        }

        #title {
            text-align: center;
            margin-top: 50px;
            line-height: 10px;
            font-weight: bold;
            font-size: 18px;
        }

        #person {
            line-height: 2em;
            width: 100%;
        }

        #person td {
            width: 40%;
        }

        #person .table-title {
            width: 20%;
        }
    </style>
</head>

<body>
    <div id="app">
        <div id="quochieu">
            <p>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</p>
            <p style="font-size:18px; text-decoration:underline">Độc lập - Tự do - Hạnh phúc</p>
        </div>
        <br>
        <div id="date">
            Ngày..........Tháng......... Năm..........
        </div>
        <div id="title">
            <p> GIẤY XÁC NHẬN HOÀN THÀNH CÁCH LY Y TẾ</p>
        </div>
        <div id="content">
            <p>Ban chỉ đạo phòng chống dịch............................................................................... </p>
            Căn cứ Quyết định cách ly số: ................../QĐ..............., ngày..../..../..... xác nhận:
            <br><br><br>
            <div>
                <table id="person">
                    <tr>
                        <td class="table-title">Ông/Bà:</td>
                        <td id="name" class="personal">Phan Thanh Thắng</td>
                        <td class="table-title"> Giới tính:</td>
                        <td id="sex" class="personal">Nam</td>
                    </tr>
                    <tr>
                        <td class="table-title">Ngày sinh:</td>
                        <td id="birthday" class="personal">20/05/2001</td>
                        <td class="table-title"> Số điện thoại:</td>
                        <td id="phone" class="personal">0355082545</td>
                    </tr>
                    <tr>
                        <td class="table-title">Số CMND:</td>
                        <td id="CMND" class="personal">20/05/2001</td>
                        <td class="table-title"> Quốc tịch:</td>
                        <td id="quoctich" class="personal">Việt Nam</td>
                    </tr>
                    <tr>
                        <td class="table-title">Địa chỉ lưu trú:</td>
                        <td id="address" class="personal" colspan="3"> Mỹ Thủy - Hải An - Hải Lăng - Quảng Trị</td>
                    </tr>
                    <tr>
                        <td class="table-title">Địa chỉ cách ly:</td>
                        <td id="address2" class="personal" colspan="3"> Mỹ Thủy - Hải An - Hải Lăng - Quảng Trị</td>
                    </tr>
                    <tr>
                        <td class="table-title">Lý do cách ly: </td>
                        <td id="reason" class="personal" colspan="3"> Mỹ Thủy - Hải An - Hải Lăng - Quảng Trị</td>
                    </tr>
                </table>
            </div>
            <div>
                <div id="title">
                    <p> ĐÃ HOÀN THÀNH CÁCH LY Y TẾ</p>
                </div>
                <span>Thời gian thực hiện cách ly: </span><span id="time" style="padding-left:2em">Từ ngày .... đến hết ngày ......</span>
            </div>
            <div>
                <div id="title" style="text-align:right">
                    <p> BAN CHỈ ĐẠO PHÒNG CHỐNG DỊCH</p>
                </div>
                
            </div>
        </div>
    </div>
    <script src="<?= View::assets('vendors/toastify/toastify.js') ?>"></script>
    <script src="<?= View::assets('vendors/perfect-scrollbar/perfect-scrollbar.min.js') ?>"></script>
    <script src="<?= View::assets('js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= View::assets('vendors/jquery/jquery.min.js') ?>"></script>
    <script src="<?= View::assets('vendors/jquery/jquery.validate.js') ?>"></script>
    <script src="<?= View::assets('js/main.js') ?>"></script>
    <script src="<?= View::assets('js/changepass.js') ?>"></script>
    <script src="<?= View::assets('js/menu.js') ?>"></script>
    <script src="<?= View::assets('js/api.js') ?>"></script>
    <script src="<?= View::assets('js/address.js') ?>"></script>
    <script>
        window.print();
        //location.href = "http://localhost/emss/doituongcachly/index";
    </script>
</body>

</html>