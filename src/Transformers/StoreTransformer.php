<?php

namespace Sieudd\Rolepermission\Transformers;

use Sieudd\Rolepermission\Models\Store;

/**
 * Class StoreTransformer.
 *
 * @package namespace Sieudd\Rolepermission\Transformers;
 */
class StoreTransformer extends \Sieudd\Rolepermission\Transformers\BaseTransformer
{
    /**
     * Array attribute doesn't parse.
     */
    public $ignoreAttributes = [];

    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [];

    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $defaultIncludes = ['city'];

    /**
     * Include City
     * @param  Store $store
     */
    public function includeCity(Store $store)
    {
        $arrayRoom[] = $store->city;
        return $this->collection($arrayRoom, new CityTransformer, 'City');
    }
}
