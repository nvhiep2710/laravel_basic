<?php

namespace App\Http\Controllers\Api\v2;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\EloquentRepository\ClassEloquentRepository;
use App\Transformers\v2\ClassTransformers;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Serializer\MySerializer;
use App\Eloquent\Classes;
class ClassController extends Controller
{
    protected $model;

    public function __construct(ClassEloquentRepository $class)
    {
        $this->model = $class;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = $this->model->paginate($request->per_page,['*'],'page',$request->page);
        return fractal()
        ->collection($data, new ClassTransformers())
        ->paginateWith(new IlluminatePaginatorAdapter($data))
        ->serializeWith(new MySerializer());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

    }
}
