<?php

namespace App\Http\Controllers;

use App\Worked;
use Illuminate\Http\Request;
use App\WorkedSession;

class WorkedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $current_session = WorkedSession::getCurrentSession();

        return view('index', ['session' => $current_session]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->status == 'start'){
            $session = new WorkedSession;
            $session->status = 'start';
            $session->save();
        }else{
            $session = WorkedSession::getCurrentSession();
            $session->status = $request->status;
            $session->save();
        }
    
        $worked = new Worked;
        $worked->session_id = $session->id;
        $worked->status = $request->status;
        $worked->save();

        return redirect(route('index'));
    }
}
