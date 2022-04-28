<?php

namespace App\Controller;

use App\Core\Auth;
use App\Core\Controller;
use App\Model\BenhNhanModel;
use App\Model\NguoiDungModel;
use App\Core\Request;

class BenhNhanController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        Auth::checkAuthentication();
    }

    //Dieuhuongden benhnhan/index
    public function index()
    {
        $this->View->render('benhnhan/index');
    }

    public function getOneByID()
    {
    }
    public function add()
    {
    }
    public function getList(){
        Auth::checkAuthentication();
        $search = Request::get('search');
        $search2 = Request::get('search2');
        $current_page = Request::get('current_page');
        $row_per_page = Request::get('row_per_page');
        $data = BenhNhanModel::getAllPagination($search, $search2, $current_page, $row_per_page);
        $this->View->renderJSON($data);
    }
    public function update()
    {
    }
    public function delete(){
        Auth::checkAuthentication();
       // Auth::ktraquyen("CN02");
        $ma_nguoi_dung = Request::post('ma_nguoi_dung');
        $kq= NguoiDungModel::delete($ma_nguoi_dung);
        $response = [
            'thanhcong' => $kq
        ];
        $this->View->renderJSON($response);  
    }
    public function getAll(){
        Auth::checkAuthentication();
        $data = BenhNhanModel::getAll();
        return $this->View->renderJSON($data);
    }
    
}