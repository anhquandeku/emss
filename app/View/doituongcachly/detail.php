<?php

use App\Core\View;

View::$activeItem = 'object';
echo $data;

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
        .personal {
            /*border: 1.5px solid;*/
            width: 80%;
            margin-left: auto;
            margin-right: auto;
        }

        .personal img {
            width: 100%;
            background-size: cover;
        }
        .d-none{
            transition: 2s;
        }
        #person{
            width: 100%;
            border-collapse: collapse;
        }
        table{
            border-collapse: collapse;
        }
        #person td{
            border: 1px solid;
            width: 50%;
        }
        #person tr{
            border-spacing: 0;
        }
    </style>
</head>

<body>
    <div id="app">
        <!-- SIDEBAR -->
        <?php View::partial('sidebar')  ?>
        <div id="main" class="layout-navbar">
            <!-- HEADER -->
            <?php View::partial('header')  ?>
            <?php View::partial('changepass')  ?>
            <div id="main-content">
                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-8 order-md-1 order-last">
                                <label>
                                    <h3>Hồ sơ cách ly</h3>
                                </label>
                                <br>
                            </div>
                            <div class="col-12 col-md-4 order-md-2 order-first">
                                <div class=" loat-start float-lg-end mb-3">
                                    <button id='btn-delete-benhnhan' class="btn btn-danger">
                                        <i class="bi bi-trash-fill"></i> Xóa
                                    </button>
                                    <button id='open-add-benhnhan-btn' class="btn btn-primary">
                                        <i class="bi bi-plus"></i> Thêm
                                    </button>
                                    <button id='view-dtcl' class="btn btn-primary">
                                    <i class="bi bi-chevron-double-down"></i> Xem
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <section class="section">
                        <div class="card personal">
                            <div class="card-body row">
                                <div class="col-4">
                                    <img src=<?= View::assets('images\ava_nam.jpg') ?>>
                                </div>
                                <div class="col-8">
                                    <table id="person">
                                        <tr>
                                            <td>Họ và tên</td>
                                            <td>Phan Thanh Thắng</td>
                                        </tr>
                                        <tr>
                                            <td>Giới tính</td>
                                            <td>Nam</td>
                                        </tr>
                                        <tr>
                                            <td>Ngày sinh</td>
                                            <td>20/05/2001</td>
                                        </tr>
                                        <tr>
                                            <td>CMND</td>
                                            <td>Phan Thanh Thắng</td>
                                        </tr>
                                        <tr>
                                            <td>Số điện thoại</td>
                                            <td>Phan Thanh Thắng</td>
                                        </tr>
                                        <tr>
                                            <td>Địa chỉ</td>
                                            <td>Phan Thanh Thắng</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                    </section>
                    <section class="section">
                        <div class="card ">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table mb-0 table-danger" id="table1">
                                        <thead>
                                            <tr>
                                                <th>Mã hồ sơ</th>
                                                <th>Thời gian bắt đầu</th>
                                                <th>Thời gian kết thúc</th>
                                                <th>Địa điểm cách ly</th>
                                                <th>Tác Vụ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                    <nav class="mt-5">
                                        <ul id="pagination" class="pagination justify-content-center"> </ul>
                                    </nav>
                                </div>
                            </div>
                    </section>
                </div>
            </div>
            <!-- FOOTER -->
            <?php View::partial('footer')  ?>
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
    <script>
        $(document).ready(function(){
            $('#view-dtcl').click(function(){
                $('.personal').toggleClass('d-none')
            })
        })
    </script>
</body>

</html>