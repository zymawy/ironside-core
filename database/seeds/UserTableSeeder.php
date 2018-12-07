<?php
namespace Zymawy\Ironside\Seeds;
use App\User;
use Zymawy\Ironside\Commands\InstallCommand;
use Carbon\Carbon;
use App\Role;
use Illuminate\Database\Seeder;
use DB;
class UserTableSeeder extends Seeder
{
    public function run(Faker\Generator $faker = null)
    {
      DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::truncate();
      DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        //-------------------------------------------------
        // Default Dashboard
        //-------------------------------------------------
        $user = User::create([
            'firstname'    => 'Laravel',
            'lastname'     => 'Dashboard',
            'cellphone'    => '123456789',
            'email'        => 'admin@laravel.local',
            'gender'       => 'ninja',
            'password'     => bcrypt('admin'),
            'confirmed_at' => Carbon::now()
        ]);
    }
}
