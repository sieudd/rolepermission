<?php

namespace Sieudd\Rolepermission\Presenters;

use Prettus\Repository\Presenter\FractalPresenter;
use Sieudd\Rolepermission\Transformers\CityTransformer;

/**
 * Class RolesPresenter.
 *
 * @package namespace App\Presenters;
 */
class CityPresenter extends FractalPresenter
{
    protected $resourceKeyItem = 'City';
    protected $resourceKeyCollection = 'City';
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CityTransformer();
    }
}
