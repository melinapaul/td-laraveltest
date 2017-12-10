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

    public function storecsv(Request $request)
    {
        $file=Input::file('csv_file');
        $client_id=Input::get('client_id');
        $csv = Reader::createFromString($file->openFile()->fread($file->getSize()))->setHeaderOffset(0);

        $header = $csv->getHeader();

        if(count($header) !=9 || $header[0] != 'address' || $header[1] != 'city' || $header[2] != 'state' || $header[3] != 'zip' || $header[4] != 'property_name' || $header[5] != 'first_name' || $header[6] != 'last_name' || $header[7] != 'birth_date' || $header[8] != 'annual_income' ){
            $csv_error = "First line must be address,city,state,zip,property_name,first_name,last_name,birth_date,annual_income";
            return redirect('/properties/create')->with('csv_error', $csv_error);
        }
        $records = (new Statement())->process($csv);
        foreach ($records->getRecords() as $record) {
            $property = Property::where([
                            ['property_name', '=', $record['property_name']],
                            ['address', '=', $record['address']],
                            ['city', '=', $record['city']],
                            ['state', '=', $record['state']],
                            ['zip', '=', $record['zip']]
                        ])->first();
            if(!$property) {
                $property = new Property;
                $property->property_name = $record['property_name'];
                $property->address = $record['address'];
                $property->city = $record['city'];
                $property->state = $record['state'];
                $property->zip = $record['zip'];
                $property->client_id = $client_id;
                $property->save();
            }
            Tenant::create([
                'first_name' => $record['first_name'],
                'last_name' => $record['last_name'],
                'birth_date' => $record['birth_date'],
                'annual_income' => $record['annual_income'],
                'property_id' => $property->id         
            ]);
        }
        return redirect('/properties');
    }
}
