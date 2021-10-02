<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {   
        // dd($user->profile->village);
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {   
        $province = Province::all();
        $regency = Regency::all();
        
        $district = District::take(30)->get();
        
        $village = Village::take(50)->get();
        
        return view('user.edit', compact('user', 'province', 'regency', 'district', 'village'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // dd($user->profile->village->name);
        $request->validate([
            'fullname' => 'required',
            'email' => 'required',
            'address' => 'required',
            'village_id' => 'required',
            'district_id' => 'required',
            'regency_id' => 'required',
            'province_id' => 'required',
        ]);
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->update();

        // dd($request->all());
        $user->profile()->update([
            'fullname' => $request->fullname,
            'age' => $request->age,
            'phone' => $request->phone,
            'address' => $request->address,
            'village_id' => $request->village_id,
            'regency_id' => $request->regency_id,
            'district_id' => $request->district_id,
            'province_id' => $request->province_id,
        ]);

        return redirect('/home')->with('sukses', 'Your Profile has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
