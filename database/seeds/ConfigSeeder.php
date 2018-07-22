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
        // insert Administrator
        $admin = ['id'=>1,'name'=>'Admin', 'email'=>'admin@admin.com', 'password'=>\Hash::make('admin123'),'role'=>1];
        DB::table('administrators')->truncate();
        DB::table('administrators')->insert($admin);

        // insert subjects
        $data = [
            ['id'=>1, 'name_eng' => 'common', 'name_vi' => 'Phổ Biến', 'user_id'=>1],
            ['id'=>2, 'name_eng' => 'specialized', 'name_vi' => 'Chuyên Ngành', 'user_id'=>1],
        ];
        DB::table('subject')->truncate();
        DB::table('subject')->insert($data);

    }
}
