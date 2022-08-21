<?php

namespace App\Http\Controllers;
use App\Http\Controllers\AdvertiserController;
use Illuminate\Support\Facades\Hash;
use App\Models\cr;
use App\Models\User;
use App\Models\Advertiser;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {

        // return view('sidebar.users');
        $data=User::where('isAdmin','User')->get();
        return view('usersDash.usersDash', ['data'=>$data]);
    }
    
    public function delete($id)
     {      
        $data=User::find($id);
         //dd($data);
        $data->delete();
        
        return redirect(route('usersTable'));
    }

    public function showuser()
    {  
     $data=User::where('isAdmin','Advertiser')->get();
        return view ('sidebar.advertisersTable',['data'=>$data]);

    }
    public function destroyl($id)
    {
        // dd($id);
        $x=Advertiser::find($id);
        foreach($x->properity as $item ){
           $item->delete();
        }
        $user=$x->user;
        //dd($x->user);
        $x->delete();
        $user->delete();
       

        return  redirect(route('advertiser'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   

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
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function show(cr $cr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function edit(cr $cr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cr $cr)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function destroy(cr $cr)
    {
        //
        
    }






    public function destroyAdver($id)
    {
        // dd($id);
        $x=Advertiser::find($id);
         //dd($x);
        $x->user->delete();
        $x->delete();

        return  redirect(route('advertiser'));
    }


    public function updateprofile(User $data, request $request ){
        // dd($request);
       
    //  dd($user);
    
    $id_photo=optional($request->file("id_photo"))->getClientOriginalName();
        $filePath = optional($request->file('id_photo'))->storeAs('images', $id_photo, 'public');
        $user=$data->update([

            'name'=>$request['name'],
            'email'=>$request['email'],
            'password' => Hash::make($request['password']),
            'age'=>$request['age'],
            'mobile'=>$request['phone'],
            'address'=>$request['address'],
            'isAdmin'=>'Advertiser',
        ]);
        //dd($data->Advertiser);
        $data->Advertiser->update([
            'national_id'=>$request['national_id'],
            'id_photo'=>$filePath,
            'bank_account'=>$request['bank_account'],
            
        ]);
    //   dd(Auth::user());
        return redirect(route('login'));
    }
}
