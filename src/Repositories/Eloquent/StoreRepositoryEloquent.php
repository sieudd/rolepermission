<?php

namespace Sieudd\Rolepermission\Repositories\Eloquent;

use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use Sieudd\Rolepermission\Models\Store;
use Sieudd\RolePermission\Repositories\Contracts\StoreRepository;

/**
 * Class ImageRepositoryEloquent.
 *
 * @package namespace Sieudd\RolePermission\Repositories\Eloquent;
 */
class StoreRepositoryEloquent extends BaseRepository implements StoreRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Store::class;
    }

    public function presenter()
    {
        return \Sieudd\Rolepermission\Presenters\StorePresenter::class;
    }

    /**RoomTransformer
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
