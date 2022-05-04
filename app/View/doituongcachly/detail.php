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
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript"></script>
    <style>
        .personal {
            border: 1.5px solid;
            width: 80%;
            margin-left: auto;
            margin-right: auto;
            display: none;
        }

        .personal img {
            width: 100%;
            height: 100%;
            background-size: cover;
        }

        #person {
            width: 100%;
            border-collapse: collapse;
            height: 100%;
        }

        table {
            border-collapse: collapse;
        }

        #person td {
            border-color: black;
            border-width: 1px;
            width: 50%;
            padding-left: 1em;
        }

        #person tr {
            border-spacing: 0;
            border: none;
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
                                <div class="col-3">
                                    <img src=<?= View::assets('images\ava_nam.jpg') ?>>
                                </div>
                                <div class="col-9">
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
            <!-- MODAL ADD -->
            <div class="modal fade text-left" id="add-dtcl-modal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Thêm Hồ Sơ</h4>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form name="form-detail-add" id="form-detail-add" method="post">
                                <div class="row">
                                    <div class="form-group row col-6">
                                        <label for="begindate" class="col-sm-4 col-form-label">Ngày bắt đầu</label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control" id="beginday" name="beginday">
                                        </div>
                                    </div>
                                    <div class="form-group row col-6">
                                        <label for="object" class="col-sm-4 col-form-label">Đối tượng:</label>
                                        <div class="col-8">
                                            <select class="form-control" name="object" id="object">
                                                <option value='-1'>Chưa xác định</option>
                                                <option value='0'>F0</option>
                                                <option value='1'>F1</option>
                                                <option value='2'>F2</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row col-6">
                                        <label for="source" class="col-sm-4 col-form-label">Nguồn lây:</label>
                                        <div class="col-8">
                                            <select class="form-control" name="source" id="source">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row col-6">
                                        <label for="phone_number" class="col-sm-4 col-form-label">Địa điểm:</label>
                                        <div class="col-8">
                                            <select class="form-control" name="local" id="local">
                                            </select>
                                        </div>
                                    </div>
                                </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Đóng</span>
                            </button>
                            <button type="submit" class="btn btn-primary ml-1">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Thêm</span>
                            </button>
                        </div>
                        </form>
                    </div>
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
        $(document).ready(function() {
            $('#view-dtcl').click(function() {
                $('.personal').toggleClass('d-none')
            })
            add();
            getAdd();
            getList(1);
          
            // Các sự kiện
            $('#add-dtcl-modal').modal('show');
        })
        //Lấy ngày hiện tại
        function getDateTime() {
            var d = new Date();
            var yyyy = d.getFullYear();
            var mm = d.getMonth() + 1;
            var dd = d.getDate();
            return yyyy + '-' + (mm < 10 ? '0' + mm.toString() : mm) + '-' + (dd < 10 ? '0' + mm.toString() : dd);

        }
        //Hàm thay đổi trang
        function changePage(newPage) {
            getList(newPage, $('#search-benhnhan-text').val(), $('#cars-search').val());
        }

        //Hàm thêm
        function add() {
            $("form[name='form-detail-add']").validate({
                rules: {
                    beginday: {
                        require: true,
                        min: getDateTime()
                    },
                    object: {
                        min: 1
                    }
                },
                messages: {
                    beginday: {
                        require: "Trường này là bắt buộc",
                        min: "Thời gian phải sau ngày hiện tại"
                    },
                    object: {
                        min: "Nguuuuu"
                    }
                },
                submitHandler: function(form, event) {
                   // event.preventDefault();
                    alert("OK");
                }
            });
        }
        //Hàm load dữ liệu vào modal thêm
        function getAdd() {

            var patient = $.ajax({
                url: 'http://localhost/emss/benhnhan/getAll',
                type: 'POST',
            });
            var location = $.ajax({
                url: 'http://localhost/emss/diadiem/getList',
                type: 'POST',
            });
            $.when(patient, location).done(function(l_patient, l_location) {
                const source = $('#source');
                source.empty();
                const local = $('#local');
                local.empty();
                l_patient[0].forEach(function(element) {
                    source.append(`<option value='${element['ma_benh_nhan']}'>${element['ma_benh_nhan']} - ${element['ho_lot']} ${element['ten']}</option>`);
                });
                l_location[0].forEach(function(element) {
                    if (element['phan_loai'] == 1) local.append(`<option value='${element['ma_dia_diem']}'>${element['ten_dia_diem']}</option>`);
                });
                add();
            })
        }

        function getList(current_page) {
            var _url = location.href;
            $.ajax({
                url: _url + `&flag=view&row_per_page=1&current_page=${current_page}`,
                type: 'get'
            }).done(function(data) {
                const content = $('#table1 > tbody');
                content.empty();
                var row = 0;
                data.data.forEach(function(element, index) {
                    var mark = 'table-info';
                    if (row % 2 == 0) {
                        mark = 'table-light';
                    }
                    var html = `<tr class="${mark}">
                            <td>${element.ma_ho_so}</td>
                            <td>${element.tg_bat_dau}</td>
                            <td>${element.tg_ket_thuc}</td>
                            <td>${element.ten_dia_diem}</td>
                            <td>
                                <a href = "<?= View::url('doituongcachly/detail?id=${element.ma_nguoi_dung}') ?>">
                                    <button type="button" class="btn btn-sm btn-outline-primary" style="padding-top: 3px; padding-bottom: 4px;"><i class="bi bi-eye"></i></button>
                                </a>
                                <button onclick="deleteRow('${data.ma_nguoi_dung}')" type="button" class="btn btn-sm btn-outline-danger" style="padding-top: 7px; padding-bottom: 0px;">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </td>
                        </tr>`
                    content.append(html);
                    row++;
                })
                let i = 1;
                $('#pagination').empty();
                for (i = 1; i <= data.totalPage; i++)
                    if (i == current_page) {
                        $('#pagination').append(`<li class="page-item active">\<button class="page-link" onclick="changePage(${i})" id="'${i}'">${i}</button>\</li>`);
                    } else $('#pagination').append(`<li class="page-item">\<button class="page-link" onclick="changePage(${i})" id="'${i}'">${i}</button>\</li>`);
            })
        }
    </script>
</body>

</html>