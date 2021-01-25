<?php

namespace Database\Seeders;

use App\Models\Customers;
use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customers::create([
            'id' => 1,
            'firstname' => 'Customer Name',
            'surname' => 'Customer surname',
            'address' => '100 Test avenue',
            'postalcode' => 'K1G0K7',
            'phone' => '6138889999',
            'email' => 'cust@email.com'
        ]);
    }
}
