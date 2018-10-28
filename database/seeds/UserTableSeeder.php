<?php
namespace Zymawy\Ironside\Seeds;
use App\User;
use Zymawy\Ironside\Commands\InstallCommand;
use Carbon\Carbon;
use Zymawy\Ironside\Models\Role;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    public function run(Faker\Generator $faker = null)
    {
        User::truncate();
        \DB::delete('TRUNCATE role_user');

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

        //-------------------------------------------------
        // NOTE: WHEN you change the user credentials.
        // Update InstallCommand.php
        //-------------------------------------------------

        $this->addAllRolesToUser($user);

        // dummy users
        /*for ($i = 0; $i < 5; $i++) {
            $user = User::create([
                'firstname'    => $faker->firstName,
                'lastname'     => $faker->lastName,
                'cellphone'    => $faker->phoneNumber,
                'email'        => $faker->email,
                'gender'       => $faker->randomElement(['male', 'female']),
                'password'     => bcrypt('secret'),
                'confirmed_at' => Carbon::now()
            ]);

            $user->syncRoles([
                \App\Models\Role::$WEBSITE,
            ]);
        }*/
    }

    /**
     * Add all the roles to the user
     * @param $user
     */
    private function addAllRolesToUser($user)
    {
        // only 2 - to 5 are needed
        $roles = Role::whereBetween('id', [2, 5])
            ->pluck('keyword', 'id')
            ->values();

        $user->syncRoles($roles);
    }
}
