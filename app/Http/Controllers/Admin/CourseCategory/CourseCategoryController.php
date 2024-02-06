<?php

namespace App\Http\Controllers\Admin\CourseCategory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\CourseCategory;
use App\Models\User;
use Carbon\Carbon;

class CourseCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = CourseCategory::orderBy('id', 'desc')->get();
        return view('admin.categories.index', compact('categories'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
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

        CourseCategory::create($input);

        Toastr::success('Course Category created successfully.', 'Success');
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CourseCategory  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = CourseCategory::find($id);
        return view('admin.categories.edit', compact('category'));
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $category
     * @param  \App\CourseCategory  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = CourseCategory::find($id);

        $this->validate($request, [
            'name' => 'required',
        ]);

        $input = $request->all();

        $category->update($input);

        Toastr::success('Course Category updated successfully', 'Success');
        return redirect()->back();
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CourseCategory  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = CourseCategory::find($id);
        $category->delete();

        Toastr::success('Course Category deleted successfully', 'Success');
        return redirect()->route('coursecategories.index');
    }

    public function status($id)
    {
        $categorys = CourseCategory::find($id);
        $newStatus = ($categorys->status == '0') ? '1' : '0';
        $categorys->update([
            'status' => $newStatus
        ]);

        Toastr::success('Status Updated Successfully', 'Success');
        return redirect()->route('coursecategories.index');
    }
}
