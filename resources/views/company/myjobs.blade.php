@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-12">
            
            <table class="table">
            <thead>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                     <td></td>
                </tr>
            </thead>
            <tbody>
                @foreach($company->jobs as $job)
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
                    @if(Auth::user())
                    @if((Auth::user()->usertype == 'employer'))
                    @if((Auth::user()->company->id) == $job->company->id)
                    
                    @if($job->status == 1)
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-check" aria-hidden = "true"></i><br><b></b>Pulished</td>
                    @elseif($job->status == 0)
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-exclamation-triangle" aria-hidden = "true"></i><br></b>&nbsp;&nbsp;Draft</td>
                    @endif  
                    @endif 
                    @endif
                    @endif                 
                    <td>@if(!Auth::user())
                        <a href="{{route('jobs.show',[$job->id,$job->slug])}}"><button class= "btn btn-success btn-sm">Apply</button>
                            @elseif((Auth::user()->usertype == 'seeker'))
                            <a href="{{route('jobs.show',[$job->id,$job->slug])}}"><button class= "btn btn-success btn-sm">Apply</button></a>
                            @elseif((Auth::user()->company->id) == $job->company->id)
                            <div class="row">
                                <a href="{{route('jobs.edit',[$job->id])}}"><button class= "btn btn-success btn-sm">&nbsp;&nbsp;Edit&nbsp;&nbsp;</button></a><br><br>
                                <a href="{{route('jobs.show',[$job->id,$job->slug])}}"><button class= "btn btn-danger btn-sm">Delete</button>
                                </a>
                            </div>
                            @else
                            <a href="{{route('jobs.show',[$job->id,$job->slug])}}"><button class= "btn btn-success btn-sm">View</button>
                                @endif
                            </a></td>
                        </tr>
                        @endforeach
                    </tbody>
                    
                </table>
        </div>
    </div>
</div>
@endsection
