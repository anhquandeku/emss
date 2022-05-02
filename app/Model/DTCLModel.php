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

        $sql="";
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
}
