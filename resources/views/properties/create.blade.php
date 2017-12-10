@extends('layout')

@section('content')

<div class="container"> 
	<div class="row"> 
		<div class="col-lg-6">
			 <h1>Add Properties</h1>
				  <form method='POST' action='/properties'>
				  	{{ csrf_field() }}
				  <div class="form-group">
				    <label>Property Name</label>
				    <input type="text" class="form-control" name="property_name" required minlength="3"> 
				  </div>
				  <div class="form-group">
				    <label>Property Address</label>
				    <input type="text" class="form-control" name="address" required minlength="3"> 
				  </div>
				  <div class="form-group">
				    <label>Property City</label>
				    <input type="text" class="form-control" name="city" required minlength="3"> 
				  </div>
				  <div class="form-group">
				    <label>Property State</label>
				    <input type="text" class="form-control" name="state" required minlength="2"> 
				  </div>
				  <div class="form-group">
				    <label>Property Zip</label>
				    <input type="number" class="form-control" name="zip" required minlength="5" maxlength="5"> 
				  </div>
				  <div class="form-group">
				    <label>Client</label>
				    <select class="form-control" id="client" name="client_id">
				    	@foreach ($clients as $client)
				      		<option value="{{ $client->id }}">{{ $client->organization_name }}</option>
				      	@endforeach

				    </select>
				  </div>
				  <button type="submit" class="btn btn-primary">Submit</button>
				</form>
				<br>
				<hr>
				
				<br>
				<br>
		</div>
		<div class="col-lg-6">
			<h2>Or Upload CSV</h2>
			<small>Header should be 'address,city,state,zip,property_name,first_name,last_name,birth_date,annual_income'</small>
				<form method='POST' action='/properties/csv' enctype="multipart/form-data">
				  	{{ csrf_field() }}
				  <div class="form-group">
				    <label>Client</label>
				    <select class="form-control" id="client" name="client_id">
				    	@foreach ($clients as $client)
				      		<option value="{{ $client->id }}">{{ $client->organization_name }}</option>
				      	@endforeach

				    </select>
				  </div>
				  <div class="form-group">
				    <label>Select CSV</label>
				    <input type="file" class="form-control" name="csv_file" id="csv_file" accept=".csv"> 
				  </div>
				  <button type="submit" class="btn btn-primary">Upload</button>
				  <a href="/properties.csv" class="float-right">Download Sample CSV</a>
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
				@if($csv_error)
				<div class="form-group">
					<div class="alert alert-danger">{{ $csv_error }}</div>
				</div>
				@endif
		</div>
	</div>	
 
</div>
@endsection