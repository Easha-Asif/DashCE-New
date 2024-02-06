<?php

namespace App\Http\Controllers\Admin\PromoCode;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\PromoCode;
use App\Models\User;
use Carbon\Carbon;

class PromoCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promocodes = PromoCode::orderBy('id', 'desc')->get();
        return view('admin.promocodes.index', compact('promocodes'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brokerages = User::all();
        return view('admin.promocodes.create', compact('brokerages'));
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

        PromoCode::create($input);

        Toastr::success('Promo Code created successfully.', 'Success');
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PromoCode  $promocode
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $promocode = PromoCode::find($id);
        $brokerages = User::all();
        return view('admin.promocodes.edit', compact('promocode', 'brokerages'));
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $promocode
     * @param  \App\PromoCode  $promocode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $promocode = PromoCode::find($id);

        $this->validate($request, [
            'name' => 'required',
        ]);

        $input = $request->all();

        $promocode->update($input);

        Toastr::success('PromoCode updated successfully', 'Success');
        return redirect()->back();
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PromoCode  $promocode
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $promocode = PromoCode::find($id);
        $promocode->delete();

        Toastr::success('PromoCode deleted successfully', 'Success');
        return redirect()->back();
    }

    public function status($id)
    {
        $promocodes = PromoCode::find($id);
        $newStatus = ($promocodes->status == '0') ? '1' : '0';
        $promocodes->update([
            'status' => $newStatus
        ]);

        Toastr::success('Status Updated Successfully', 'Success');
        return redirect()->back();
    }
}
