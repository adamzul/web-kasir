<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\MakananMinuman;
use Illuminate\Http\Request;

class MakananMinumanController extends Controller
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
            $makananminuman = MakananMinuman::latest()->paginate($perPage);
        } else {
            $makananminuman = MakananMinuman::latest()->paginate($perPage);
        }

        return view('makanan-minuman.index', compact('makananminuman'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('makanan-minuman.create');
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
        
        $requestData = $request->all();
        
        MakananMinuman::create($requestData);

        return redirect('makanan-minuman')->with('flash_message', 'MakananMinuman added!');
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
        $makananminuman = MakananMinuman::findOrFail($id);

        return view('makanan-minuman.show', compact('makananminuman'));
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
        $makananminuman = MakananMinuman::findOrFail($id);

        return view('makanan-minuman.edit', compact('makananminuman'));
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
        
        $makananminuman = MakananMinuman::findOrFail($id);
        $makananminuman->update($requestData);

        return redirect('makanan-minuman')->with('flash_message', 'MakananMinuman updated!');
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
        MakananMinuman::destroy($id);

        return redirect('makanan-minuman')->with('flash_message', 'MakananMinuman deleted!');
    }
}
