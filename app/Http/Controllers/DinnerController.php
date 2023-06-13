<?php

namespace App\Http\Controllers;

use App\Models\Dinner;
use Illuminate\Http\Request;

class DinnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $dinners = Dinner::paginate(4);
        return view('admin.Dinner.show-dinner',compact('dinners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Dinner.form');
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
            $dinner = $request->id;
            $dinner = Dinner::find($id);
            $dinner->heading = $request->heading;
            $dinner->discription = $request->discription;
            $dinner->image = $filename;
            $dinner->price = $request->price;
            $dinner->update();
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $request->image->move(public_path('image'), $filename);
            return redirect()->route('show.dinner')->with('message','Dinner Update Successfully');
        }
        else
        {
            $filename = time() . '.' . request()->image->extension();
            $dinner = new dinner();
            $dinner->heading = $request->heading;
            $dinner->discription = $request->discription;
            $dinner->image = $filename;
            $dinner->price = $request->price;
            $dinner->save();
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $request->image->move(public_path('image'), $filename);
            return redirect()->route('show.dinner')->with('message','Dinner Inserted Successfully');
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
            $dinners = Dinner::paginate(4);
            return view('admin.Dinner.show-dinner',compact('dinners'));
        }
        $dinners = Dinner::where('heading','Like','%'.$search.'%')->get();

        return view('admin.Dinner.show-dinner',compact('dinners'));
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
        $dinner = Dinner::find($id);
        return view('admin.Dinner.form',compact('dinner'));
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
    public function destroy(dinner $dinner, $id)
    {
        $dinner = Dinner::find($id);
        $dinner->delete();
        return redirect()->route('show.dinner')->with('message','Dinner Deleted Successfully');
    }
}