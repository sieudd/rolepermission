<?php

namespace Sieudd\Rolepermission\Repositories\Eloquent;

use Illuminate\Support\Arr;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use Sieudd\RolePermission\Repositories\Contracts\RoleRepository;
use Spatie\Permission\Models\Role;

/**
 * Class ImageRepositoryEloquent.
 *
 * @package namespace Sieudd\RolePermission\Repositories\Eloquent;
 */
class RoleRepositoryEloquent extends BaseRepository implements RoleRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Role::class;
    }

    public function presenter()
    {
        return \Sieudd\Rolepermission\Presenters\RolePresenter::class;
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
    public function create(array $attributes)
    {
        $role = Role::create(Arr::except($attributes, ['permission']));
        $role->syncPermissions($attributes['permission']);
        return $role;
    }
}
