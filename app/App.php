<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;

/**
 * App\App
 *
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|App newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|App newQuery()
 * @method static Builder|App onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|App query()
 * @method static bool|null restore()
 * @method static Builder|App withTrashed()
 * @method static Builder|App withoutTrashed()
 * @mixin Eloquent
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
