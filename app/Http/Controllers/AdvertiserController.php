<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\Advertiser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdvertiserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    
        // return view('registationprof');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[
            'name' => ['required','unique:users', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'bank_account'=>['required','min:11','max:255','unique:users'],
            'id_photo'=>['required','min:11','max:255','unique:users'],
           ];
        $Validator=Validator::make($request->all(), $rules, [
                'name.unique'=>'This username is already  !',
                 'email.unique'=>'This email is already taken ! Please use a diffrent one.',
                'id_photo.required'=>' You must submit an ID photo'
                ]);
        if ($Validator->fails()) {
            return redirect()->back()->withErrors($Validator)->withInputs($request->all());
        }


        $image=$request->file("id_photo");


        $user=User::create([

        'name'=>$request['name'],
        'email'=>$request['email'],
        'password' => Hash::make($request['password']),
        'age'=>$request['age'],
        'mobile'=>$request['mobile'],
        'address'=>$request['address'],
        'isAdmin'=>'Advertiser'

    ]);

        Advertiser::create([
        'user_id'=>$user['id'],
        'national_id'=>$request['national_id'],
        'id_photo'=>$request['id_photo'],
        'bank_account'=>$request['bank_account'],
        
    ]);
        return redirect(route('login'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Advertiser  $advertiser
     * @return \Illuminate\Http\Response
     */
    public function show(Advertiser $advertiser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Advertiser  $advertiser
     * @return \Illuminate\Http\Response
     */
    public function edit(Advertiser $advertiser)
    {
        return redirect(route('login'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Advertiser  $advertiser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Advertiser $advertiser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Advertiser  $advertiser
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advertiser $advertiser)
    {
        //
    }

    public function editadvertiver(User $data)
    {
        //dd($data);
        return view("profile.editprofile", ['data'=>$data]); //,['data'=>$data]);
    }
}
