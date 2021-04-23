<?php

namespace App\Repositories;


class OrderEloquentRepository extends EloquentRepository
{

    public function getClassModel()
    {
        return \App\Models\Orders::class;
    }
}
