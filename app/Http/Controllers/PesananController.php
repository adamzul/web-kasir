<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Pesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $pesanan = Pesanan::latest()->where('status', '=', 'aktif')->paginate($perPage);
        } else {
            $pesanan = Pesanan::latest()->where('status', '=', 'aktif')->paginate($perPage);
        }

        return view('pesanan.index', compact('pesanan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('pesanan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $number = 1;
        $lastRecord = Pesanan::all()->last();
        if($lastRecord != null){
            $numberLastRecordId = explode('-', $lastRecord->id_pesanan);
            // var_dump($lastRecord->id_pesanan);
            $number = $numberLastRecordId[1] + 1;
        }
        // sprintf('%03d', $number);
        $number = str_pad($number, 3, '0', STR_PAD_LEFT);
        var_dump($number);
        $request->id_user = 1;
        $requestData = $request->all();
        // var_dump(date('dmY'));
        // return ;
        $requestData['id'] = "ERP".date('dmY').'-'.$number;
        $requestData['id_user'] = 1;
        $requestData['status'] = 'aktif';
        Pesanan::create($requestData);

        return redirect('pesanan')->with('flash_message', 'Pesanan added!');
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
        $pesanan = Pesanan::findOrFail($id);

        return view('pesanan.show', compact('pesanan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $pesanan = Pesanan::findOrFail($id);

        return view('pesanan.edit', compact('pesanan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $requestData = $request->all();
        $pesanan = Pesanan::findOrFail($id);
        // return var_dump($pesanan);
        $pesanan->meja = $request->meja;
        $pesanan->save();
        // $pesanan->update($request->meja);
        return redirect('pesanan')->with('flash_message', 'Pesanan updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Pesanan::destroy($id);

        return redirect('pesanan')->with('flash_message', 'Pesanan deleted!');
    }

    public function bayar($id){
        $pesanan = Pesanan::findOrFail($id);
        $pesanan->status = 'nonaktif';
        $pesanan->save();
        return redirect('pesanan')->with('flash_message', 'Pesanan updated!');
    }
    public function pesananDariAnda(Request $request, $id){
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $pesanan = Pesanan::latest()->where('id_user', '=', $id)->paginate($perPage);
        } else {
            $pesanan = Pesanan::latest()->where('id_user', '=', $id)->paginate($perPage);
        }

        return view('pesanan.index', compact('pesanan'));
    }
}
