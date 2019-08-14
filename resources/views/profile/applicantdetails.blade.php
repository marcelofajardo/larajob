@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row ">  
        
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Applicant's Information
                </div>
                <div class="card-body">
                    <img src="/images/profile/{{$users->profile->avatar}}" width = "100" style = "width:100%"alt="profile_image">
                    <p><b>Name :</b>&nbsp; {{$users->name}}</p>
                    <p><b>Email:</b>&nbsp; {{ $users->email}}</p>
                    <p><b>Address:</b>&nbsp; {{ $users->profile->address}}</p>
                    <p><b>Phone :</b>&nbsp; {{ $users->profile->phone_number}}</p>
                    <p><b>DOB:</b>&nbsp; {{ $users->profile->dob}}</p>
                    <p><b>Gender:</b>&nbsp; {{ $users->profile->gender}}</p>
                    <p><b>Experience:</b>&nbsp; {{ $users->profile->experience}}</p>
                    <p><b>Bio:</b>&nbsp; {{ $users->profile->bio}}</p>
                    <p><b>Member from :</b>&nbsp; {{date('F d Y',strtotime( $users->created_at))}}</p>
                    @if(!empty($users->profile->cover_letter))
                    <p><a href="/files/{{$users->profile->cover_letter}}" title="">Cover Letter</a></p>
                    @else
                    <p>No Cover Letter is Submitted</p>
                    @endif
                    @if(!empty($users->profile->resume))
                    <p><a href="/files/{{$users->profile->resume}}" title="">Resume</a></p>
                    @else
                    <p>No Resume is Submitted</p>
                    @endif

                </div>
            </div>
            <br>
        </div>
        
    </div>
</div>
@endsection