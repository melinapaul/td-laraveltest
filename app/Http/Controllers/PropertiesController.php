<?php

namespace App\Http\Controllers;

use League\Csv\Reader;
use League\Csv\Statement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Property;
use App\Client;
use App\Tenant;

class PropertiesController extends Controller
{
    public function index()
    {
    	$properties = Property::all();

    	return view('properties.index', compact('properties'));
    }

    public function create()
    {
    	$clients = Client::all();
    	return view('properties.create', compact('clients'));
    }

    public function store()
    {
    	$this->validate(request(), [
    		'property_name' => 'required|min:3',
    		'address' => 'required|min:3',
    		'city' => 'required|min:3',
    		'state' => 'required|min:2',
    		'zip' => 'required|min:5|max:5'
    	]);

    	Property::create([
    		'property_name' => request('property_name'),
    		'address' => request('address'),
    		'city' => request('city'),
    		'state' => request('state'),  
    		'zip' => request('zip'),
    		'client_id' => request('client_id')    		
		]);

		return redirect('/properties');
    }

    public function show(Property $property)
    {
    	return view('properties.show', compact('property'));
    }

    public function createTenant(Property $property)
    {
    	return view('properties.create_tenant', compact('property'));
    }

    public function storeTenant(Property $property)
    {
    	$this->validate(request(), [
    		'first_name' => 'required|min:3',
    		'last_name' => 'required|min:3',
    		'birth_date' => 'required|min:4',
    		'annual_income' => 'required|numeric|min:2'
    	]);

    	Tenant::create([
    		'first_name' => request('first_name'),
    		'last_name' => request('last_name'),
    		'birth_date' => request('birth_date'),
    		'annual_income' => request('annual_income'),  
    		'property_id' => $property->id   		
		]);

		return redirect('/properties/'.$property->id);
    }
}
