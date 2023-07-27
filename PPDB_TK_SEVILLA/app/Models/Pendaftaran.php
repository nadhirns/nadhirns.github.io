<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use Illuminate\Support\Facades\Request;

class Pendaftaran extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $incrementing = false;

    protected $table = 'pendaftaran';
    protected $primaryKey = "id";
    protected $fillable = [
        'id_pendaftaran',
        'user_id',
        'nama_panggilan',
        'nama_lengkap',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'anak_ke',
        'agama',
        'jumlah_saudara',
        'tinggal_bersama',
        'pas_foto',

        //kontak
        'email',
        'no_hp_ayah',
        'no_hp_ibu',

        //alamat
        'alamat',

        //data ortu
        'nama_ayah',
        'nama_ibu',
        'pekerjaan_ayah',
        'pekerjaan_ibu',
        'pendidikan_ayah',
        'pendidikan_ibu',
        'penghasilan_ayah',
        'penghasilan_ibu',

        //data kesehatan anak
        'penyakit_anak',
        'makanan_bayi',
        'penyakit_kambuh',

        'status_pendaftaran',
        'tgl_pendaftaran',
        'created_at'
    ];

    public static function id()
    {
        $data = DB::table('pendaftaran')->orderby('id_pendaftaran', 'DESC')->first();
        $kodeakhir5 = $data ? substr($data->id_pendaftaran, -4) : 0;
        // $kodeakhir5 = substr($data->id_pendaftaran, -4);
        $kodeku = (int)$kodeakhir5;
        $addNol = '';
        $kodetb = 'PENDPSB';
        $kode = (int)$kodeku + 1;

        if (strlen($kode) == 1) {
            $addNol = "000";
        } elseif (strlen($kode) == 2) {
            $addNol = "00";
        } elseif (strlen($kode) == 3) {
            $addNol = "0";
        } elseif (strlen($kode) == 4) {
            $addNol = "";
        }
        $kodeBaru = $kodetb . now()->format('y') . $addNol . $kode;
        return $kodeBaru;
    }

    static public function getRegist()
    {
        $return = self::where('id_pendaftaran', '!=', null);

        if (!empty(Request::get('no_pendaftaran'))) {
            $return = $return->where('id_pendaftaran', 'like', '%' . Request::get('no_pendaftaran') . '%');
        }

        if (!empty(Request::get('name'))) {
            $return = $return->where('nama_lengkap', 'like', '%' . Request::get('name') . '%');
        }

        if (!empty(Request::get('name_mom'))) {
            $return = $return->where('nama_ibu', '=', Request::get('name_mom'));
        }

        $return = $return->orderBy('id_pendaftaran', 'asc')->paginate(3);
        return $return;
    }

    static public function getTotalRegist()
    {
        $query = self::where('id_pendaftaran', '!=', null);

        if (!empty(Request::get('no_pendaftaran'))) {
            $query->where('id_pendaftaran', 'like', '%' . Request::get('no_pendaftaran') . '%');
        }

        if (!empty(Request::get('name'))) {
            $query->where('nama_lengkap', 'like', '%' . Request::get('name') . '%');
        }

        if (!empty(Request::get('name_mom'))) {
            $query->where('nama_ibu', '=', Request::get('name_mom'));
        }

        return $query->count();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class);
    }

    public function pengumuman()
    {
        return $this->hasMany(Pengumuman::class);
    }

    public function alternatif()
    {
        return $this->hasOne(Alternatif::class, 'alternatif_id');
    }

    // public static function boot()
    // {
    //     parent::boot();

    //     // Menambahkan event saving, di mana kita akan membuat record baru di tabel 'alternatif'
    //     // ketika ada data yang disimpan di tabel 'pendaftaran'
    //     static::saving(function ($pendaftaran) {
    //         if (!$pendaftaran->alternatif) {
    //             $pendaftaran->alternatif()->create(['nama_alternatif' => $pendaftaran->nama_lengkap]);
    //         }
    //     });
    // }
}
