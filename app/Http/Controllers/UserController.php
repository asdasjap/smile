<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editScore()
    {
        $total = 0;
        $score = 0;
        foreach (request()->all() as $key => $answer) { 
            // dd(gettype((float)$answer));
    
            if(!($key === '_token')) {
                $total += (int)$answer;
            }
        }
        // 0-13 14-26 27-40    
        if(0 < $total && $total < 14) {
            $score = 1;
        } elseif(14 < $total && $total < 27) {
            $score = 2;
        } else {
            $score = 3;
        }
        
        $id = auth()->user()->id;
        $user = User::find($id);
        $user->score = $score;
        $user->save();
    
        return redirect()->route('dashboard');
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
        // $manager = new Image(array('driver' => 'imagick'));
        $user = User::find($id);
        if($request->image_profile === null) {
            $request->validate([
                'name' =>  'min:3|max:255|regex:/^[a-zA-Z ]+$/',
                'email'=>  'email|max:255|string',
                'school'=> 'min:3|max:255|string',
                'guardian_name'=> 'min:3|max:255|string',
                'guardian_email'=> 'max:255|string|email',
                'password'=> 'nullable|min:7',
            ]);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->school = $request->school;
            $user->guardian_name = $request->guardian_name;
            $user->guardian_email = $request->guardian_email;

            if($request->password !== null) {
                
                if($request->password === $request->confirm_password) {
                    $user->password = bcrypt($request->password);
                } else {
                    $validator = Validator::make([], []);
                    $validator->errors()->add('password', 'password do not match');
                    throw new ValidationException($validator);
                }
                
            } 

        } else {
            $request->validate([
                'image_profile' => "mimes:jpg,jpeg,png|max:5120"
            ]);
            $image = $request->image_profile;
            $filename = $request->file('image_profile')->getClientOriginalName();
            $originalName = pathinfo($filename, PATHINFO_FILENAME);
            $newImageName = time() . '-' . $originalName . '.' . $request->image_profile->extension();

            $img = Image::make($image->getRealPath());
            $img->resize(500, 500)->save(public_path('images') . '/' . $newImageName);

            $user->image_profile = $newImageName;
        }
    
        $user->save();
        

        return redirect()->route('settings');
        
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
