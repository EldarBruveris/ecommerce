<?php

namespace App\Services;

use App\Models\Good;

class GoodService{
    public function create(array $data){
        return Good::create($data);
    }

    public function update(Good $good, array $data){
        
    }
}