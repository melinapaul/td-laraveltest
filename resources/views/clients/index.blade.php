@extends('layout')

@section('content')

<div class="container"> 
  <h1>Clients</h1>
  <a href="/clients/create" class="btn btn-primary float-right">Add Client</a>
  <br>
  <br>
  <table class="table"> 
  		<thead> 
  			<tr>
	  			<th>Client Organization Name</th>
	  			<th>Client Phone Number</th>
	  			<th>Client Contact Name</th>
	  			<th>Client Contact Email</th>
  			</tr>
  		</thead>
  		<tbody>
	  			@foreach ($clients as $client)
	  			<tr>
	  				<td>{{ $client->organization_name }}</td>
	  				<td>{{ $client->phone_number }}</td>
	  				<td>{{ $client->contact_name }}</td>
	  				<td>{{ $client->contact_email }}</td>
	  			</tr>
	  			@endforeach
  		</tbody>
  </table>
</div>
@endsection