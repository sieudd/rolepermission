<?php

namespace Sieudd\Rolepermission\Presenters;

use Prettus\Repository\Presenter\FractalPresenter;
use Sieudd\Rolepermission\Transformers\StoreTransformer;

/**
 * Class RolesPresenter.
 *
 * @package namespace App\Presenters;
 */
class StorePresenter extends FractalPresenter
{
    protected $resourceKeyItem = 'Store';
    protected $resourceKeyCollection = 'Store';
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new StoreTransformer();
    }
}
