<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\State;
class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states = [
            ['state_name' => 'ANDAMAN AND NICOBAR ISLANDS','state_abb' => 'AN'],
['state_name' => 'ANDHRA PRADESH','state_abb' => 'AP'],
['state_name' => 'ARUNACHAL PRADESH','state_abb' => 'AR'],
['state_name' => 'ASSAM','state_abb' => 'AS'],
['state_name' => 'BIHAR','state_abb' => 'BR'],
['state_name' => 'CHANDIGARH','state_abb' => 'CH'],
['state_name' => 'CHHATTISGARH','state_abb' => 'CG'],
['state_name' => 'DELHI','state_abb' => 'DL'],
['state_name' => 'GOA','state_abb' => 'GA'],
['state_name' => 'GUJARAT','state_abb' => 'GJ'],
['state_name' => 'HARYANA','state_abb' => 'HR'],
['state_name' => 'HIMACHAL PRADESH','state_abb' => 'HP'],
['state_name' => 'JAMMU AND KASHMIR','state_abb' => 'JK'],
['state_name' => 'JHARKHAND','state_abb' => 'JH'],
['state_name' => 'KARNATAKA','state_abb' => 'KA'],
['state_name' => 'KERALA','state_abb' => 'KL'],
['state_name' => 'LADAKH','state_abb' => 'LD'],
['state_name' => 'LAKSHADWEEP','state_abb' => 'LA'],
['state_name' => 'MADHYA PRADESH','state_abb' => 'MP'],
['state_name' => 'MAHARASHTRA','state_abb' => 'MH'],
['state_name' => 'MANIPUR','state_abb' => 'MN'],
['state_name' => 'MEGHALAYA','state_abb' => 'ML'],
['state_name' => 'MIZORAM','state_abb' => 'MZ'],
['state_name' => 'NAGALAND','state_abb' => 'NL'],
['state_name' => 'ODISHA','state_abb' => 'OR'],
['state_name' => 'PUDUCHERRY','state_abb' => 'PY'],
['state_name' => 'PUNJAB','state_abb' => 'PB'],
['state_name' => 'RAJASTHAN','state_abb' => 'RJ'],
['state_name' => 'SIKKIM','state_abb' => 'SK'],
['state_name' => 'TAMIL NADU','state_abb' => 'TN'],
['state_name' => 'TELANGANA','state_abb' => 'TS'],
['state_name' => 'THE DADRA AND NAGAR HAVELI AND DAMAN AND DIU','state_abb' => 'DHDD'],
['state_name' => 'TRIPURA','state_abb' => 'TR'],
['state_name' => 'UTTAR PRADESH','state_abb' => 'UP'],
['state_name' => 'UTTARAKHAND','state_abb' => 'UK'],
['state_name' => 'WEST BENGAL','state_abb' => 'WB']
        ];
    
        foreach ($states as $key => $state) {
            State::create($state);
        }
    }
}
