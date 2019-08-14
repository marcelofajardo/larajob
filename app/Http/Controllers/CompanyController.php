<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
class CompanyController extends Controller
{
    public function __construct(){
        $this->middleware(['employer','verified'], ['except'=> array('index')]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id, Company $company)
    {
        return view('company.index',compact('company'));
    }

    public function myjobs($id, Company $company)
    {
        return view('company.myjobs',compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
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
                'phone'=>'required|numeric|min:10',
                'website'=>'required',
                'slogan'=>'required',
                'description'=>'required|min:20',



        ]);



        $user_id = auth()->user()->id;
        Company::where('user_id',$user_id)->update([
            'address'=>request('address'),
            'phone'=>request('phone'),
            'website'=>request('website'),
            'slogan'=>request('slogan'),
            'description'=>request('description'),

        ]);
        return redirect()->back()->with('message','Company Information Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        
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

    public function logo(Request $request)
    {
        $user_id = auth()->user()->id;
         $this->validate($request,[
                'logo'=>'required|mimes:png,jpg,jpeg|max:50000',
        ]);
       
        //make directory if not exists
        if(!file_exists('images/profile')){
            mkdir('images/profile',007,true);
        }
        
        //generate file name
        $fileName = auth()->user()->id.'_logo_'.time().'.'.request()->logo->getClientOriginalExtension();
        //upload original file
        request()->file('logo')->move(public_path('images/profile'), $fileName);
        Company::where('user_id',$user_id)->update(['logo'=>$fileName]);
        return redirect()->back()->with('message','Company Logo Sucessfully Updated!');

    }
    public function coverphoto(Request $request)
    {   
        $user_id = auth()->user()->id;
         $this->validate($request,[
                'cover_photo'=>'required|mimes:png,jpg,jpeg|max:50000',
        ]);
       
        //make directory if not exists
        if(!file_exists('images/profile')){
            mkdir('images/profile',007,true);
        }
        
        //generate file name
        $fileName = auth()->user()->id.'_cover_'.time().'.'.request()->cover_photo->getClientOriginalExtension();
        //upload original file
        request()->file('cover_photo')->move(public_path('images/profile'), $fileName);
        Company::where('user_id',$user_id)->update(['cover_photo'=>$fileName]);
        return redirect()->back()->with('message','Company Cover Photo Sucessfully Updated!');

    }
}
