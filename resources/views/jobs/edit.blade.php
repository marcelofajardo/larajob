@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">
					Create a Job
				</div>
				<div class="card-body">
					@if(Session::has('message'))
					<div class="alert alert-success">
						{{Session::get('message')}}
					</div>
					@endif
					<form method="post" action="{{route('jobs.update',[$job->id])}}">
						@csrf
						<div class="form-group">
							<label for = "title">Title:</label>
							<input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{$job->title}}">
							@error('title')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
						<div class="form-group">
							<label for="title" >Description:</label>
							<textarea  id="summary-ckeditor" name="description" class="form-control @error('description') is-invalid @enderror">{{ $job->description}}</textarea>
							@error('description')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
						<div class="form-group">
							<label for="roles" >Roles:</label>
							<textarea  id="summary-ckeditor" name="roles" class="form-control @error('roles') is-invalid @enderror" value="">{{$job->roles}}</textarea>
							@error('roles')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
						<div class="form-group">
							<label for="category" >Category:</label>
							<select name="category_id" class="form-control @error('category_id') is-invalid @enderror" value="{{$job->category_id }}">
								@foreach(App\category::all() as $cat)
								<option value="{{$cat->id}}" {{$cat->id==$job->category_id?'selected':''}}>{{$cat->name}}</option>
								@endforeach
							</select>
							@error('category_id')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
						<div class="form-group">
							<label for = "title">Position:</label>
							<input type="text" name="position" class="form-control @error('position') is-invalid @enderror" value="{{$job->position }}">
							@error('position')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
						<div class="form-group">
							<label for = "title">Address:</label>
							<input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{$job->address}}">
							@error('address')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
						<div class="form-group">
							<label for="title" >Type:</label>
							<select name="type" class="form-control @error('type') is-invalid @enderror" value="{{$job->type}}">
								<option value="Fulltime"{{$job->type=='Fulltime'?'selected':''}}>Fulltime</option>
								<option value="Parttime"{{$job->type=='Parttime'?'selected':''}}>Parttime</option>
								<option value="Casual"{{$job->type=='Casual'?'selected':''}}>Casual</option>
							</select>
							@error('type')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
						<div class="form-group">
							<label for="title" >Status:</label>
							<select name="status" class="form-control @error('status') is-invalid @enderror" value="{{$job->status}}">
								<option value="1"{{$job->status==1?'selected':''}}>Live</option>
								<option value="0"{{$job->status==0?'selected':''}}>Draft</option>
							</select>
							@error('status')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
						<div class="form-group">
							<label for = "title">Last Date:</label>
							<input type="text" id="datepicker" name="last_date" class="form-control @error('last_date') is-invalid @enderror" value="{{$job->last_date}}">
							@error('last_date')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
						<div class="form-group">
							
							<button type="submit" class="btn btn-success">Submit</button>
						</div>
					</form>					
				</div>
			</div>
			
		</div>
	</div>
</div>
@endsection