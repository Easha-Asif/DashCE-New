<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Content;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contents = Content::orderBy('id', 'desc')->get();
        return view('admin.contents.index', compact('contents'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contents.create');
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
            'value' => 'required',
        ]);

        $input = $request->all();
        $input['added_by'] = Auth::user()->id;

        Content::create($input);

        Toastr::success('Content created successfully.', 'Success');
        return redirect()->route('contents.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $content = Content::find($id);

        return view('admin.contents.edit', compact('content'));
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $content = Content::find($id);

        $this->validate($request, [
            'name' => 'required',
            'value' => 'required',
        ]);

        $input = $request->all();

        $content->update($input);

        Toastr::success('Content updated successfully', 'Success');
        return redirect()->route('contents.index');
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Content  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $content = Content::find($id);
        $content->delete();

        Toastr::success('Content deleted successfully', 'Success');
        return redirect()->route('contents.index');
    }
}
