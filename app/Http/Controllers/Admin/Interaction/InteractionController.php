<?php

namespace App\Http\Controllers\Admin\Interaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Module;
use App\Models\MiniModule;
use App\Models\Interaction;
use App\Models\User;
use Carbon\Carbon;

class InteractionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $interactions = Interaction::orderBy('id', 'desc')->get();
        return view('admin.interactions.index', compact('interactions'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $module = Module::all();
        return view('admin.minimodule.create', compact('module'));
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
            'mini_module_id' => 'required',
        ]);

        $input = $request->all();
        $input['user_id'] = Auth::user()->id;
        $input['course_id'] = $request->input('course_id');

        $miniModuleId = $request->input('mini_module_id');

        $totalTime = Interaction::where('mini_module_id', $miniModuleId)->sum('time');

        // Add the current interaction's time to the total
        $totalTime += $request->input('time');

        // Update the MiniModule table with the calculated total time
        MiniModule::where('id', $miniModuleId)->update(['time' => $totalTime]);

        $miniModule = MiniModule::find($miniModuleId);
        $input['module_id'] = $miniModule->module_id;

        $totalTimeModule = MiniModule::where('module_id', $miniModule->module_id)->sum('time');
        Module::where('id', $miniModule->module_id)->update(['time' => $totalTimeModule]);

        Interaction::create($input);

        Toastr::success('Interaction created successfully.', 'Success');
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Module  $interaction
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $interaction = Interaction::find($id);
        $modules = MiniModule::all();
        return view('admin.interactions.edit', compact('interaction', 'minimodule'));
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $interaction
     * @param  \App\Module  $interaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $interaction = Interaction::find($id);

        $this->validate($request, [
            'name' => 'required',
        ]);

        $input = $request->all();

        $interaction->update($input);

        Toastr::success('Mini Module updated successfully', 'Success');
        return redirect()->back();
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Interaction  $interaction
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $interaction = Interaction::find($id);
        $interaction->delete();

        Toastr::success('Interaction deleted successfully', 'Success');
        return redirect()->back();
    }

    public function status($id)
    {
        $interaction = Interaction::find($id);
        $newStatus = ($interaction->status == '0') ? '1' : '0';
        $interaction->update([
            'status' => $newStatus
        ]);

        Toastr::success('Status Updated Successfully', 'Success');
        return redirect()->back();
    }
}
