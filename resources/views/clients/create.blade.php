@extends('layout')

@section('content')

<div class="container"> 
	<div class="row"> 
		<div class="col-lg-6">
			 <h1>Add Client</h1>
				  <form method='POST' action='/clients'>
				  	{{ csrf_field() }}
				  <div class="form-group">
				    <label>Client Organization Name</label>
				    <input type="text" class="form-control" name="organization_name" required minlength="3"> 
				  </div>
				  <div class="form-group">
				    <label>Client Phone Number</label>
				    <input type="number" class="form-control" name="phone_number" required minlength="10"> 
				  </div>
				  <div class="form-group">
				    <label>Client Contact Name</label>
				    <input type="text" class="form-control" name="contact_name" required minlength="3"> 
				  </div>
				  <div class="form-group">
				    <label>Client Contact Email</label>
				    <input type="email" class="form-control" name="contact_email" required minlength="5"> 
				  </div>
				  
				  <button type="submit" class="btn btn-primary">Submit</button>
				</form>
				<br>
				<hr>
				<h2>Or Upload CSV</h2>
				<form method='POST' action='/clients/csv' enctype="multipart/form-data">
				  	{{ csrf_field() }}
				  <div class="form-group">
				    <label>Select CSV</label>
				    <input type="file" class="form-control" name="csv_file" id="csv_file" accept=".csv"> 
				  </div>
				  <button type="submit" class="btn btn-primary">Submit</button>
				</form>
				<br>
				<br>
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
				@if(isset($csv_error))
				<div class="form-group">
					<div class="alert alert-danger">{{ $csv_error }}</div>
				</div>
				@endif
				<br>
				<br>
		</div>
	</div>	
 
</div>
@endsection