<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\LazyCollection;

class FrontUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::disableQueryLog();

        LazyCollection::make(function () {
            $handle = fopen(public_path('Flower_Table.csv'), 'r');

            while (($line = fgetcsv($handle, 4096)) !== false) {
                yield $line;
            }

            fclose($handle);
        })
            ->skip(1)
            ->chunk(1000)
            ->each(function (LazyCollection $chunk) {
                $records = $chunk->map(function ($row) {
                    return [
                        'Flowers_Group' => $row[0],
                        'Flowers_Name' => $row[1],
                        'Containers' => $row[3],
                        'Flowers_Time' => $row[4],
                        'Miscellaneous' => $row[8],
                        'Plant_Habit' => $row[9],
                        'Sun_Requirements' => $row[13],
                        'Suitable_Locations' => $row[12],
                        'Minimum_cold_hardiness' => $row[24],
                    ];
                })->toArray();

                DB::table('frontuser')->insert($records);
            });
    }
}