<?php

use Illuminate\Database\Seeder;
use App\Client;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Client::create([
    		'organization_name' => 'Default Organization',
    		'phone_number' => '1231241244',
    		'contact_name' => 'Tom',
    		'contact_email' => 'tom@default.com'  		
		]);
    }
}
