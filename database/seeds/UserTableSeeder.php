<?php
namespace Zymawy\Ironside\Seeds;
use App\User;
use Zymawy\Ironside\Commands\InstallCommand;
use Carbon\Carbon;
use App\Role;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    public function run(Faker\Generator $faker = null)
    {

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
