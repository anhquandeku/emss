<?php

namespace App\Controller;

use App\Core\Auth;
use App\Core\Controller;
use App\Core\Request;
use App\Model\DTCLModel;

class DoiTuongCachLyController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        Auth::checkAuthentication();
    }

    //Dieuhuongden benhnhan/index
    public function index()
    {
        $this->View->render('doituongcachly/index');
    }
    public function detail()
    {
        $this->View->render('doituongcachly/detail');
    }
    public function getOneByID()
    {   
    }
    public function add()
    {
    }
    public function getList()
    {
        Auth::checkAuthentication();
        $keyword = Request::get('keyword');
        $current_page = Request::get('current_page');
        $row_per_page = Request::get('row_per_page');
        $column = Request::get('column');
        $data = DTCLModel::getAllPagination($keyword,$column,$current_page,$row_per_page);
        $this->View->renderJSON($data);
    }

    public function update()
    {
    }
    public function delete()
    {
    }
}
