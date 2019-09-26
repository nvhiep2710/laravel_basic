<?php
namespace App\Repositories\EloquentRepository;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\BaseRepository;
use App\Repositories\RepositoryInterface\CountryInterface;
use App\Eloquent\Country;

class CountryEloquentRepository extends BaseRepository implements CountryInterface
{
    public function __construct(Country $model)
    {
       parent::__construct($model);
    }
}