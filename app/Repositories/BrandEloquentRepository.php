<?php

namespace App\Repositories;


class BrandEloquentRepository extends EloquentRepository
{

    public function getClassModel()
    {
        return \App\Models\Brands::class;
    }
}
