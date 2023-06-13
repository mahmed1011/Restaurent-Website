<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert; 

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $foods = food::paginate(4);
        return view('admin.food.show-foods',compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.food.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->id;
        if (isset($id) && $id > 0)
        {
            $filename = time() . '.' . request()->image->extension();
            $food = $request->id;
            $food = food::find($id);
            $food->heading = $request->heading;
            $food->discription = $request->discription;
            $food->image = $filename;
            $food->price = $request->price;
            $food->update();
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $request->image->move(public_path('image'), $filename);
            return redirect()->route('show.foods')->with('message','Food Update Successfully');
        }
        else
        {
            $filename = time() . '.' . request()->image->extension();
            $food = new food();
            $food->price = $request->price;
            $food->image = $filename;
            $food->heading = $request->heading;
            $food->discription = $request->discription;
            $food->save();
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $request->image->move(public_path('image'), $filename);
            return redirect()->route('show.foods')->with('message','Food Inserted Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function search(Request $request)
    {
        $search = $request->search;
        // if($search == '')
        // {
        //     $foods = food::paginate(4);
        //     return view('admin.food.show-foods',compact('foods'));
        // }
        $foods = Food::where('heading','Like','%'.$search.'%')->get();

        return view('admin.food.show-foods',compact('foods'));
    }
     public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $food = food::find($id);
        return view('admin.food.form',compact('food'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $food = food::find($id);
        $food->delete();
        return redirect()->route('show.foods')->with('message','Food Deleted Successfully');
    }
}