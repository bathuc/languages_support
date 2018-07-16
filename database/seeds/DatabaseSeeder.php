<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $tables = [
            'ConfigSeeder',
            'HiraganaSeeder',
            'KatakanaSeeder',
            'TensesSeeder',
        ];
        foreach ($tables as $item) {
            $this->call($item);
        }
    }
}
