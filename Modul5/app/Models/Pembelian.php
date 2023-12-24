<?php

namespace app\Models;

include "app/Config/DatabaseConfig.php";

use app\Config\DatabaseConfig;
use mysqli;

class Pembelian extends DatabaseConfig{
    public $conn;

    public function __construct(){
        $this->conn = new mysqli($this -> host, $this->user, $this->password, $this->database_name, $this->port);
        // Check connection
        if($this->conn->connect_error){
            die("Connnection failed: ". $this->conn->connect_error);
        }
    }

    public function findAll(){
        $sql = "SELECT * FROM pembelian JOIN products ON pembelian.id = products.id";
        
        $result = $this->conn->query($sql);
        $this->conn->close();
        $data = [];
        while ($row = $result->fetch_assoc() ){
            $data[] = $row;
        }
        return $data;
    }

    // PROSES MENAMPILKAN DATA DENGAN ID
    public function findById($id){
        $sql = "SELECT * FROM pembelian WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $this->conn->close();
        $data = [];
        while ( $row = $result->fetch_assoc() ){
            $data[] = $row;
        }
        return $data;
    }

    // PROSES INSERT DATA
    public function create($data){
        $namaPembeli = $data['nama_pembeli'];
        $harga = $data['harga'];
        $query = "INSERT INTO pembelian (nama_pembeli, harga) VALUES (?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ss", $namaPembeli, $harga);
        $stmt->execute();
        $this->conn->close();
    }

    // PROSES UPDATE DATA DENGAN ID
    public function update($data, $id){
        $namaPembeli = $data['nama_pembeli'];
        $harga = $data['harga'];
        $query = "UPDATE pembelian SET nama_pembeli = ?, harga = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        // huruf "s" berarti tipe parameter product_name adalah String dan huruf "i" berarti parameter id adalah integer
        $stmt->bind_param("ssi", $namaPembeli, $harga, $id);
        $stmt->execute();
        $this->conn->close();
    }

    // PROSES DELETE DATA DENGAN ID
    public function destroy($id){
        $query = "DELETE FROM pembelian WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        // huruf "i" berarti parameter pertama adalah integer
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $this->conn->close();
    }
}