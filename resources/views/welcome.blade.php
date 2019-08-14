@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row ">
        <h2>Recent Jobs</h2>
        <hr>
        <table class="table">
            <thead>
                <tr>
                </tr>
            </thead>
            <tbody>
                @foreach($jobs as $job)
                <tr>
                    <td><img src = "/images/profile/{{$job->company->logo}}" width = "80" alt=""></td>
                    <td>
                        <i class = "fa fa-building" aria-hidden = "true"></i>&nbsp;{{$job->company->name}}<br>
                        <i class = "fa fa-arrow-circle-up" aria-hidden = "true"></i>&nbsp;{{$job->position}}<br>
                    <i class="fa fa-clock-o" aria-hidden = "true"></i>&nbsp; {{$job->type}}</td>
                    
                    <td>
                        <i class="fa fa-globe" aria-hidden = "true"></i>&nbsp;<b> &nbsp;</b>{{date('F d Y',strtotime($job->last_date))}}<br>
                        <i class="fa fa-money" aria-hidden = "true"></i>&nbsp;<b> &nbsp;</b>o_sallary
                    </td>
                    <td><i class="fa fa-map-marker" aria-hidden = "true"></i>&nbsp; <b></b> {{$job->address}}</td>
                    
                    <td style="width: 190px;">
                        <a href="{{route('jobs.show',[$job->id,$job->slug])}}"><button class= "btn btn-success btn-sm">Show Details</button></a>
                </tr>
                
                @endforeach
            </tbody>
        </table><a href="{{route('jobs.all')}}" title="">
        <button type="" class="btn btn-success" style="width:100%">Brose all jobs </button>  </a>  
</div><br><br>
<h3>Featured Companies</h3>
</div>
<div class="container">

<div class="row">
    
    @foreach($companies as $company)
    <div class=" col-md-3">
        <div class="card" style="width: 18rem;">
            
                <img src="/images/profile/{{$company->logo}}" style = "width:100%"alt="profile_image">
           
            <div class="card-body">
                <h5 class="card-title">{{$company->name}}</h5>
                <p class="card-text">{{str_limit($company->description,20)}}</p>
                <a href="{{route('company.index',[$company->id,$company->slug])}}" class="btn btn-outline-primary">Visit Company</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
</div>
@endsection
<style>
.fa{color:#4183D7;}
</style>