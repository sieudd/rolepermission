<?php

namespace Sieudd\Rolepermission\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Sieudd\Rolepermission\Http\Controllers\BaseController;
use Sieudd\Rolepermission\Repositories\Contracts\StoreRepository;

class StoreController extends BaseController
{
    /**
     * @var StoreRepository
     */
    protected $storeRepository;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(StoreRepository $storeRepository)
    {
        $this->storeRepository = $storeRepository;
    }

    /**
     * Store a newly created resoucre in storage
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $store = $this->storeRepository->create($request->all());

        return $this->success($store, trans('lang::messages.store.createSuccess'), ['code' => Response::HTTP_CREATED, 'isShowData' => false]);
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
        $store = $this->storeRepository->find($id);

        return $this->success($store, trans('lang::messages.store.getInfoSuccess'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $store = $this->storeRepository->paginate(10);
        return $this->success($store, trans('lang::messages.store.getListSuccess'));
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
        $store = $this->storeRepository->update($request->all(), $id);

        return $this->success($store, trans('lang::messages.store.updateSuccess'));
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
        $this->storeRepository->delete($id);

        return $this->success([], trans('lang::messages.store.deleteSuccess'), ['code' => Response::HTTP_NO_CONTENT, 'isShowData' => false]);
    }
}
