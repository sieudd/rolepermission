<?php

namespace Sieudd\Rolepermission\Repositories\Eloquent;

use Illuminate\Support\Facades\Route;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use Sieudd\RolePermission\Repositories\Contracts\PermissionRepository;
use Spatie\Permission\Models\Permission;

/**
 * Class ImageRepositoryEloquent.
 *
 * @package namespace Sieudd\RolePermission\Repositories\Eloquent;
 */
class PermissionRepositoryEloquent extends BaseRepository implements PermissionRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Permission::class;
    }

    public function presenter()
    {
        return \Sieudd\Rolepermission\Presenters\PermissionPresenter::class;
    }

    /**RoomTransformer
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * Override method create to add owners
     * @param  array  $attributes attributes from request
     * @return object
     */
    public function paginate($limit = null, $columns = ['*'], $method = "paginate")
    {
        $route_name = [];

        foreach (Route::getRoutes()->getRoutes() as $route) {
            $action = $route->getAction();
            if (array_key_exists('as', $action)) {
                $route_name[] = $action['as'];
            }
        }

        foreach ($route_name as $permission) {
            Permission::updateOrCreate(['name' => $permission]);
        }

        return parent::paginate(10);
    }
}
