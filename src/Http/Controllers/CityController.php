<?php

namespace Sieudd\Rolepermission\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Sieudd\Rolepermission\Http\Controllers\BaseController;
use Sieudd\Rolepermission\Repositories\Contracts\CityRepository;

class CityController extends BaseController
{
    /**
     * @var CityRepository
     */
    protected $cityRepository;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(CityRepository $cityRepository)
    {
        $this->cityRepository = $cityRepository;
    }

    /**
     * Store a newly created resoucre in storage
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $city = $this->cityRepository->create($request->all());

        return $this->success($city, trans('lang::messages.city.createSuccess'), ['code' => Response::HTTP_CREATED, 'isShowData' => false]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $city = $this->cityRepository->find($id);

        return $this->success($city, trans('lang::messages.city.getInfoSuccess'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $city = $this->cityRepository->paginate(10);

        return $this->success($city, trans('lang::messages.city.getListSuccess'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  string $id
     *
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $city = $this->cityRepository->update($request->all(), $id);

        return $this->success($city, trans('lang::messages.city.updateSuccess'), ['isShowData' => false]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->cityRepository->delete($id);

        return $this->success([], trans('lang::messages.city.deleteSuccess'), ['code' => Response::HTTP_NO_CONTENT, 'isShowData' => false]);
    }
}
