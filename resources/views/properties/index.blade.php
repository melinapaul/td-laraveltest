@extends('layout')

@section('content')

<div class="container"> 
  <h1>Properties</h1>
  <a href="/properties/create" class="btn btn-primary float-right">Add Properties/Tenants</a>
  <br>
  <br>
  <table class="table"> 
  		<thead> 
  			<tr>
	  			<th>Client Name</th>
	  			<th>Property Name</th>
	  			<th>Details</th>
  			</tr>
  		</thead>
  		<tbody>
	  			@foreach ($properties as $property)
	  			<tr>
	  				<td>{{ $property->client->organization_name }}</td>
	  				<td>{{ $property->property_name }}</td>
	  				<td><a href="/properties/{{ $property->id }}">Details</a></td>
	  			</tr>
	  			@endforeach
  		</tbody>
  </table>
</div>
@endsection