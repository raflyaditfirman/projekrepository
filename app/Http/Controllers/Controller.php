<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Http;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index(Request $request)
    {
        $res = Http::get('https://insw-dev.ilcs.co.id/n/negara?ur_negara=IND');
        $res1 = Http::get('https://insw-dev.ilcs.co.id/n/pelabuhan?kd_negara=ID');
        $res2 = Http::get('https://insw-dev.ilcs.co.id/n/barang?hs_code=01063300');
        $res3 = Http::get('https://insw-dev.ilcs.co.id/n/tarif?hs_code=22030091');
        $data['users'] = $res->json()['data'];
        $data1['pelabuhan'] = $res1->json()['data'];
        $data2['barang'] = $res2->json()['data'];
        $data3['tarif'] = $res3->json()['data'];
        return view('welcome', ['users' => $data, 'pelabuhan' => $data1, 'barang' => $data2, 'tarif' => $data3]);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            "npwp" => "required",
            "nama" => "required",
            "transaksi" => "required",
            "negara" => "required",
            "pelabuhan" => "required",
            "hscode" => "required",
            "jumlah" => "required",
            "harga" => "required",
            "tarif" => "required",
            "ppn" => "required",
            "total" => "required"
        ]);

        Barang::create($validate);
        $res4 = Http::post('https://insw-dev.ilcs.co.id/n/simpan');
        $data4['simpan'] = $res4->json();

        $res = Http::get('https://insw-dev.ilcs.co.id/n/negara?ur_negara=IND');
        $res1 = Http::get('https://insw-dev.ilcs.co.id/n/pelabuhan?kd_negara=ID');
        $res2 = Http::get('https://insw-dev.ilcs.co.id/n/barang?hs_code=01063300');
        $res3 = Http::get('https://insw-dev.ilcs.co.id/n/tarif?hs_code=22030091');
        $data['users'] = $res->json()['data'];
        $data1['pelabuhan'] = $res1->json()['data'];
        $data2['barang'] = $res2->json()['data'];
        $data3['tarif'] = $res3->json()['data'];
        return view('welcome', ['users' => $data, 'pelabuhan' => $data1, 'barang' => $data2, 'tarif' => $data3, 'simpan' => $data4]);
    }
}
