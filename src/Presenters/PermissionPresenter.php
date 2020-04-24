<?php

namespace Sieudd\Rolepermission\Presenters;

use Prettus\Repository\Presenter\FractalPresenter;
use Sieudd\Rolepermission\Transformers\PermissionTransformer;

/**
 * Class PermissionPresenter.
 *
 * @package namespace Sieudd\Rolepermission\Presenters;
 */
class PermissionPresenter extends FractalPresenter
{
    protected $resourceKeyItem = 'Permission';
    protected $resourceKeyCollection = 'Permission';
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PermissionTransformer();
    }
}
