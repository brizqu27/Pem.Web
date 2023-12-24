<?php

namespace app\Routes;

include "app/Controller/PembelianController.php";

use app\Contoller\PembelianController;

class PembelianRoutes{

    public function handle($method, $path){
        // JIKA REQUEST METHOD GET DAN PATH SAMA DENGAN '/api/product'
        if($method == 'GET' && $path == '/api/pembelian'){
            $controller = new PembelianController();
            echo $controller->index();
        }

        // JIKA REQUEST METHOD GET DAN PATH MENGANDUNG '/api/product/'
        if($method == 'GET' && strpos($path,'/api/pembelian/') == 0 ){
            // Extract ID dari path
            $pathParts = explode('/', $path);
            $id = $pathParts[count($pathParts) -1];

            $controller = new PembelianController();
            echo $controller->getById($id);
        }

        // JIKA REQUEST METHOD POST DAN PATH SAMA DENGAN '/api/product'
        if($method == 'POST' && $path == '/api/pembelian'){
            $controller = new PembelianController();
            echo $controller->insert();
        }

        // JIKA REQUEST METHOD PUT DAN PATH MENGANDUNG '/api/product/'
        if($method == 'PUT' && strpos($path,'/api/pembelian/') == 0){
            // Extract ID dari path
            $pathParts = explode('/', $path);
            $id = $pathParts[count($pathParts) -1];

            $controller = new PembelianController();
            echo $controller->update($id);
        }

        // JIKA REQUEST METHOD DELETE DAN PATH MENGANDUNG '/api/product/'
        if($method == 'DELETE' && strpos($path,'/api/pembelian/') == 0){
            // Extract id dari path
            $pathParts = explode('/', $path);
            $id = $pathParts[count($pathParts) -1];

            $controller = new PembelianController();
            echo $controller->delete($id);
        }
    }
}