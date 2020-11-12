<?php

namespace App\Helpers;
use App\Models\General;
use App\Models\Produk;
use App\Models\Sosmed;

use Illuminate\Support\Facades\DB;

class GeneralHelper {
    public static function general() {
        $data = General::first();
		return $data;
    }

    public static function product()
    {
    	$data = Produk::select('name', 'slug')->active()->get();
		return $data;
    }

    public static function sosmed()
    {
        $data = Sosmed::active()->orderBy('name', 'ASC')->get();
        return $data;
    }
}