<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Whatsapp;

class WhatsappController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('whatsapp.wa');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $target = whatsapp::all();

        $data_target = '';
        foreach ($target as $item) {
            if (count($target)<=1){
                $data_target .= $item->no_hp . '|' . $item->nama;
            }else{
                $data_target .= $item->no_hp . '|' . $item->nama . ',';
            }
        }
        $token = '64q+!yn1gB0Io19dLtMu';

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
            'target' => $data_target,
            'message' => 'test message to {name}, selamat anda lolos',
            'delay' => '5-10'
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization:'.$token
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
