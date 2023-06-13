<?php

namespace App\Http\Controllers;

use App\Models\Breakfast;
use Illuminate\Http\Request;

class BreakfastController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $breakfasts = Breakfast::paginate(4);
        return view('admin.Breakfast.show-breakfast',compact('breakfasts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Breakfast.form');
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
            $breakfast = $request->id;
            $breakfast = Breakfast::find($id);
            $breakfast->heading = $request->heading;
            $breakfast->discription = $request->discription;
            $breakfast->image = $filename;
            $breakfast->price = $request->price;
            $breakfast->update();
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $request->image->move(public_path('image'), $filename);
            return redirect()->route('show.breakfast')->with('message','Breakfast Update Successfully');
        }
        else
        {
            $filename = time() . '.' . request()->image->extension();
            $breakfast = new Breakfast();
            $breakfast->heading = $request->heading;
            $breakfast->discription = $request->discription;
            $breakfast->image = $filename;
            $breakfast->price = $request->price;
            $breakfast->save();
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $request->image->move(public_path('image'), $filename);
            return redirect()->route('show.breakfast')->with('message','Breakfast Inserted Successfully');
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
        if($search == '')
        {
            $breakfasts = Breakfast::paginate(4);
            return view('admin.Breakfast.show-breakfast',compact('breakfasts'));
        }
        $breakfasts = Breakfast::where('heading','Like','%'.$search.'%')->get();

        return view('admin.Breakfast.show-breakfast',compact('breakfasts'));
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
        $breakfast = Breakfast::find($id);
        return view('admin.Breakfast.form',compact('breakfast'));
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
    public function destroy(Breakfast $breakfast, $id)
    {
        $breakfast = Breakfast::find($id);
        $breakfast->delete();
        return redirect()->route('show.breakfast')->with('message','Breakfast Deleted Successfully');
    }
}