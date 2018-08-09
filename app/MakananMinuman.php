<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property int $harga
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 */
class MakananMinuman extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'makanan_minuman';

    /**
     * @var array
     */
    protected $fillable = ['name', 'harga', 'status', 'created_at', 'updated_at'];

}
