<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        // get timestamps ranging from 3 months ago to 3 months from now
        $startDate = Carbon::now()->subDays(100);
        $endDate   = Carbon::now()->addDays(100);
        
        //random cities
        $cities = array(
            "Brisbane",
            "Sydney",
            "Perth",
            "Melbourne",
            "Canberra"
        );
        
        //random training types
        $trainingTypes = array(
            "Accounting",
            "Finance",
            "Marketing",
            "HR"
        );
        
        // create 200 random records
        for($i = 0; $i < 200; $i++){
            // create timestamp ranging between the two timestamps created above
            $randomDate = Carbon::createFromTimestamp(rand($endDate->timestamp, $startDate->timestamp))->timestamp;
            
            $randomType = rand(0,3);
            
            //insert event with random info
            DB::table('events')->insert([
                'title' => $trainingTypes[$randomType]." Training",
                'date' => $randomDate,
                'image_url' => "https://everydayinterviewtips.com/wp-content/uploads/2015/05/82257074-cacaroot-marketing-boards.jpg",
                'available_seats' => rand(0,50),
                'location' => $cities[rand(0,4)]
            ]);
        }
        
    }
}
