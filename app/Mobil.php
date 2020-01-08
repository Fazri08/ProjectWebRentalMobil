<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    public $primaryKey = 'id_mobil';

    protected $table = 'table_mobil';

    protected $fillable = [
        'id_mobil', 'nama_mobil', 'tahun', 'kapasitas', 'transmition', 'id_merk', 'foto','harga'
    ];

    public function merk()
    {
        return $this->hasOne('\App\Merk', 'id_merk', 'id_merk');
    }
}
// }
// @foreach ($merk as $item)
// <li><a href="{{route('index.merk')}}, $item->1 ">{{ $item->nama_merk }}</a></li>
// @endforeach
