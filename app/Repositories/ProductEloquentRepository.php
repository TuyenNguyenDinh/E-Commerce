<?php

namespace App\Repositories;



class ProductEloquentRepository extends EloquentRepository
{

    public function getClassModel()
    {
        return \App\Models\Products::class;
    }
}
