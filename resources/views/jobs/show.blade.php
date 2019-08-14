@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-8">
            <div class="card">
                @if(Session::has('message'))
                <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>
                @endif
                <div class="card-header">{{$job->title}} </div>
                <div class="card-body">
                    <P><h3>Description</h3>{{$job->description}}</P>
                    <p><h3>Duties</h3> {{$job->roles}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">short info</div>
                <div class="card-body">
                    <p>Company: <a href= "{{route('company.index',[$job->company->id, $job->company->slug])}}">{{$job->company->name}}</a> </p>
                    <p>Working Address: {{$job->address}}</p>
                    <p>Employment Type: {{$job->type}}</p>
                    <p>Position: {{$job->position}}</p>
                    <p>Date: {{$job->created_at->diffForHumans()}}</p>
                    <p>Last date to apply: {{date('F d, Y', strtotime($job->last_date))}}</p>
                </div>
            </div>
            <br>
            @if(Auth::check()&&Auth::user()->usertype == 'seeker')
            @if($job->checkApplication($job->id))

            <button class="btn btn-success" style="width:100%">Application Submitted</button>
            @else
            <apply-component></apply-component>
            <form action="{{route('job.apply',[$job->id])}}" method = "post">
                @csrf
                <button class="btn btn-success" style="width:100%">Apply</button>
            </form>
            @endif
            @elseif(Auth::check()&&Auth::user()->usertype == 'employer')
            @if(Auth::user()->id == $job->user_id)
            <div class="">
                <div>
                    <a href="{{route('jobs.edit',[$job->id])}}"><button class= "btn btn-success" style="width:100%">Edit</button></a><br><br>
                </div>
                <div>
                    <a href="{{route('jobs.show',[$job->id,$job->slug])}}"><button class= "btn btn-danger" style="width:100%">Delete</button>
                    </a>
                </div>
            </div>
            @else
            <button class="btn btn-danger" style="width:100%"><h5>Employer can only view this job</h5></button>
            @endif
            @else
            <a href = "/login"><button class="btn btn-danger" style="width:100%"><h5>log in as job seeker to apply for the post</h5></button></a>
            @endif
        </div>
    </div>
</div>
@endsection