<?php

namespace Sieudd\Rolepermission\Models;

class City extends BaseModel
{
    /**
     * Declare the table name
     */
    protected $table = 'citys';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    // /**
    //  * The attributes that should be hidden for arrays.
    //  *
    //  * @var array
    //  */
    // protected $hidden = [
    //     'deleted_at',
    // ];

    /**
     * Define relations bookRooms
     */
    public function store()
    {
        return $this->hasMany(\Sieudd\Rolepermission\Models\Store::class);
    }

}
