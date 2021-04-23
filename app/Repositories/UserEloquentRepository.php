<?php

namespace App\Repositories;


class UserEloquentRepository extends EloquentRepository
{

    public function getClassModel()
    {
        return \App\Models\User::class;
    }
}
