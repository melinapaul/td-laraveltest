@extends('layout')

@section('content')

<div class="container"> 
	<div class="row"> 
		<div class="col-lg-6">
			 <h1>Add Tenant to {{$property->property_name}}</h1>
				  <form method='POST' action='/properties/{{$property->id}}/tenant'>
				  	{{ csrf_field() }}
				  <div class="form-group">
				    <label>First Name</label>
				    <input type="text" class="form-control" name="first_name" required minlength="3"> 
				  </div>
				  <div class="form-group">
				    <label>Last Name</label>
				    <input type="text" class="form-control" name="last_name" required minlength="3"> 
				  </div>
				  <div class="form-group">
				    <label>Birth Date</label>
				    <input type="text" class="form-control" name="birth_date" required minlength="4"> 
				  </div>
				  <div class="form-group">
				    <label>Annual Income</label>
				    <input type="number" class="form-control" name="annual_income" required minlength="2"> 
				  </div>
				  <button type="submit" class="btn btn-primary">Submit</button>
				</form>
				<br>
				<hr>
				
				@if (count($errors))
					<div class="form-group">
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
									<li> {{ $error }} </li>
								@endforeach
							</ul>	
						</div>
					</div>
				@endif
				<br>
		</div>
	</div>	
 
</div>
@endsection