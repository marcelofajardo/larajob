<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\Company;
use App\Http\Requests\JobPostRequest;
use Auth;
use App\User;
use DB;
class JobController extends Controller
{


    public function __construct(){
        $this->middleware(['employer','verified'], ['except'=> array('index','show','apply','allJobs')]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::latest()->limit(5)->where('status',1)->get();
        $companies = Company::latest()->limit(4)->get();
        return view('welcome',compact('jobs','companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobPostRequest $request)
    {
        $user_id = auth()->user()->id;
        $company = Company::where('user_id',$user_id)->first();
        $company_id = $company->id;
        $company_slug = $company->slug;
        Job::create([
            'user_id'=>$user_id,
            'company_id'=>$company_id,
            'title'=>request('title'),
            'slug'=>str_slug(request('title')),
            'description'=>request('description'),
            'roles'=>request('roles'),
            'category_id'=>request('category_id'),
            'position'=>request('position'),
            'address'=>request('address'),
            'type'=>request('type'),
            'status'=>request('status'),
            'last_date'=>request('last_date'),
        ]);
        return redirect()->back()->with('message','Job posted Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,Job $job)
    {
        $job = Job::find($id);
        return view('jobs.show',compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $job = Job::find($id);
       return view('jobs.edit',compact('job'));
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
        $job = Job::find($id);
        $job->update($request->all());
        return redirect()->back()->with('message','Job Successfully Updated !');
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

    public function apply($id)
    {
        $job = Job::find($id);

        $job->users()->attach(Auth::user()->id);



//         DB::table('job_user')->insert([
//     'user_id'      => Auth::user()->id,
//     'job_id'             => $id,
// ])->withTimeStamps();
        return redirect()->back()->with('message','Application Sent !');
    }

    public function applicant(){


        $applicants = Job::with('users')->where('user_id',auth()->user()->id)->get();


        // employeer

        //return $applicants;


        return view('jobs.applicants',compact('applicants'));

    }



    public function myapplications(){   
      
        // $applications = Job::has('users')->

        $user_id = auth()->user()->id;

        // $user_id = 23;

        $applications = Job::whereHas('users', function ($q) use ($user_id) {
            $q->where('user_id', $user_id);
        })->get();

        return view('jobs.myapplications',compact('applications'));
    }
    
    public function allJobs(){

        $keyword = request('title');
        $type = request('type');
        $category = request('category_id');
        $address = request('address');

        if($keyword||$type||$category||$address)
        {
            $jobs = Job::where('title','LIKE','%'.$keyword.'%')
            ->orwhere('type',$type)
            ->orwhere('category_id',$category)
            ->orwhere('address','Like','%'.$address.'%')
            ->paginate(10);

            
            return view('jobs.alljobs',compact('jobs'));
        }
        else{
        $jobs = Job::latest()->paginate(10);
        return view('jobs.alljobs',compact('jobs'));
    }
    }
}
