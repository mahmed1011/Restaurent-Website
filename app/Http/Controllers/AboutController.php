<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $abouts = About::paginate(4);
        return view('admin.About.show-about',compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.About.form');
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
            $about = $request->id;
            $about = About::find($id);
            $about->heading = $request->heading;
            $about->discription = $request->discription;
            $about->image = $filename;
            $about->image = $filename;
            $about->image = $filename;
            $about->update();
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $request->image->move(public_path('image'), $filename);
            return redirect()->route('show.abouts')->with('message','About Update Successfully');
        }
        else
        {
            $filename = time() . '.' . request()->image->extension();
            $about = new about();
            $about->title = $request->title;
            $about->price = $request->price;
            $about->image = $filename;
            $about->heading = $request->heading;
            $about->discription = $request->discription;
            $about->save();
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $request->image->move(public_path('image'), $filename);
            return redirect()->route('show.abouts')->with('message','About Inserted Successfully');
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
            $abouts = About::paginate(4);
            return view('admin.About.show-about',compact('abouts'));
        }
        $abouts = About::where('heading','Like','%'.$search.'%')->get();

        return view('admin.About.show-about',compact('abouts'));
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
        $about = About::find($id);
        return view('admin.About.form',compact('about'));
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
        $about = About::find($id);
        $about->delete();
        return redirect()->route('show.abouts')->with('message','About Deleted Successfully');
    }
}