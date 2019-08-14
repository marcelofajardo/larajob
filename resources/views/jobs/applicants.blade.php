@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                @foreach($applicants as $applicant)
                <div class="card-header">
                    <p> Applicants For Job Title : <b>{{$applicant->title}}</b></p>
                </div>
                
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th >Name</th>
                                <th >Email</th>
                                <th >Phone number</th>
                                <th >Experience</th>
                                <th >Cover Letter</th>
                                <th >Resume</th>
                                <th >Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($applicant->users as $user)
                                <tr>
                                    <th>{{$user->name}}</th>
                                    <td>{{$user->email}}</td>
                                    <!-- //<td>{{$user->profile->address}}</td> -->
                                    <td>{{$user->profile->phone_number}}</td>
                                    <!-- <td>{{$user->profile->gender}}</td> -->
                                    <td>{{$user->profile->experience}}</td>
                                    <!-- <td>{{$user->profile->bio}}</td> -->
                                    <td>
                                        @if(!empty($user->profile->cover_letter))
                    <p><a href="/files/{{$user->profile->cover_letter}}" title="">Cover Letter</a></p>
                    @else
                    <p>No Cover Letter is Submitted</p>
                    @endif
                </td>
                                    <td>@if(!empty($user->profile->resume))
                    <p><a href="/files/{{$user->profile->resume}}" title="">Resume</a></p>
                    @else
                    <p>No Resume is Submitted</p>
                    @endif</td>
                                    <td><a href="{{route('applicant.details',[$user->id])}}"><button type="buttom" class="btn btn-success">View Details</button></a></td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>

                    
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection