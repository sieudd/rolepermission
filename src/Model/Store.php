<?php

namespace Sieudd\Rolepermission\Models;

use Sieudd\Rolepermission\Models\BaseModel;

class Store extends BaseModel
{
    /**
     * Declare the table name
     */
    protected $table = 'stores';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'city_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'deleted_at',
    ];

    /**
     * Define relations room
     */
    public function city()
    {
        return $this->belongsTo(\Sieudd\Rolepermission\Models\City::class);
    }

}
