<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        
        return view('dashboard.home');  
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function settingsIndex()
    {
        $id = auth()->user()->id;
        $user = User::where('id', $id)->first();
        return view('dashboard.settings')->with('user', $user);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        //
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
        
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getQuote(Request $request)
    {
        $quotes = Quote::paginate(5);
        return view('dashboard.add-quotes')->with('quotes', $quotes);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addQuotes(Request $request)
    {
        $request->validate([
            "quote" => "required",
            "image_quote" => "mimes:jpg,jpeg,webp,png'|required|max:5120" 
        ]);

        
        $image = $request->image_quote;
        $filename = $request->file('image_quote')->getClientOriginalName();
        $originalName = pathinfo($filename, PATHINFO_FILENAME);
        $newImageName = time() . '-' . $originalName . '.' . $request->image_quote->extension();

        $img = Image::make($image->getRealPath());
        $img->resize(600, 600)->save(public_path('images/quotes') . '/' . $newImageName);

        Quote::create(
            [
                "quote" => $request->quote,
                "image_quote" => $newImageName
            ]
        );
    
        return redirect()->route('getQuote');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
