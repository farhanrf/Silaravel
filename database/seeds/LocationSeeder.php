<?php

use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $locations = [
         'ATD',
         'TBS'
      ];

      foreach ($locations as $location) {
         DB::table('locations')->insert([
             'name' => $location,
             'rak' => str_random(10)
         ]);
      }
    }
}
