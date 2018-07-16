<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // insert subjects
        $data = [
            ['id'=>1, 'name_eng' => 'common', 'name_vi' => 'Phổ Biến'],
            ['id'=>2, 'name_eng' => 'specialized', 'name_vi' => 'Chuyên Ngành'],
        ];
        DB::table('subject')->truncate();
        DB::table('subject')->insert($data);

        // insert Administrator
        $user = ['name'=>'admin', 'email'=>'admin@admin.com', 'password'=>\Hash::make('admin123'),'role'=>1];
        DB::table('administrators')->insert($user);
    }
}
