<?php

use Illuminate\Database\Seeder;

use App\Actor;
use App\Movie;
use App\Genre;
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
        // $this->call(UsersTableSeeder::class);
        
        $startDate = Carbon::now()->subDays(100);
        $endDate   = Carbon::now()->addDays(100);
        
        $cities = array(
            "Brisbane",
            "Sydney",
            "Perth"
        );
        
        $trainingTypes = array(
            "Accounting",
            "Finance",
            "Marketing",
            "HR"
        );
        
        for($i = 0; $i < 100; $i++){
            $randomDate = Carbon::createFromTimestamp(rand($endDate->timestamp, $startDate->timestamp))->timestamp;
            
            $randomType = rand(0,3);
            
            DB::table('events')->insert([
                'title' => $trainingTypes[$randomType]." Training",
                'date' => $randomDate,
                'image_url' => "https://everydayinterviewtips.com/wp-content/uploads/2015/05/82257074-cacaroot-marketing-boards.jpg",
                'available_seats' => rand(0,50),
                'location' => $cities[rand(0,2)]
            ]);
        }
        
    }
}
