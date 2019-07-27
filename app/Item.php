<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Item
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Item newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Item newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Item query()
 * @mixin \Eloquent
 */
class Item extends Model
{
    protected $table = 'items';
    protected $fillable = ['name', 'key'];

}
