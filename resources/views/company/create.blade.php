@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-3">
            @if(empty(Auth::user()->company->logo))
            <img src="/images/profile/man.jpg" width = "100" style = "width:100%"alt="profile_image">
            @else
            <img src="/images/profile/{{auth()->user()->company->logo}}" width = "100" style = "width:100%"alt="profile_image">
            @endif
            <div class="card">
                <div class="card-header">
                    Change Company Logo
                </div>
                <div class="card-body">
                    <form action="{{route('logo')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-control">
                            <input type="file" name="logo">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-success float-right">Update</button>
                    </form>
                    @if($errors->has('logo'))
                    <div class = "error" style="color:red">{{$errors->first('logo')}}
                    </div>
                    @endif
                    
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    Update Your Company Information
                </div>
                <div class="card-body">
                    <form action="{{route('company.create')}}" method="post">
                        @csrf
                        
                        
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" value ="{{ auth()->user()->company->address}}" name="address" class="form-control">
                            @if($errors->has('address'))
                            <div class = "error" style="color:red">{{$errors->first('address')}}
                            </div>
                            @endif
                        </div>
                        
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" value ="{{ auth()->user()->company->phone}}" name="phone" class="form-control">
                            @if($errors->has('phone'))
                            <div class = "error" style="color:red">{{$errors->first('phone')}}
                            </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Website</label>
                            <input type="text" value ="{{ auth()->user()->company->website}}" name="website" class="form-control">
                            @if($errors->has('website'))
                            <div class = "error" style="color:red">{{$errors->first('website')}}
                            </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Slogan</label>
                            <input type="text" value ="{{ auth()->user()->company->slogan}}" name="slogan" class="form-control">
                            @if($errors->has('slogan'))
                            <div class = "error" style="color:red">{{$errors->first('slogan')}}
                            </div>
                            @endif
                        </div>
                        
                        
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control">{{ auth()->user()->company->description}}</textarea>
                            @if($errors->has('description'))
                            <div class = "error" style="color:red">{{$errors->first('description')}}
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
                    Your Company's Information
                </div>
                <div class="card-body">
                    <p><b>Company Name :</b>&nbsp;{{Auth::user()->company->name}}</p>
                    <p><b>Address :</b>&nbsp;{{Auth::user()->company->address}}</p>
                    <p><b>Phone :</b>&nbsp;{{Auth::user()->company->phone}}</p>
                    <p><b>Email :</b>&nbsp;{{Auth::user()->email}}</p>
                    <p><b>Website :</b>&nbsp;{{Auth::user()->company->website}}</p>
                    <p><b>Slogan :</b>&nbsp;{{Auth::user()->company->slogan}}</p>
                    <p><b>Description :</b>&nbsp;{{Auth::user()->company->description}}</p>


                </div>
            </div>
            @if(empty(Auth::user()->company->cover_photo))
            <img src="/images/profile/cover.jpg" width = "100" style = "width:100%"alt="profile_image">
            @else
            <img src="/images/profile/{{auth()->user()->company->cover_photo}}" width = "100" style = "width:100%"alt="profile_image">
            @endif
            <div class="card">
                <div class="card-header">
                    Update Cover Photo
                </div>
                <div class="card-body">
                    <form action="{{route('cover.photo')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-control">
                            <input type="file" name="cover_photo">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-success float-right" >Update</button>
                    </form>
                    @if($errors->has('cover_photo'))
                    <div class = "error" style="color:red">{{$errors->first('cover_photo')}}
                    </div>
                    @endif
                </div>
            </div>
            
        </div>
    </div>
</div>
    @endsection