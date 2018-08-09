<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $id_pesanan
 * @property int $id_makanan_minuman
 * @property int $jumlah
 * @property string $created_at
 * @property string $updated_at
 */
class DetailPesanan extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'detail_pesanan';

    /**
     * @var array
     */
    protected $fillable = ['id_pesanan', 'id_makanan_minuman', 'jumlah', 'created_at', 'updated_at'];

    public function makanan()
    {
        return $this->belongsTo('App\MakananMinuman', 'id_makanan_minuman');
    }

}
