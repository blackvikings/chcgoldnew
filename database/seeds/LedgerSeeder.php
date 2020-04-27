<?php

use Illuminate\Database\Seeder;
use App\Ledger;
class LedgerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ledger::insert([
           'financialyear' => '2019-2020',
           'openingcoinweight' => '80.550',
           'cointype' => '100',
           'openingdate' => date('Y-m-d'),
        ]);
        Ledger::insert([
           'financialyear' => '2019-2020',
           'openingcoinweight' => '4',
           'cointype' => '99.5',
           'openingdate' => date('Y-m-d'),
        ]);
    }
}
