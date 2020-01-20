<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property int $stock
 */
class Equipment_model extends Model
{
    protected $table = 'equipment';
    /**
     * @var array
     */
    protected $fillable = ['name', 'stock'];

}
