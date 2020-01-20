<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $equipment
 * @property int $quantity
 * @property string $start
 * @property string $end
 */
class Planning_model extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'planning';

    /**
     * @var array
     */
    protected $fillable = ['equipment', 'quantity', 'start', 'end'];

}
