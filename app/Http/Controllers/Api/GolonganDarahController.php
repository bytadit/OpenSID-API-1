<?php

namespace App\Http\Controllers\Api;


use App\Models\GolonganDarah;
use App\Models\Penduduk;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\GolonganDarahResource;

use Illuminate\Support\Facades\DB;



class GolonganDarahController extends Controller
{

    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get posts
        // $goldar = Pos::latest()->paginate(5);

        // $goldar = DB::table('tweb_golongan_darah, tweb_penduduk')
        //         ->select('tweb_golongan_darah.nama, tweb_penduduk.sex, COUNT(*)')
        //         ->groupBy('tweb_golongan_darah.nama')
        //         ->where('tweb_penduduk.golongan_darah_id = tweb_golongan_darah.id')
        //         ->get();

        //return collection of posts as a resource
        // return new PostResource(true, 'List Data Posts', $posts);

        // return new GolonganDarahResource(true, 'List Golongan Darah', $goldar);

        // $goldar = GolonganDarah::all();

        $goldar = DB::table('tweb_penduduk')
            ->join('tweb_golongan_darah', 'tweb_penduduk.golongan_darah_id', '=', 'tweb_golongan_darah.id')
            ->join('tweb_penduduk_sex', 'tweb_penduduk.sex', '=', 'tweb_penduduk_sex.id')
            ->select('tweb_golongan_darah.id as id_goldar', 'tweb_golongan_darah.nama as golongan_darah', 'tweb_penduduk_sex.nama as jenis_kelamin', DB::raw('COUNT(*) as total'))
            ->groupBy('tweb_golongan_darah.nama')
            ->get();

        return new GolonganDarahResource(true, 'List Data Goldar', $goldar);

    }

}
