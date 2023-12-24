<?php

namespace app\Traits;


trait ApiResponseFormatter{
    public function apiResponse($code = 200, $message = "success", $data = [], $headers = [], $options = []){
        
        // DARI PARAMETER AKAN DI FORMAT MENJADI SEPERTI DIBAWAH INI
        return json_encode([
            "code"=> $code,
            "message"=> $message,
            "data"=> $data
        ]);
    }
}

