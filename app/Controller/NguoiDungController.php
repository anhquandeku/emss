<?php

namespace App\Controller;

use App\Core\Auth;
use App\Core\Controller;
use App\Core\Request;
use App\Model\NguoiDungModel;
use App\Model\DTCLModel;
use LDAP\Result;

class NguoiDungController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        Auth::checkAuthentication();
        $this->View->render('nguoidung/index');
    }
    public function qr()
    {
        Auth::checkAuthentication();
        $this->View->render('nguoidung/qr');
    }
    public function getOneByID()
    {
        Auth::checkAuthentication();
        $ma_nguoi_dung = Request::post('ma_nguoi_dung');
        $data = NguoiDungModel::getOneByID($ma_nguoi_dung);
        return $this->View->renderJSON($data);
    }
    public function  text()
    {
    }
    public function add()
    {
        Auth::checkAuthentication();
        $lastname = Request::post('lastname');
        $firstname = Request::post('firstname');
        $cmnd = Request::post('cmnd');
        $birthday = Request::post('birthday');
        $sex = Request::post('sex');
        $phone_number = Request::post('phone_number');
        $province = Request::post('province');
        $district = Request::post('district');
        $ward = Request::post('ward');
        $village = Request::post('village');
        $home = Request::post('home');
        $email = Request::post('email');
        $password = Request::post('password');
        $address = $province . "-" . $district . "-" . $ward;
        if ($home != '') $address = $address . "-" . $home;
        if ($village != '') $address = $address . "-" . $village;
        $role = Request::post('role');
        $result = NguoiDungModel::add($phone_number, $password, $role, $lastname, $firstname, $cmnd, $birthday, $sex, $address, $email, $phone_number);
        if ($result['thanhcong']) {
            $user = NguoiDungModel::getAll();
            //Lấy người dùng vừa được thêm
            $person = $user[count($user) - 1];
            //Nếu là admin
            if ($person['ma_vai_tro'] > 1 && $person['ma_vai_tro'] < 4) {
            }
            //Nếu là bệnh nhân
            if ($person['ma_vai_tro'] == 4) {
            }
            //Nếu là đối tượng cách ly
            if ($person['ma_vai_tro'] == 5) {
                $source = Request::post('source');
                $f = Request::post('source');
                $local = Request::post('local');
                $result['thanhcong'] = DTCLModel::add_2($person['ma_nguoi_dung'], $local, $f, $source);
                if ($result['thanhcong']) {
                    $date = date('Y-m-d');
                    $result['thanhcong'] = DTCLModel::add($person['ma_nguoi_dung'], $local, $date, '0000-00-00', $f, $source);
                }
            }
        }
        return $this->View->renderJSON($result);
    }
    public function getList()
    {
        Auth::checkAuthentication();
        $keyword = Request::get('keyword');
        $current_page = Request::get('current_page');
        $row_per_page = Request::get('row_per_page');
        $column = Request::get('column');
        $data = NguoiDungModel::getListAdvanted($current_page, $row_per_page, $keyword, $column);
        $this->View->renderJSON($data);
    }
    public function update()
    {
        Auth::checkAuthentication();
        $idUser = Request::post('idUser');
        $lastname = Request::post('lastname');
        $firstname = Request::post('firstname');
        $cmnd = Request::post('cmnd');
        $birthday = Request::post('birthday');
        $sex = Request::post('sex');
        $phone_number = Request::post('phone_number');
        $province = Request::post('province');
        $district = Request::post('district');
        $ward = Request::post('ward');
        $village = Request::post('village');
        $home = Request::post('home');
        $email = Request::post('email');
        $address = $province . "-" . $district . "-" . $ward;
        if ($home != '') $address = $address . "-" . $home;
        if ($village != '') $address = $address . "-" . $village;
        $role = Request::post('role');
        $data = NguoiDungModel::update($idUser,$phone_number, $role, $lastname, $firstname, $cmnd, $birthday, $sex, $address, $email, $phone_number);
        if ($data == true) {
            $user = NguoiDungModel::getOneByID($idUser);
            //Lấy người dùng vừa được thêm
            $person = $user[0];
            //Nếu là admin
            if ($person->ma_vai_tro > 1 && $person->ma_vai_tro  < 4) {
            }
            //Nếu là bệnh nhân
            if ($person->ma_vai_tro == 4) {
            }
            //Nếu là đối tượng cách ly
            if ($person->ma_vai_tro == 5) {
                $source = Request::post('source');
                $f = Request::post('object');
                $local = Request::post('local');
                $data= DTCLModel::add_2($person->ma_nguoi_dung , $local, $f, $source);
                if ($data) {
                    $date = date('Y-m-d');
                    $data = DTCLModel::add($person->ma_nguoi_dung, $local, $date, '0000-00-00', $f, $source);
                }
            }
        }
        $this->View->renderJSON($data);
    }
    public function delete()
    {
        Auth::checkAuthentication();
        $list = Request::post('list_user');
        $list_user = explode('-', $list);
        foreach ($list_user as $value) {
            $data = NguoiDungModel::delete($value);
            if ($data = false) $this->View->renderJSON($data);
        }
        $this->View->renderJSON($data);
    }
    public function getAll()
    {
        Auth::checkAuthentication();
        $data = NguoiDungModel::getAll();
        foreach ($data as $value) {
            $data["ma_" . $value['ma_nguoi_dung']] = $value;
        }
        return $this->View->renderJSON($data);
    }
    public function updateRole()
    {
        Auth::checkAuthentication();
        $ma_nguoi_dung = Request::post('ma_nguoi_dung');
        $role = Request::post('role');
        $data = NguoiDungModel::updateRole($ma_nguoi_dung, $role);
        return $this->View->renderJSON($data);
    }
}

