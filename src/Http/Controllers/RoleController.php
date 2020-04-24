<?php

namespace Sieudd\Rolepermission\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Sieudd\Rolepermission\Http\Controllers\BaseController;
use Sieudd\Rolepermission\Repositories\Contracts\RoleRepository;

class RoleController extends BaseController
{
    /**
     * @var RoleRepository
     */
    protected $roleRepository;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    /**
     * Store a newly created resoucre in storage
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = $this->roleRepository->create($request->all());

        return $this->success([], trans('lang::messages.role.createSuccess'), ['code' => Response::HTTP_CREATED, 'isShowData' => false]);
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
        $role = $this->roleRepository->find($id);

        return $this->success($role, trans('lang::messages.role.getInfoSuccess'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = $this->roleRepository->paginate(10);

        return $this->success($role, trans('lang::messages.role.getListSuccess'));
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
        $role = $this->roleRepository->update($request->all(), $id);

        return $this->success($role, trans('lang::messages.role.updateSuccess'));
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
        $this->roleRepository->delete($id);

        return $this->success([], trans('lang::messages.role.deleteSuccess'), ['code' => Response::HTTP_NO_CONTENT, 'isShowData' => false]);
    }
}
