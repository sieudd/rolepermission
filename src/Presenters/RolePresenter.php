<?php

namespace Sieudd\Rolepermission\Presenters;

use Prettus\Repository\Presenter\FractalPresenter;
use Sieudd\Rolepermission\Transformers\RoleTransformer;

/**
 * Class RolesPresenter.
 *
 * @package namespace App\Presenters;
 */
class RolePresenter extends FractalPresenter
{
    protected $resourceKeyItem = 'Role';
    protected $resourceKeyCollection = 'Role';
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new RoleTransformer();
    }
}
