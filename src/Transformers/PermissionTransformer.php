<?php

namespace Sieudd\Rolepermission\Transformers;

use Spatie\Permission\Models\Permission;

/**
 * Class PermissionTransformer.
 *
 * @package namespace App\Transformers;
 */
class PermissionTransformer extends \Sieudd\Rolepermission\Transformers\BaseTransformer
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

    public function customAttributes($model): array
    {
        return [
            'name' => $model->name,
            'guard_name' => $model->guard_name,
        ];
    }
}
