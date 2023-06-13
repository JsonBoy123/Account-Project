<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\bg_comm_mast;

class bgcommController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $bGcomm = bg_comm_mast::paginate();
        return view('bg_comm.index',compact('bGcomm'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bg_comm.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([   
          'bg_comm_per'=>'required',    
          ]);
        bg_comm_mast::create($data);
        return redirect()->route('BGComm.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = bg_comm_mast::find($id);
        //return redirect()->route('BGComm.edit');
        return view('bg_comm.edit',compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([   
          'bg_comm_per'=>'required', 

        ]);
        bg_comm_mast::where('id',$id)->update($data);
        return redirect('BGComm');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dservice = bg_comm_mast::where('id', $id)->delete();
        return redirect()->back()->with('message','Bg Commission Is Successfully Removed From List');

    }
}
