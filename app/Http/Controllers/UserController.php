<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use Validator;
use App\User;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware(['seeker','verified']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('profile.index');
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

        $this->validate($request,[
                'address'=>'required',
                'phone_number'=>'required|numeric|min:10',
                'bio'=>'required|min:20',


        ]);



        $user_id = auth()->user()->id;
        Profile::where('user_id',$user_id)->update([
            'address'=>request('address'),
            'phone_number'=>request('phone_number'),
            'experience'=>request('experience'),
            'bio'=>request('bio')
        ]);
        return redirect()->back()->with('message','Profile Updated Successfully');
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
        //
    }
    public function coverletter(Request $request){
        
            $this->validate($request,[
                'cover_letter'=>'required|mimes:pdf,doc,docx|max:20000',
        ]);

        $user_id= auth()->user()->id;
        if(!file_exists('files')){
            mkdir('files',007,true);
        }        
        //generate image name
        $fileName = auth()->user()->id.'_cover_letter_'.time().'.'.request()->cover_letter->getClientOriginalExtension();
        //upload original image
        request()->file('cover_letter')->move(public_path('files'), $fileName);
        Profile::where('user_id',$user_id)->update(['cover_letter'=>$fileName]);
        return redirect()->back()->with('message','Cover Letter Sucessfully Updated!');
         }
    
    Public function resume(Request $request){
        



            $this->validate($request,[
                'resume'=>'required|mimes:pdf,doc,docx|max:20000',
        ]);
         $user_id= auth()->user()->id;
        //make directory if not exists
        if(!file_exists('files')){
            mkdir('files',007,true);
        }
        
        //generate file name
        $fileName = auth()->user()->id.'_resume_'.time().'.'.request()->resume->getClientOriginalExtension();
        //upload original file
        request()->file('resume')->move(public_path('files'), $fileName);
        Profile::where('user_id',$user_id)->update(['resume'=>$fileName]);
        return redirect()->back()->with('message','Resume Sucessfully Updated!');
         }

    
    Public function avatar(Request $request){

        
         $user_id= auth()->user()->id;
         $this->validate($request,[
                'avatar'=>'required|mimes:png,jpg,jpeg|max:50000',
        ]);
       
        //make directory if not exists
        if(!file_exists('images/profile')){
            mkdir('images/profile',007,true);
        }
        
        //generate file name
        $fileName = auth()->user()->id.'_profile_'.time().'.'.request()->avatar->getClientOriginalExtension();
        //upload original file
        request()->file('avatar')->move(public_path('images/profile'), $fileName);
        Profile::where('user_id',$user_id)->update(['avatar'=>$fileName]);
        return redirect()->back()->with('message','Profile Image Sucessfully Updated!');
         }


         public function applicantdetails($id){
            $users = User::find($id);
            //dd($user);
            return view('profile.applicantdetails', compact('users'));
            //echo "you will get persons details here";
         }

    
}
