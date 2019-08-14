@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-3">
            @if(empty(Auth::user()->profile->avatar))

            <img src="/images/profile/man.jpg" width = "100" style = "width:100%"alt="profile_image">

            @else
            <img src="/images/profile/{{auth()->user()->profile->avatar}}" width = "100" style = "width:100%"alt="profile_image">
            @endif
            <div class="card">
                <div class="card-header">
                    Change Profile Image
                </div>
                <div class="card-body">
                    <form action="{{route('avatar')}}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="form-control">
                    <input type="file" name="avatar">
                </div>
                    <br>
                    <button type="submit" class="btn btn-success float-right">Update</button>
                </form>
                @if($errors->has('avatar'))
                        <div class = "error" style="color:red">{{$errors->first('avatar')}}
                        </div>
                        @endif
                
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    Update Your Profile
                </div>
                <div class="card-body">
                    <form action="{{route('profile.create')}}" method="post">
                        @csrf
                        
                    
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" value ="{{ auth()->user()->profile->address}}" name="address" class="form-control">
                        @if($errors->has('address'))
                        <div class = "error" style="color:red">{{$errors->first('address')}}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" value ="{{ auth()->user()->profile->phone_number}}" name="phone_number" class="form-control">
                        @if($errors->has('phone_number'))
                        <div class = "error" style="color:red">{{$errors->first('phone_number')}}
                        </div>
                        @endif
                    </div>
                    
                    <div class="form-group">
                        <label>Experience</label>
                        <textarea name="experience" class="form-control">{{ auth()->user()->profile->experience}}</textarea>
                        @if($errors->has('experience'))
                        <div class = "error" style="color:red">{{$errors->first('experience')}}
                        </div>
                        @endif

                    </div>
                    
                    <div class="form-group">
                        <label>Bio</label>
                        <textarea name="bio" class="form-control">{{ auth()->user()->profile->bio}}</textarea>
                        @if($errors->has('bio'))
                        <div class = "error" style="color:red">{{$errors->first('bio')}}
                        </div>
                        @endif
                    </div>
                    
                    
                    <div class="form-group">                       
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                    
                </div>
            </div>
            @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
            @endif
        </div>
        </form>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Your Information
                </div>
                <div class="card-body">
                    <p><b>Name :</b>&nbsp; {{ auth()->user()->name}}</p>
                    <p><b>Email:</b>&nbsp; {{ auth()->user()->email}}</p>
                    <p><b>Address:</b>&nbsp; {{ auth()->user()->profile->address}}</p>
                    <p><b>Phone :</b>&nbsp; {{ auth()->user()->profile->phone_number}}</p>
                    <p><b>DOB:</b>&nbsp; {{ auth()->user()->profile->dob}}</p>
                    <p><b>Gender:</b>&nbsp; {{ auth()->user()->profile->gender}}</p>
                    <p><b>Experience:</b>&nbsp; {{ auth()->user()->profile->experience}}</p>
                    <p><b>Bio:</b>&nbsp; {{ auth()->user()->profile->bio}}</p>
                    <p><b>Member from :</b>&nbsp; {{date('F d Y',strtotime( auth()->user()->created_at))}}</p>
                    @if(!empty(auth()->user()->profile->cover_letter))
                    <p><a href="/files/{{auth()->user()->profile->cover_letter}}" title="">Cover Letter</a></p>
                    @else
                    <p>No Cover Letter is Submitted</p>
                    @endif
                    @if(!empty(auth()->user()->profile->resume))
                    <p><a href="/files/{{auth()->user()->profile->resume}}" title="">Resume</a></p>
                    @else
                    <p>No Resume is Submitted</p>
                    @endif

                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">
                    Update Cover Letter
                </div>
                <div class="card-body">
                    <form action="{{route('cover.letter')}}" method="post" enctype="multipart/form-data">
                        @csrf
                    
                    <div class="form-control">
                    <input type="file" name="cover_letter">
                </div>
                    <br>

                    <button type="submit" class="btn btn-success float-right" >Update</button>
                    </form>
                    @if($errors->has('cover_letter'))
                        <div class = "error" style="color:red">{{$errors->first('cover_letter')}}
                        </div>
                        @endif
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">
                    Update Resume
                </div>
                <div class="card-body">
                    <form action="{{route('resume')}}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="form-control">
                    <input type="file" name="resume">
                </div>

                    <br>

                    <button type="submit" class="btn btn-success float-right">Update</button>
                </form>
                @if($errors->has('resume'))
                        <div class = "error" style="color:red">{{$errors->first('resume')}}
                        </div>
                        @endif
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection