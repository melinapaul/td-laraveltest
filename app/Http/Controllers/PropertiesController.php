<?php

namespace App\Http\Controllers;

use League\Csv\Reader;
use League\Csv\Statement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Property;

class PropertiesController extends Controller
{
    public function index()
    {
    	$properties = Property::all();

    	return view('properties.index', compact('properties'));
    }

    public function create()
    {
    	return view('properties.create');
    }
}
