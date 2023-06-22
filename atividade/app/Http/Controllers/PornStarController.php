<?php

namespace App\Http\Controllers;

use App\Models\PornStar;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PornStarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pornStar = PornStar::all();
        return Inertia::render('PornStar', ['PornStar' => $pornStar]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->name);

        PornStar::create([
            'name' => $request->name,
        ]);

        return redirect('/porn');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PornStar  $pornStar
     * @return \Illuminate\Http\Response
     */
    public function show(PornStar $pornStar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PornStar  $pornStar
     * @return \Illuminate\Http\Response
     */
    public function edit(PornStar $pornStar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PornStar  $pornStar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->name, $id);
        $porn = PornStar::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $porn->update([
            'name' => $request->input('name')
        ]);

        return redirect('/porn');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PornStar  $pornStar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        PornStar::find($id)->delete();
        return redirect('/porn');
    }
}
