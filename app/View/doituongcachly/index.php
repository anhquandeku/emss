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
                    <div class="col-sm-6">
                        <h6>Tìm Kiếm</h6>
                        <div id="search-benhnhan-form" name="search-benhnhan-form">
                            <div class="form-group position-relative has-icon-right">
                                <input id="search-benhnhan-text" type="text" class="form-control" placeholder="Tìm kiếm" value="">
                                <div class="form-control-icon">
                                    <i class="bi bi-search"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-8 order-md-1 order-last">
                                <label>
                                    <h3>Danh sách đối tượng cách ly</h3>
                                </label>
                                <br>
                                <label>
                                    <h5 style="margin-right: 10px;"> Lọc Theo:</h5>
                                </label>
                                <select class="btn btn btn-primary btn-sm" name="search-cbb" id="cars-search">
                                    <option value="">Tất Cả</option>
                                    <option value="ho">Họ Lót</option>
                                    <option value="ten">Tên</option>
                                    <option value="F">Đối tượng</option>
                                    <option value="cmnd">CMND</option>
                                    <option value="sdt">Số điện thoại</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-4 order-md-2 order-first">
                                <div class=" loat-start float-lg-end mb-3">
                                    <button id='btn-delete-benhnhan' class="btn btn-danger">
                                        <i class="bi bi-trash-fill"></i> Xóa DTCL
                                    </button>
                                    <button id="btn-add-dtcl" class="btn btn-primary">
                                        <i class="bi bi-plus"></i> Thêm DTCL
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <section class="section">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table mb-0 table-danger" id="table1">
                                        <thead>
                                            <tr>
                                                <th>Họ Lót</th>
                                                <th>Tên</th>
                                                <th>Đối tượng</th>
                                                <th>CMND</th>
                                                <th>Số điện thoại</th>
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
            <div class="modal fade text-left" id="add-modal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Thêm Tài Khoản</h4>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form name="add-form" method="post">
                                <div class="row">
                                    <div class="form-group row col-6">
                                        <label for="lastname" class="col-sm-4 col-form-label">Họ lót:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Họ lót">
                                        </div>
                                    </div>
                                    <div class="form-group row col-6">
                                        <label for="firstname" class="col-sm-4 col-form-label">Tên:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Tên">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group row col-6">
                                        <label for="cmnd" class="col-sm-4 col-form-label">CMND:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="cmnd" name="cmnd" placeholder="CMND">
                                        </div>
                                    </div>
                                    <div class="form-group row col-6">
                                        <label for="firstname" class="col-sm-4 col-form-label">Ngày sinh:</label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control" id="birthday" name="birthday" placeholder="Tên">
                                        </div>
                                    </div>
                                    <div class="form-group row col-6">
                                        <label for="sex" class="col-sm-4 col-form-label">Giới tính:</label>
                                        <div class="col-sm-8 row">
                                            <div class="col-6">
                                                <input type="radio" name="sex" id="male" value="Nam" checked=checked>
                                                <label class="form-check-label col-form-label" for="male"> Nam
                                                </label>
                                            </div>
                                            <div class="col-6">
                                                <input class="" type="radio" name="sex" valune="Nữ" id="female">
                                                <label class="form-check-label col-form-label" for="female"> Nữ
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row col-6">
                                        <label for="phone_number" class="col-sm-4 col-form-label">SĐT:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Số điện thoại">
                                        </div>
                                    </div>
                                </div>
                                <div class=" from-group row" style="padding-right: 1.5em; padding-left:0em" ;>
                                    <label for="address" class="col-2 col-form-label ">Địa chỉ:</label>
                                    <div class="col-10 row form-group">
                                        <div class="col-4">
                                            <select class="form-control" name="province" id="tinh">
                                                <option value='-1'>Chọn TP/Tỉnh</option>
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            <select class="form-control" name="district" id="huyen">
                                                <option value='-1'>Chọn Quận/Huyện</option>
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            <select class="form-control" name="ward" id="xa">
                                                <option value='-1'>Chọn Phường/Xã</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group" ;>
                                    <label for="" class="col-2 col-form-label"> </label>
                                    <div class="col-10 row">
                                        <div class="col-6 row">
                                            <input type="text" class="form-control" id="village" name="village" placeholder="Thôn/ấp">
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" id="home" name="home" placeholder="Số nhà">
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">

                                </div>
                                <div class="row">
                                    <div class="form-group row">
                                        <label for="email" class="col-2 col-form-label"> Email:</label>
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="email" name="email" placeholder="Email">
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
    <script src="<?= View::assets('js/address.js') ?>"></script>
    <script>
        /**Hàm chính */
        $(function() {
            getList(1, "", "");
            $('#btn-add-dtcl').click(function() {
                $('#add-modal').modal('show');
                getListAddress("");
                validateAdd();
            })
        });

        /**Các sự kiện */
        $('#search-benhnhan-text').keyup(function() {
            getList(1, $('#search-benhnhan-text').val(), $('#cars-search').val());
        })
        $('#cars-search').change(function() {
            getList(1, $('#search-benhnhan-text').val(), $('#cars-search').val());
        })

        /**Các hàm */
        //Hàm lấy số trang
        function changePage(newPage) {
            getList(newPage, $('#search-benhnhan-text').val(), $('#cars-search').val());
        }
        /**Hàm lấy danh sách tỉnh huyện xã */
        function getListAddress(flag) {
            var address = $.xResponse();
            address.forEach(function(element, index) {
                $(`#${flag}tinh`).append(`<option class="${flag}tinh" value="${index}">${element['name']}</option>`);
            })
            $(`#${flag}tinh`).change(function() {
                $(`#${flag}huyen`).empty();
                $(`#${flag}huyen`).append('<option value="-1"> Chọn Quận/Huyện</option>')
                $(`#${flag}xa`).empty();
                $(`#${flag}xa`).append('<option value="-1"> Chọn Phường/Xã </option>')
                var districs = address[$(`#${flag}tinh`).val()]['districts'];
                districs.forEach(function(element, index) {
                    $(`#${flag}huyen`).append(`<option class="huyen" value="${index}">${element['name']}</option>`);
                })
                $(`#${flag}huyen`).change(function() {
                    $(`#${flag}xa`).empty();
                    $(`#${flag}xa`).append('<option value="-1"> Chọn Phường/Xã </option>')
                    var wards = districs[$(`#${flag}huyen`).val()]['wards'];
                    wards.forEach(function(element, index) {
                        $(`#${flag}xa`).append(`<option  class="xa" value="${index}">${element['name']}</option>`);
                    })
                })
            });
        }
        //Lấy danh sách đối tượng cách ly   
        function getList(current_page, text, column) {
            $.ajax({
                url: `http://localhost/emss/doituongcachly/getList?current_page=${current_page}&row_per_page=5&keyword=${text}&column=${column}`,
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
                            <td>${element.ho_lot}</td>
                            <td>${element.ten}</td>
                            <td>F${element.F}</td>
                            <td>${element.cmnd}</td>
                            <td>${element.so_dien_thoai}</td>
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
        /**THÊM */
        function validateAdd() {
            $("form[name='add-form']").validate({
                // Định nghĩa rule validate
                rules: {
                    lastname: {
                        required: true,
                    },
                    firstname: {
                        required: true,
                    },
                    cmnd: {
                        required: true,
                        minlength: 9,
                    },
                    birthday: {
                        required: true,
                    },
                    phone_number: {
                        required: true,
                        number: true,
                    },
                    province: {
                        min: 0
                    },
                    district: {
                        min: 0
                    },
                    ward: {
                        min: 0
                    },
                    email: {
                        email: true,
                        required: true
                    },
                },
                //Tạo massages:
                messages: {
                    lastname: "Vui lòng nhập họ lót",
                    firstname: "Vui lòng nhập tên",
                    cmnd: {
                        required: "Vui lòng nhập số chứng minh nhân dân",
                        minlength: "Định dạng CMND không hợp lệ",
                    },
                    birthday: "Vui lòng chọn ngày sinh",
                    phone_number: {
                        required: "Vui lòng nhập số điện thoại",
                        number: "Vui lòng nhập đúng định dạng"
                    },
                    province: "Vui lòng chọn tỉnh/thành phố",
                    district: "Vui lòng chọn huyện/quận",
                    ward: "Vui lòng chọn xã/phường",
                    email: {
                        email: "Vui lòng nhập đúng định dạng",
                        required: "Vui lòng nhập email"
                    },
                },
                submitHandler: function(form, event) {
                    event.preventDefault();
                    doAdd();
                }
            });
        }

        function doAdd() {
            $.post(
                'http://localhost/emss/nguoidung/add', {
                    lastname: $('#lastname').val(),
                    firstname: $('#firstname').val(),
                    cmnd: $('#cmnd').val(),
                    birthday: $('#birthday').val(),
                    sex: $('input[name="sex"]').val(),
                    phone_number: $('#phone_number').val(),
                    province: $('.tinh:selected').text(),
                    district: $('.huyen:selected').text(),
                    ward: $('.xa:selected').text(),
                    village: $('#village').val(),
                    home: $('#home').val(),
                    email: $('#email').val(),
                    password: $('#cmnd').val(),
                    role: 5
                }).done(function(data) {
                if (data['thanhcong']) {
                    Toastify({
                        text: "Thêm thành công",
                        duration: 1000,
                        close: true,
                        gravity: "top",
                        position: "center",
                        backgroundColor: "#00CC33",
                    }).showToast();
                    $('#add-modal').modal('hide');
                    getList(1, "", "");
                } else {
                    Toastify({
                        text: data['error'],
                        duration: 1000,
                        close: true,
                        gravity: "top",
                        position: "center",
                        backgroundColor: "#FF6600",
                    }).showToast();
                    $('#add-user-modal').modal('show');
                }
            })
        }
    </script>
</body>

</html>