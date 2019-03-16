<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\App
 *
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\App newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\App newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\App onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\App query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Query\Builder|\App\App withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\App withoutTrashed()
 * @mixin \Eloquent
 */
class App extends Model
{
    use SoftDeletes;
    /**
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];
}
