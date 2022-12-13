<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\SexResource;
use Illuminate\Support\Facades\DB;
use App\Models\Population;
// use App\Models\Dusun;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SexController extends Controller
{
    public function index(){
        $sex = DB::table('populations')
            ->leftJoin('sexes', 'populations.sex_id', '=', 'sexes.id')
            ->leftjoin('dusuns', 'populations.dusun_id', '=', 'dusuns.id')
            ->select('dusuns.id as DusunID','sexes.id as id_jenis_kelamin','sexes.name as jenis_kelamin',
                        DB::raw('COUNT(*) as total'))
            ->groupBy(['dusuns.name','sexes.name'])
            ->get();

        return new SexResource(true, 'List Data Jenis Kelamin', $sex);
    }
}
