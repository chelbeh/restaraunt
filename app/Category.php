<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;
use Kalnoy\Nestedset\NodeTrait;

/**
 * App\Category
 *
 * @property-read \Kalnoy\Nestedset\Collection|Category[] $children
 * @property-read Category $parent
 * @property-read Collection|Product[] $products
 * @property-write mixed $parent_id
 * @method static \Illuminate\Database\Eloquent\Builder|Category d()
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static Builder|Category onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static bool|null restore()
 * @method static Builder|Category withTrashed()
 * @method static Builder|Category withoutTrashed()
 * @mixin Eloquent
 */
class Category extends Model
{
    use SoftDeletes;
    use NodeTrait;
    /**
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * One category can has many products
     */
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
