<?php
namespace Sieudd\Rolepermission\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Sieudd\Rolepermission\Http\Controllers\BaseController;
use Sieudd\Rolepermission\Repositories\Contracts\PermissionRepository;

class PermissionController extends BaseController
{
    /**
     * @var PermissionRepository
     */
    protected $permissionRepository;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(PermissionRepository $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
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
        $permission = $this->permissionRepository->find($id);

        return $this->success($permission, trans('lang::messages.permission.getInfoSuccess'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permission = $this->permissionRepository->paginate(10);

        return $this->success($permission, trans('lang::messages.permission.getListSuccess'));
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
        $permission = $this->permissionRepository->update($request->all(), $id);

        return $this->success($permission, trans('lang::messages.permission.updateSuccess'));
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
        $this->permissionRepository->delete($id);

        return $this->success([], trans('lang::messages.permission.deleteSuccess'), ['code' => Response::HTTP_NO_CONTENT, 'isShowData' => false]);
    }

}
