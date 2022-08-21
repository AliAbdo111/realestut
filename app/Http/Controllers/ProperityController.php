<?php

namespace App\Http\Controllers;

use App\Models\Properity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProperityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()['isAdmin']=='Admin') {
            $data=Properity::all();
        } else {
            $x=Auth::user()->advertiser;
            $data=$x->properity;
        }
        return view("Properity.Feed", ['data'=>$data]);
    }

    /**properity
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     */
    public function create()
    {
        // $role=Auth::user()['isAdmin'];
        // if($role=='Admin' OR 'Advertiser'){

        return view('addForm.addForm');
        // }
        // else
        // {
        
        //     return redirect(route('home'));
        // }
    }
    
    




    public function store(Request $request)
    {
        $image1=optional($request->file("image1"))->getClientOriginalName();
            $filePath1 = optional($request->file('image1'))->storeAs('images', $image1, 'public');

                    $image2=optional($request->file("image2"))->getClientOriginalName();
                      $filePath2 = optional($request->file('image2'))->storeAs('images', $image2, 'public');

                           $image3=optional($request->file("image3"))->getClientOriginalName();
                                 $filePath3 = optional($request->file('image3'))->storeAs('images', $image3, 'public');

                         $image4=optional($request->file("image4"))->getClientOriginalName();
                     $filePath4 = optional($request->file('image4'))->storeAs('images', $image4, 'public');

                 $image5=optional($request->file("image5"))->getClientOriginalName();
               $filePath5 = optional($request->file('image5'))->storeAs('images', $image1, 'public');

        // move_uploaded_file($_FILES["image1"]['tmp_name'],"storage/images/".$personalImage);
        
    
        //    dd($id=Auth::user());
        //   dd(Auth::user());
        if (Auth::user()->advertiser) {
            $id=Auth::user()->advertiser["id"];
        } else {
            $id=Auth::id();
        }
        Auth::user()->advertiser;
        Properity::create([
            'name'=>$request['name'],
            'address'=>$request['address'],
            'price'=>$request['price'],
            'image1'=>$filePath1,
            'image2'=>$filePath2,
            'image3'=>$filePath3,
            'image4'=>$filePath4,
            'image5'=>$filePath5,
            'type'=>$request['type'],
            'status'=>'pending',
            'desc'=>$request['desc'],
            'Wi-Fi'=>$request['Wi-Fi'],
            'Air Conditioner'=>$request['Air Conditioner'],
            'advertiser_id'=>$id
        ]);
        
 

        //return (view('Properity.Feed'));

        return redirect(route('properities.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Properity  $properity
     * @return \Illuminate\Http\Response
     */

     
    public function show(Properity $properity)
    {

        //dd($properity);
        return view("slider.slider", ['data'=>$properity]);
    }
    

    public function display()
    {
        $data=Properity::all();
        return view("results", ['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Properity  $properity
     * @return \Illuminate\Http\Response
     */
    public function edit(Properity $properity)
    {
        //dd($properity);
        return view("Properity.edit", ['properity'=>$properity]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Properity  $properity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Properity $properity)
    {
        $image1=optional($request->file("image1"))->getClientOriginalName();
            $filePath1 = optional($request->file('image1'))->storeAs('images', $image1, 'public');

                    $image2=optional($request->file("image2"))->getClientOriginalName();
                      $filePath2 = optional($request->file('image2'))->storeAs('images', $image2, 'public');

                           $image3=optional($request->file("image3"))->getClientOriginalName();
                                 $filePath3 = optional($request->file('image3'))->storeAs('images', $image3, 'public');

                         $image4=optional($request->file("image4"))->getClientOriginalName();
                     $filePath4 = optional($request->file('image4'))->storeAs('images', $image4, 'public');

                 $image5=optional($request->file("image5"))->getClientOriginalName();
               $filePath5 = optional($request->file('image5'))->storeAs('images', $image1, 'public');



        
        //   dd($filePath);

        if (Auth::user()->advertiser) {
            $id=Auth::user()->advertiser["id"];
        } else {
            $id=Auth::id();
        }
        $properity->update([
            // 'id'=>$request['id'],
            'name'=>$request['name'],
            'address'=>$request['address'],
            'price'=>$request['price'],
            'image1'=>$filePath1,
            'image2'=>$filePath2,
            'image3'=>$filePath3,
            'image4'=>$filePath4,
            'image5'=>$filePath5,
            'type'=>$request['type'],
            'status'=>'pending',
            'desc'=>$request['desc'],
            'Wi-Fi'=>$request['Wi-Fi'],
            'Air Conditioner'=>$request['Air Conditioner'],
            'advertiser_id'=>$id
            
           
        ]);
        return redirect(route('properities.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Properity  $properity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Properity $properity)
    {
        $properity->delete();
        return redirect(route('properities.index'));
    }

    public function status(Properity $status)
    {
        $status->update(['status'=>'approved']);
        return redirect(route('properities.index'));
    }
    public function statu(Properity $status)
    {
        $status->update(['status'=>'rejected']);
        return redirect(route('properities.index'));
    }
     
    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
