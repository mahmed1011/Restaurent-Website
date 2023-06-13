<?php

namespace App\Http\Controllers;

use App\Models\Lunch;
use Illuminate\Http\Request;

class LunchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $lunchs = Lunch::paginate(4);
        return view('admin.Lunch.show-lunch',compact('lunchs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Lunch.form');
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
            $lunch = $request->id;
            $lunch = Lunch::find($id);
            $lunch->heading = $request->heading;
            $lunch->discription = $request->discription;
            $lunch->image = $filename;
            $lunch->price = $request->price;
            $lunch->update();
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $request->image->move(public_path('image'), $filename);
            return redirect()->route('show.lunch')->with('message','Lunch Update Successfully');
        }
        else
        {
            $filename = time() . '.' . request()->image->extension();
            $lunch = new lunch();
            $lunch->heading = $request->heading;
            $lunch->discription = $request->discription;
            $lunch->image = $filename;
            $lunch->price = $request->price;
            $lunch->save();
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $request->image->move(public_path('image'), $filename);
            return redirect()->route('show.lunch')->with('message','Lunch Inserted Successfully');
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
            $lunchs = Lunch::paginate(4);
            return view('admin.Lunch.show-lunch',compact('lunchs'));
        }
        $lunchs = Lunch::where('heading','Like','%'.$search.'%')->get();

        return view('admin.Lunch.show-lunch',compact('lunchs'));
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
        $lunch = Lunch::find($id);
        return view('admin.Lunch.form',compact('lunch'));
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
    public function destroy(lunch $lunch, $id)
    {
        $lunch = Lunch::find($id);
        $lunch->delete();
        return redirect()->route('show.lunch')->with('message','Lunch Deleted Successfully');
    }
}