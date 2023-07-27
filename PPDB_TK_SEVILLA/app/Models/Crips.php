<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crips extends Model
{
    use HasFactory;

    protected $table = 'crips';
    protected $guarded = [];

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'kriteria_id');
    }


    static public function getCrips()
    {
        $return = self::orderBy('nama_crips', 'ASC')->get();
        return $return;
    }
}
