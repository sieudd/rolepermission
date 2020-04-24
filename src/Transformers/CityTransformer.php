<?php

namespace Sieudd\Rolepermission\Transformers;

use Sieudd\Rolepermission\Models\City;

/**
 * Class CityTransformer.
 *
 * @package namespace App\Transformers;
 */
class CityTransformer extends \Sieudd\Rolepermission\Transformers\BaseTransformer
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
    protected $defaultIncludes = [];
}
