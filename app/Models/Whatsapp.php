<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Whatsapp extends Model
{
    use HasFactory;

    protected $primaryKey = "id";
    protected $fillable = ["pengumuman_id","nama","no_hp"];

    public function pengumuman()
    {
        return $this->belongsTo(Pengumuman::class);
    }
}
