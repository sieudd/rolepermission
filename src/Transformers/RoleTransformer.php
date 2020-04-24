<?php

namespace Sieudd\Rolepermission\Transformers;

use Spatie\Permission\Models\Role;

/**
 * Class RolesTransformer.
 *
 * @package namespace App\Transformers;
 */
class RoleTransformer extends \Sieudd\Rolepermission\Transformers\BaseTransformer
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
