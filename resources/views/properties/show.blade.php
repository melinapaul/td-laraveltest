@extends('layout')

@section('content')

<div class="container"> 
  <h1>{{$property->property_name}}</h1>
  <a href="/properties/{{$property->id}}/tenant/create" class="btn btn-primary float-right">Add Tenant</a>
  <br>
  <br>
  <h4>
    <strong>Client : </strong>{{$property->client->organization_name}}<br>
    <strong>Address : </strong>{{$property->address}}, {{$property->city}}, {{$property->state}}, {{$property->zip}}<br>
  </h4>
  <hr>
  <h2>Tenants</h2>
  <table class="table"> 
  		<thead> 
  			<tr>
	  			<th>First Name</th>
	  			<th>Last Name</th>
	  			<th>Date of Birth</th>
          <th>Annual Income</th>
  			</tr>
  		</thead>
  		<tbody>
          @foreach ($property->tenants as $tenant)
          <tr>
            <td>{{ $tenant->first_name}}</td>
            <td>{{ $tenant->last_name }}</td>
            <td>{{ $tenant->birth_date }}</td>
            <td>{{ $tenant->annual_income }}</td>
          </tr>
          @endforeach
      </tbody>
  </table>
</div>
@endsection