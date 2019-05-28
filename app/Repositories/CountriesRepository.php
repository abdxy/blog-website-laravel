<?php

namespace App\Repositories;

use App\models\Country;

class CountriesRepository{

    public function getAll()
    {
        return Country::all();
    }


}