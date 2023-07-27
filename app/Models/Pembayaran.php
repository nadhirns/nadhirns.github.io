<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class Pembayaran extends Model
{
    use HasFactory;
    protected $table = "pembayaran";
    protected $fillable = ["id_pembayaran", "bukti_pembayaran", "status", "verifikasi", "tanggal_pembayaran", "id_pendaftaran"];
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = "id";

    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class, 'id_pendaftaran');
    }
    public static function id()
    {
        $data = DB::table('pembayaran')->orderby('id_pendaftaran', 'DESC')->first();
        // $kodeakhir5 = substr($data->id_pendaftaran, -3);
        $kodeakhir5 = $data ? substr($data->id_pendaftaran, -3) : 0;
        $kodeku = (int)$kodeakhir5;
        $addNol = '';
        $kodetb = 'TAG';
        //$kode = str_replace($kodetb,"", $kode);
        $kode = (int)$kodeku + 1;
        $incrementKode = $kode;


        if (strlen($kode) == 1) {
            $addNol = "000";
        } elseif (strlen($kode) == 2) {
            $addNol = "00";
        } elseif (strlen($kode) == 3) {
            $addNol = "0";
        } elseif (strlen($kode) == 4) {
            $addNol = "";
        }
        $kodeBaru = $kodetb . now()->format('y') . $addNol . $incrementKode;
        return $kodeBaru;
    }

    static public function getPayment()
    {
        $return = self::where('id_pembayaran', '!=', null);

        if (!empty(Request::get('no_pembayaran'))) {
            $return = $return->where('id_pembayaran', 'like', '%' . Request::get('no_pembayaran') . '%');
        }

        $return = $return->orderBy('id_pembayaran', 'asc')->paginate(3);
        return $return;
    }
}
