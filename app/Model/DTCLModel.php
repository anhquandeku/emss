<?php

namespace App\Model;

use App\Core\DatabaseFactory;
use PDO;
use stdClass;

class DTCLModel
{
    public static function getAllPagination($keyword, $column, $current_page, $row_per_page)
    {
        $limit = $row_per_page;
        $offset = ($current_page - 1) * $row_per_page;
        $database = DatabaseFactory::getFactory()->getConnection();
        $keyword = '%' . $keyword . '%';

        $sql = "";
        if ($column == "") {
            $sql = 'SELECT * FROM nguoi_dung, doi_tuong_cach_ly WHERE (ho_lot LIKE :keyword OR ten LIKE :keyword OR F LIKE :keyword OR cmnd LIKE :keyword OR so_dien_thoai LIKE :keyword) AND ma_doi_tuong = ma_nguoi_dung AND trang_thai=1';
        } else if ($column == "ho") {
            $sql = 'SELECT * FROM nguoi_dung, doi_tuong_cach_ly WHERE (ho_lot LIKE :keyword) AND ma_doi_tuong = ma_nguoi_dung AND trang_thai=1';
        } else if ($column == "ten") {
            $sql = 'SELECT * FROM nguoi_dung, doi_tuong_cach_ly WHERE (ten LIKE :keyword) AND ma_doi_tuong = ma_nguoi_dung AND trang_thai=1';
        } else if ($column == "F") {
            $sql = 'SELECT * FROM nguoi_dung, doi_tuong_cach_ly WHERE (F LIKE :keyword) AND ma_doi_tuong = ma_nguoi_dung AND trang_thai=1';
        } else  if ($column == "cmnd") {
            $sql = 'SELECT * FROM nguoi_dung, doi_tuong_cach_ly WHERE (cmnd LIKE :keyword) AND ma_doi_tuong = ma_nguoi_dung AND trang_thai=1';
        } else if ($column == "sdt") {
            $sql = 'SELECT * FROM nguoi_dung, doi_tuong_cach_ly WHERE (so_dien_thoai LIKE :keyword) AND ma_doi_tuong = ma_nguoi_dung AND trang_thai=1';
        }

        $sql .= ' ORDER BY ma_nguoi_dung ASC LIMIT :limit OFFSET :offset';
        $query = $database->prepare($sql);
        $query->bindValue(':limit', $limit, PDO::PARAM_INT);
        $query->bindValue(':offset', $offset, PDO::PARAM_INT);
        $query->bindValue(':keyword', $keyword, PDO::PARAM_STR);
        $query->execute();

        $data = $query->fetchAll();

        if ($column == "") {
            $sql_ = 'SELECT COUNT(*) FROM nguoi_dung, doi_tuong_cach_ly WHERE (ho_lot LIKE :keyword OR ten LIKE :keyword OR F LIKE :keyword OR cmnd LIKE :keyword OR so_dien_thoai LIKE :keyword) AND ma_doi_tuong = ma_nguoi_dung AND trang_thai=1';
        } else if ($column == "ho") {
            $sql_ = 'SELECT COUNT(*) FROM nguoi_dung, doi_tuong_cach_ly WHERE (ho_lot LIKE :keyword) AND ma_doi_tuong = ma_nguoi_dung AND trang_thai=1';
        } else if ($column == "ten") {
            $sql_ = 'SELECT COUNT(*) FROM nguoi_dung, doi_tuong_cach_ly WHERE (ten LIKE :keyword) AND ma_doi_tuong = ma_nguoi_dung AND trang_thai=1';
        } else if ($column == "F") {
            $sql_ = 'SELECT COUNT(*) FROM nguoi_dung, doi_tuong_cach_ly WHERE (F LIKE :keyword) AND ma_doi_tuong = ma_nguoi_dung AND trang_thai=1';
        } else  if ($column == "cmnd") {
            $sql_ = 'SELECT COUNT(*) FROM nguoi_dung, doi_tuong_cach_ly WHERE (cmnd LIKE :keyword) AND ma_doi_tuong = ma_nguoi_dung AND trang_thai=1';
        } else if ($column == "sdt") {
            $sql_ = 'SELECT COUNT(*) FROM nguoi_dung, doi_tuong_cach_ly WHERE (so_dien_thoai LIKE :keyword) AND ma_doi_tuong = ma_nguoi_dung AND trang_thai=1';
        }

        $countQuery = $database->prepare($sql_);
        $countQuery->bindValue(':keyword', $keyword, PDO::PARAM_STR);
        $countQuery->execute();
        $totalRows = $countQuery->fetch(PDO::FETCH_COLUMN);

        $response = [
            'current_page' => $current_page,
            'row_per_page' => $row_per_page,
            'totalPage' => ceil(intval($totalRows) / $row_per_page),
            'data' => $data,
        ];
        return $response;
    }
    public static function getDetailDTCL($userID, $row_per_page, $current_page)
    {
        $limit = $row_per_page;
        $offset = ($current_page - 1) * $row_per_page;
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = 'SELECT * FROM ho_so_cach_ly WHERE ma_doi_tuong = :userID AND trang_thai = 1';

        $sql .= ' ORDER BY tg_bat_dau DESC LIMIT :limit OFFSET :offset';
        $query = $database->prepare($sql);
        $query->bindValue(':limit', $limit, PDO::PARAM_INT);
        $query->bindValue(':offset', $offset, PDO::PARAM_INT);
        $query->bindValue(':userID', $userID, PDO::PARAM_INT);
        $query->execute();

        $data = $query->fetchAll();

        $sql_ = 'SELECT COUNT(*) FROM ho_so_cach_ly WHERE ma_doi_tuong = :userID AND trang_thai = 1';

        $countQuery = $database->prepare($sql_);
        $countQuery->bindValue(':userID', $userID, PDO::PARAM_INT);
        $countQuery->execute();
        $totalRows = $countQuery->fetch(PDO::FETCH_COLUMN);

        $response = [
            'current_page' => $current_page,
            'row_per_page' => $row_per_page,
            'totalPage' => ceil(intval($totalRows) / $row_per_page),
            'data' => $data,
        ];
        return $response;
    }
    public static function add($ma_doi_tuong, $ma_dia_diem, $tg_bat_dau, $tg_ket_thuc, $f, $nguon_lay)
    {

        $database = DatabaseFactory::getFactory()->getConnection();
        $sql = "INSERT INTO ho_so_cach_ly(ma_doi_tuong, ma_dia_diem, tg_bat_dau, tg_ket_thuc, F, nguon_lay, trang_thai) 
                VALUES (:madoituong, :madiadiem, :tgbd, :tgkt, :f, :nguonlay, 1)";
        $query = $database->prepare($sql);
        $query->execute([':madoituong' => $ma_doi_tuong, ':madiadiem' => $ma_dia_diem, ':tgbd' => $tg_bat_dau, ':tgkt' => $tg_ket_thuc, ':f' => $f, ':nguonlay' => $nguon_lay]);
        $count = $query->rowCount();
        if ($count == 1) {
            return true;
        }
        return false;
    }
    public static function delete($ma_ho_so)
    {
        $database = DatabaseFactory::getFactory()->getConnection();
        $query = $database->prepare("UPDATE ho_so_cach_ly SET trang_thai=0 WHERE ma_ho_so = :ma_ho_so");
        $query->execute([':ma_ho_so' => $ma_ho_so]);
        $count = $query->rowCount();
        if ($count == 1) {
            return true;
        }
        return false;
    }
    public static function getOneByID($ma_ho_so)
    {
        $database = DatabaseFactory::getFactory()->getConnection();
        $query = $database->prepare("SELECT * FROM ho_so_cach_ly WHERE ma_ho_so = :ma_ho_so AND trang_thai = 1");
        $query->execute([':ma_ho_so' => $ma_ho_so]);
        $data = $query->fetchAll();
        return $data;
    }
    public static function update($ma_ho_so, $ma_dia_diem, $tg_bat_dau, $f, $nguon_lay)
    {
        $database = DatabaseFactory::getFactory()->getConnection();
        $query = $database->prepare("UPDATE ho_so_cach_ly SET ma_dia_diem = :ma_dia_diem, tg_bat_dau = :tg_bat_dau, f = :f, nguon_lay = :nguon_lay WHERE ma_ho_so = :ma_ho_so");
        $query->execute([':ma_ho_so' => $ma_ho_so, ':ma_dia_diem' => $ma_dia_diem, ':tg_bat_dau' => $tg_bat_dau, ':f' => $f, ':nguon_lay' => $nguon_lay]);
        $count = $query->rowCount();
        if ($count == 1) {
            return true;
        }
        return false;
    }
}
