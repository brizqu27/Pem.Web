<?php

namespace app\Contoller;

include "app/Traits/ApiResponseFormatter.php";
include "app/Models/Pembelian.php";

use app\Models\Pembelian;
use app\Traits\ApiResponseFormatter;

class PembelianController{
    // PAKAI TRAIT YANG SUDAH DIBUAT
    use ApiResponseFormatter;

    public function index(){

        //DEFINISIKAN OBJECT MODEL PRODUCT YANG SUDAH DIBUAT
        $webModel  = new Pembelian();
        // PANGGIL FUNGSI ALL PRODUCT
        $response = $webModel->findAll();
        // RETURN $response DENGAN MELAKUKAN FORMATTING TERLEBIH DAHULU MENGGUNAKAN TRAIT YANG SUDAH DIPANGGIL
        return $this->apiResponse(200, "success", $response);
    }

    public function getById($id){
        $webModel = new Pembelian();
        $response = $webModel->findById($id);
        return $this->apiResponse(200, "success", $response);
    }

    public function insert(){
        // TANGKAP INPUT JSON
        $jsonInput = file_get_contents('php://input');
        $inputData = json_decode($jsonInput, true);
        // VALIDASI APAKAH INPUT VALID
        if(json_last_error()){
            return $this->apiResponse(400,"error invalid input", null);
        }

        // LANJUT JIKA TIDAK ERROR
        $webModel = new Pembelian();
        $response = $webModel->create([
            "nama_pembeli"=> $inputData['nama_pembeli'],
            "harga"=> $inputData["harga"]
        ]);

        return $this->apiResponse(200, 'success', $response);
    }

    public function update($id){
        // TANGKAP INPUT JSON
        $jsonInput = file_get_contents('php://input');
        $inputData = json_decode($jsonInput, true);
        // VALIDASI APAKAH INPUT VALID
        if(json_last_error()){
            return $this->apiResponse(400,'', null);
        }

        // LANJUT JIKA TIDAK ERROR
        $webModel = new Pembelian();
        $response = $webModel->update([
            "nama_pembeli"=> $inputData['nama_pembeli'],
            "harga"=> $inputData["harga"]
        ], $id);
        return $this->apiResponse(200, 'success', $response);
    }

    public function delete($id){
        $webModel = new Pembelian();
        $response = $webModel->destroy($id);
        return $this->apiResponse(200, 'success', $response);
    }
}