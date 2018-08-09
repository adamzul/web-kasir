<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\DetailPesanan;
use App\MakananMinuman;
use App\Pesanan;
use Illuminate\Http\Request;

class DetailPesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request, $id)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        $pesanan = Pesanan::findOrFail($id);
        if (!empty($keyword)) {
            $detailpesanan = DetailPesanan::latest()->where('id_pesanan', '=', $id)->paginate($perPage);
        } else {
            $detailpesanan = DetailPesanan::latest()->where('id_pesanan', '=', $id)->paginate($perPage);
        }

        return view('detail-pesanan.index', compact('detailpesanan', 'id', 'pesanan') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create($id)
    {
        $makananMinuman = MakananMinuman::where('status', '=','ready')->get();
        return view('detail-pesanan.create', compact('id', 'makananMinuman'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request, $id)
    {
        $requestDataAll = $request->all();
        // return var_dump($requestDataAll);
        $requestData = $requestDataAll;
        $requestData['id_pesanan'] = $id;
        foreach ($requestDataAll['id_makanan_minuman'] as $key => $value) {
            # code...
            $requestData['id_makanan_minuman'] = $value;
            $requestData['jumlah'] = $requestDataAll['jumlah'][$key];
            DetailPesanan::create($requestData);
        }
        
        return redirect()->route('detail_pesanan_index',['id'=>$id])->with('flash_message', 'DetailPesanan added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $detailpesanan = DetailPesanan::findOrFail($id);

        return view('detail-pesanan.show', compact('detailpesanan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id_pesanan, $id)
    {
        $detailpesanan = DetailPesanan::findOrFail($id);

        return view('detail-pesanan.edit', compact('detailpesanan', 'id_pesanan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id_pesanan, $id)
    {
        
        $requestData = $request->all();
        
        $detailpesanan = DetailPesanan::findOrFail($id);
        $detailpesanan->update($requestData);

        return redirect('detail-pesanan/'.$id_pesanan)->with('flash_message', 'DetailPesanan updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id_pesanan, $id)
    {
        DetailPesanan::destroy($id);

        return redirect('detail-pesanan/'.$id_pesanan)->with('flash_message', 'DetailPesanan deleted!');
    }
}
