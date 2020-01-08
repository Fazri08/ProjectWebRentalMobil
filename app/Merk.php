<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Merk extends Model
{
    public $primaryKey = "id_merk";

    protected $table = "table_merk";

    protected $fillable = ["nama_merk"];
}
