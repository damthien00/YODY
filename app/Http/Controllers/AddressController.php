<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Province;
use App\Models\Ward;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function getProvince()
    {
        $provinces = Province::all();
        return response()->json($provinces);
    }
    public function getDistrict($province_id)
    {
        $districts = District::where('province_code', $province_id)->get();
        return response()->json($districts);
    }
    public function getWard($district_id)
    {
        $wards = Ward::where('district_code', $district_id)->get();
        return response()->json($wards);
    }
}
