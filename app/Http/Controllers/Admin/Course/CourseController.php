<?php

namespace App\Http\Controllers\Admin\Course;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\CourseCategory;
use App\Models\Course;
use App\Models\Module;
use App\Models\MiniModule;
use App\Models\Interaction;
use App\Models\Celebration;
use App\Models\User;
use App\Models\Exam;
use Carbon\Carbon;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::with('category')->orderBy('id', 'desc')->get();
        return view('admin.courses.index', compact('courses'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $coursecategories = CourseCategory::where('status', '0')->orderBy('id', 'desc')->get();
        return view('admin.courses.create', compact('coursecategories'));
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
        $input['date'] = Carbon::now();

        Course::create($input);

        Toastr::success('Course created successfully.', 'Success');
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::find($id);
        $coursecategories = CourseCategory::where('status', '0')->orderBy('id', 'desc')->get();
        return view('admin.courses.edit', compact('course', 'coursecategories'));
    }

    public function createCourseModule($id)
    {
        $course = Course::find($id);
        $coursecategories = CourseCategory::where('status', '0')->orderBy('id', 'desc')->get();
        return view('admin.modules.coursemodule', compact('course', 'coursecategories'));
    }

    public function createCourseMiniModule($id)
    {
        $course = Course::find($id);
        $modules = Module::where('status', '0')->orderBy('id', 'desc')->get();
        return view('admin.minimodules.courseminimodule', compact('course', 'modules'));
    }

    public function createCourseInteraction($id)
    {
        $course = Course::find($id);
        $modules = Module::where('status', '0')->orderBy('id', 'desc')->get();
        $minimodules = MiniModule::where('status', '0')->orderBy('id', 'desc')->get();
        return view('admin.interactions.courseInteraction', compact('course', 'modules', 'minimodules'));
    }

    public function createCourseCelebration($id)
    {
        $course = Course::find($id);
        $celebrations = Celebration::where('status', '0')->orderBy('id', 'desc')->get();
        return view('admin.celebrations.courseCelebration', compact('course', 'celebrations'));
    }
    
    public function createCourseExam($id)
    {
        $course = Course::find($id);
        $exams = Exam::where('status', '0')->orderBy('id', 'desc')->get();
        return view('admin.exams.courseExam', compact('course', 'exams'));
    }

    public function view($id)
    {
        $course = Course::find($id);

        $students = User::role('student')->where('parent_id', $id)->orderBy('id', 'desc')->get();
        $studentcounts = User::role('student')->where('parent_id', $id)->orderBy('id', 'desc')->count();

        $modules = Module::where('course_id', $id)->orderBy('id', 'desc')->get();
        $minimodules = MiniModule::with('module')->where('course_id', $id)->orderBy('id', 'desc')->get();
        $interactions = Interaction::with('module', 'minimodule')->where('course_id', $id)->orderBy('id', 'desc')->get();
        $celebrations = Celebration::where('course_id', $id)->orderBy('id', 'desc')->get();
        $exams = Exam::where('course_id', $id)->orderBy('id', 'desc')->get();
    
        return view('admin.courses.view',compact('course', 'students', 'studentcounts', 'modules', 'minimodules', 'interactions', 'celebrations', 'exams'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $course
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $course = Course::find($id);

        $this->validate($request, [
            'name' => 'required',
        ]);

        $input = $request->all();

        $course->update($input);

        Toastr::success('Course updated successfully', 'Success');
        return redirect()->back();
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::find($id);
        $course->delete();

        Toastr::success('Course deleted successfully', 'Success');
        return redirect()->route('courses.index');
    }

    public function status($id)
    {
        $courses = Course::find($id);
        $newStatus = ($courses->status == '0') ? '1' : '0';
        $courses->update([
            'status' => $newStatus
        ]);

        Toastr::success('Status Updated Successfully', 'Success');
        return redirect()->route('courses.index');
    }
}
