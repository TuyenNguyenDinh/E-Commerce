<?php

namespace App\Repositories;


class OrderDetailEloquentRepository extends EloquentRepository
{

    public function getClassModel()
    {
        return \App\Models\Orderdetails::class;
    }
}
