<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest\CountryRequest;
use App\Repositories\EloquentRepository\CountryEloquentRepository;

class CountryController extends Controller
{
    private $country;

    public function __construct(CountryEloquentRepository $country) {

        $this->country = $country;
    }

    public function index()
    {
        $listcountry = $this->country->getallpagigate();
        return view('admin.country.index', compact('listcountry'));
    }

    public function create()
    {
        return view('admin.country.insert');
    }

    public function store(CountryRequest $request)
    {
        $data = $request->only(array_keys($request->rules()));
        $this->country->create($data);
        return redirect()->route('country.index');
    }

    public function edit($id)
    {
        $getrow = $this->country->getbyId($id);
        return view('admin.country.update', compact('getrow'));
    }

    public function update(CountryRequest $request, $id)
    {
        $data = $request->only(array_keys($request->rules()));
        $this->country->update($id,$data);
        return redirect()->route('country.index');
    }
    
    public function destroy($id)
    {
        $this->country->delete($id);
        return redirect()->route('country.index');
    }
}
