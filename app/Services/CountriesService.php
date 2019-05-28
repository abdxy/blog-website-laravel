<?php


namespace App\Services;

use App\Repositories\CountriesRepository;

class CountriesService {

    private $countriesRepository;

    public function __construct(CountriesRepository $countriesRepository)
    {
        $this->countriesRepository = $countriesRepository;
    }

public function All()
{
    return $this->countriesRepository->getAll();
}

}