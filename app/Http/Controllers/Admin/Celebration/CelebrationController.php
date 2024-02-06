<?php

namespace App\Http\Controllers\Admin\Celebration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Module;
use App\Models\MiniModule;
use App\Models\Celebration;
use App\Models\User;
use Carbon\Carbon;

class CelebrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $celebrations = Celebration::orderBy('id', 'desc')->get();
        return view('admin.celebrations.index', compact('celebrations'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.celebrations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $input = $request->all();
        $input['user_id'] = Auth::user()->id;
        $input['course_id'] = $request->input('course_id');

        Celebration::create($input);

        Toastr::success('Celebration created successfully.', 'Success');
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Celebration  $celebration
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $celebration = Celebration::find($id);
        return view('admin.celebrations.edit', compact('celebration'));
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $celebration
     * @param  \App\Celebration  $celebration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $celebration = Celebration::find($id);

        $this->validate($request, [
            'name' => 'required',
        ]);

        $input = $request->all();

        $celebration->update($input);

        Toastr::success('Celebration updated successfully', 'Success');
        return redirect()->back();
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Celebration  $celebration
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $celebration = Celebration::find($id);
        $celebration->delete();

        Toastr::success('Celebration deleted successfully', 'Success');
        return redirect()->back();
    }

    public function status($id)
    {
        $celebration = Celebration::find($id);
        $newStatus = ($celebration->status == '0') ? '1' : '0';
        $celebration->update([
            'status' => $newStatus
        ]);

        Toastr::success('Status Updated Successfully', 'Success');
        return redirect()->back();
    }
}
