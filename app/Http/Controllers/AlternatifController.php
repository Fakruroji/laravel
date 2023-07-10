<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    public function index() {
        return view('dataalternatif', [
            'users' => Alternatif::all(),
            'title' => 'Data alternatif'
        ]);
    }
    public function add() {
        return view('adddataalternatif',[
            'title' => 'Tambah Data alternatif'
        ]);
    }
    public function edit($id){
        
        // $alternatif = Alternatif::where('id', $id)->first();

        // return view('editalternatif', [
        //     'alternatif' => $alternatif,
        //     'title' => 'Edit Data alternatif'
        // ]);
        return view('editalternatif')->with([
            'alternatif' => Alternatif::find($id),
        ]);

    }

    public function update(Request $request, $id) {
        $alternatif1      = $request->input('alternatif');
        $plot1   = $request->input('plot');
        $akting1 = $request->input('akting');
        $sinematografi1 = $request->input('sinematografi');
        $rating1 = $request->input('rating');
        $tahun_rilis1 = $request->input('tahun_rilis');
        
        $alternatif = Alternatif::where('id', $id)->first();
        $alternatif->alternatif    = $alternatif1;
        $alternatif->plot = $plot1;
        $alternatif->akting = $akting1;
        $alternatif->sinematografi = $sinematografi1;
        $alternatif->rating = $rating1;
        $alternatif->tahun_rilis = $tahun_rilis1;

        $alternatif->save();

        return redirect()->to('/alternatif');
    }


    public function dashboard(){
        $alternatif= Alternatif::count();

        return view('main', compact('alternatif'));

    }

    public function store(Request $request) {
        $alternatif1 = $request->input('alternatif');
        $plot1 = $request->input('plot');
        $akting1 = $request->input('akting');
        $sinematografi1 = $request->input('sinematografi');
        $rating1 = $request->input('rating');
        $tahun_rilis1 = $request->input('tahun_rilis');

        $alternatif = new Alternatif;
        $alternatif->alternatif    = $alternatif1;
        $alternatif->plot = $plot1;
        $alternatif->akting = $akting1;
        $alternatif->sinematografi = $sinematografi1;
        $alternatif->rating = $rating1;
        $alternatif->tahun_rilis = $tahun_rilis1;

        $alternatif->save();

        return redirect()->to('/alternatif');
    }
    public function delete($id) {
        $alternatif = Alternatif::where('id', $id)->first();
        $alternatif->delete();
        return redirect()->back();
    }
}
