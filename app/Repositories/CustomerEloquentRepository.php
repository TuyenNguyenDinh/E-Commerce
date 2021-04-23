<?php

namespace App\Repositories;


class CustomerEloquentRepository extends EloquentRepository
{

    public function getClassModel()
    {
        return \App\Models\Customers::class;
    }
}
