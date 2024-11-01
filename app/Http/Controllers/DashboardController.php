<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Courier;
use App\Models\Province;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $province = $this->getProvince();
        $courier = $this->getCourier();
        return view('dashboard', compact('province', 'courier'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        
        $courier = $request->input('courier');
        if ($courier) {
            $result = [];
            foreach ($courier as $row) {
                $ongkir = RajaOngkir::ongkosKirim([
                    'origin'        => $request->origin_city,     // ID kota/kabupaten asal
                    'destination'   => $request->destination_city,      // ID kota/kabupaten tujuan
                    'weight'        => 1300,    // berat barang dalam gram
                    'courier'       => $row    // kode kurir pengiriman: ['jne', 'tiki', 'pos'] untuk starter
                ])->get();
                $result[] = $ongkir;
            }
        }
        return $result;
    }
    
    public function getCourier()
    {
        return Courier::all();
    }

    public function getProvince()
    {
        return Province::pluck('title', 'code');
    }

    public function getCities($id)
    {
        return response()->json(City::where('province_code', $id)->pluck('title', 'code'));
    }

    public function searchCities(Request $request)
    {
        $search = $request->search;
        if (empty($search)) {
            $cities = City::orderBy('title', 'asc')
                ->select('id', 'title')
                ->limit(5)
                ->get();
        } else {
            $cities = City::orderBy('title', 'asc')
                ->where('title', 'like', '%' . $search . '%')
                ->select('id', 'title')
                ->limit(5)
                ->get();
        }
        $response = [];
        foreach ($cities as $city) {
            $response[] = [
                'id' => $city->id,
                'text' => $city->title
            ];
        }
        return json_encode($response);
    }
}
