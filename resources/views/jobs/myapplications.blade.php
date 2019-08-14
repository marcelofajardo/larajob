@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
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
                @foreach($applications as $job)
    
                
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
                        @endforeach
                       
                    </tbody>
                    
                </table>
            </div>
        </div>
        @endsection
        <style>
        .fa{color:#4183D7;}
        </style>