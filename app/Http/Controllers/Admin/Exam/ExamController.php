<?php

namespace App\Http\Controllers\Admin\Exam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Module;
use App\Models\MiniModule;
use App\Models\Exam;
use App\Models\User;
use Carbon\Carbon;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exams = Exam::orderBy('id', 'desc')->get();
        return view('admin.exams.index', compact('exams'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.exams.create');
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

        Exam::create($input);

        Toastr::success('Exam created successfully.', 'Success');
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $exam = Exam::find($id);
        return view('admin.exams.edit', compact('exam'));
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $exam
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $exam = Exam::find($id);

        $this->validate($request, [
            'name' => 'required',
        ]);

        $input = $request->all();

        $exam->update($input);

        Toastr::success('Exam updated successfully', 'Success');
        return redirect()->back();
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exam = Exam::find($id);
        $exam->delete();

        Toastr::success('Exam deleted successfully', 'Success');
        return redirect()->back();
    }

    public function status($id)
    {
        $exam = Exam::find($id);
        $newStatus = ($exam->status == '0') ? '1' : '0';
        $exam->update([
            'status' => $newStatus
        ]);

        Toastr::success('Status Updated Successfully', 'Success');
        return redirect()->back();
    }
}
