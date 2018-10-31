# Ironside


## How To Install 
 - First Install [Laratrust]('https://github.com/santigarcor/laratrust') We Relay On It To Manage [ACl]('https://www.wikiwand.com/en/Access_control_list').
 - export the `php artisan vendor:publish --tag="laratrust"` config file of the [Laratrust]('https://github.com/santigarcor/laratrust') and change it to [laratrust_seeder]('https://github.com/zymawy/ironside-core/stubs/laratrust.stub') and modify [LaratrustSeeder]('https://github.com/zymawy/ironside-core/stubs/LaratrustSeeder.stub').
 - Do Only `php artisan laratrust:seeder` Since We Have laratrust migration And We Modify It To Fit Our Needs.
 - And in the `database/seeds/DatabaseSeeder.php` file you have to add this to the run method: 
 `$this->call(LaratrustSeeder::class);`
  - and `php artisan db:seed`
 - Than `php artisan ironside:db:seed` To Fill Out The Database.
 
