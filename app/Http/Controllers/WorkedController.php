<?php

namespace App\Http\Controllers;

use App\Worked;
use Illuminate\Http\Request;

class WorkedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $worked_ini = Worked::where('status', 'start')->orderByDesc('created_at')->first();
        dump($worked_ini);
        return view('index', $worked_ini);
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
        $worked = new Worked;

        $worked->status = $request->status;

        $worked->save();
        


        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Worked  $worked
     * @return \Illuminate\Http\Response
     */
    public function show(Worked $worked)
    {
        print "Hola soy el Show.";
    //SELECT * FROM `workeds` WHERE `status` = 'start' ORDER BY `created_at` DESC
        return view('/')->with('message', 'tu sesion' . '$status');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Worked  $worked
     * @return \Illuminate\Http\Response
     */
    public function edit(Worked $worked)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Worked  $worked
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Worked $worked)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Worked  $worked
     * @return \Illuminate\Http\Response
     */
    public function destroy(Worked $worked)
    {
        //
    }
}
