<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $id_pesanan
 * @property int $id_user
 * @property int $meja
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 */
class Pesanan extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'pesanan';
    // protected $primaryKey = 'id_pesanan';
    public $incrementing = false;
    /**
     * @var array
     */
    protected $fillable = ['id', 'id_user', 'meja', 'status', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo('App\User', 'id_user');
    }
}
