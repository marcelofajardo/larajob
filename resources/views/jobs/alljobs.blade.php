@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row ">
        <form action="{{route('jobs.all')}}" method="GET">
        <div class="form-inline">
            <div class="form-group">
                <label>Keyword &nbsp; </label>
                 <input type = "text" name = "title" class = "form-control">&nbsp;&nbsp;&nbsp;
                
            </div>
            <div class="form-group">
                <label>Category &nbsp; </label>
                 <select name="category_id" class="form-control @error('category_id') is-invalid @enderror" value="{{ old('category_id') }}">
                    <option value="">-Select-</option>
                                @foreach(App\category::all() as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach
                            </select>
                            &nbsp;&nbsp;&nbsp;
            </div>
            <div class="form-group">
                <label>Type &nbsp; </label>
                 <select name="type" class="form-control @error('type') is-invalid @enderror" value="{{ old('type') }}">
                    <option value="">-Select-</option>
                                <option value="Fulltime">Fulltime</option>
                                <option value="Parttime">Parttime</option>
                                <option value="Casual">Casual</option>
                            </select>
                            &nbsp;&nbsp;&nbsp;
            </div>
            <div class="form-group">
                <label>Address &nbsp; </label>
                 <input type = "text" name = "address" class = "form-control">&nbsp;&nbsp;&nbsp;                
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-outline-success">Search</button>                
            </div>
            
        </div>
    </form>


        
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
                        
                    </a></td>
                </tr>
                
                @endforeach
            </tbody>
        </table>
        {{$jobs->appends(Illuminate\Support\Facades\Input::except('page'))->links()}}
    </div>
</div>
@endsection
<style>
.fa{color:#4183D7;}
</style>