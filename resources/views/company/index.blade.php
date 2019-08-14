@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="company-profile">
            
            
            <img src="/images/profile/{{$company->cover_photo}}" style = "width:100%"alt="profile_image">
           
            
            <div class="company-desc"><hr>
                <img src="/images/profile/{{$company->logo}}" width="100">
                <p>{{$company->description}}</p>
                <h1>{{$company->name}}</h1>
                <p><b>Slogan-</b>{{$company->slogan}}&nbsp;<b> Address-</b>{{$company->address}}-&nbsp; <b>Phone-</b>{{$company->phone}}-&nbsp; <b>Website-</b>{{$company->website}}</p>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                   
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>

                </tr>
            </thead>
            <tbody>
                @foreach($company->jobs as $job)
                @if($job->status == 1)
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
                    <td><i class="fa fa-map-marker" aria-hidden = "true"></i>&nbsp;</b> {{$job->address}}</td>            
                    <td><a href="{{route('jobs.show',[$job->id,$job->slug])}}"><button class= "btn btn-success btn-sm">Show Details</button>
                            
                            </a></td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                    
                </table>
            </div>
        </div>
        @endsection
        <style>
        .fa{color:#4183D7;}
        </style>