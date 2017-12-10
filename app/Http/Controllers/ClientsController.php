<?php

namespace App\Http\Controllers;

use League\Csv\Reader;
use League\Csv\Statement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Client;

class ClientsController extends Controller
{
    public function index()
    {
    	$clients = Client::all();

    	return view('clients.index', compact('clients'));
    }

    public function create()
    {
    	return view('clients.create');
    }

    public function store(Request $request)
    {
    	$this->validate(request(), [
    		'organization_name' => 'required|min:3',
    		'phone_number' => 'required|min:10|numeric',
    		'contact_name' => 'required|min:3',
    		'contact_email' => 'required|email'
    	]);

    	Client::create([
    		'organization_name' => request('organization_name'),
    		'phone_number' => request('phone_number'),
    		'contact_name' => request('contact_name'),
    		'contact_email' => request('contact_email')   		
		]);

		return redirect('/clients');
    }

    public function storecsv(Request $request)
    {
		$file=Input::file('csv_file');
		$csv = Reader::createFromString($file->openFile()->fread($file->getSize()))->setHeaderOffset(0);

		$header = $csv->getHeader();
		if(count($header) !=4 || $header[0] != 'organization_name' || $header[1] != 'phone_number' || $header[2] != 'contact_name' || $header[3] != 'contact_email' ){
			$csv_error = "First line must be organization_name,phone_number,contact_name,contact_email";
			return redirect('/clients/create')->with('csv_error', $csv_error);
		}
		$records = (new Statement())->process($csv);
		foreach ($records->getRecords() as $record) {
		    Client::create([
	    		'organization_name' => $record['organization_name'],
	    		'phone_number' => $record['phone_number'],
	    		'contact_name' => $record['contact_name'],
	    		'contact_email' => $record['contact_email']   		
			]);
		}
		return redirect('/clients');
    }
}
