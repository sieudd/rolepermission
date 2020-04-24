<?php

namespace Sieudd\Rolepermission\Repositories\Eloquent;

use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use Sieudd\Rolepermission\Models\City;
use Sieudd\RolePermission\Repositories\Contracts\CityRepository;

/**
 * Class ImageRepositoryEloquent.
 *
 * @package namespace Sieudd\RolePermission\Repositories\Eloquent;
 */
class CityRepositoryEloquent extends BaseRepository implements CityRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return City::class;
    }

    public function presenter()
    {
        return \Sieudd\Rolepermission\Presenters\CityPresenter::class;
    }

    /**RoomTransformer
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
