<?php
namespace Database\Seeds;
use App\User;
use Zymawy\Ironside\Commands\InstallCommand;
use Carbon\Carbon;
use App\Role;
use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Schema;
class UserTableSeeder extends Seeder
{
    public function run(Faker\Generator $faker = null)
    {
      DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::truncate();
      DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $this->truncateLaratrustTables();

        $config = config('laratrust_seeder.role_structure');
        $userPermission = config('laratrust_seeder.permission_structure');
        $mapPermission = collect(config('laratrust_seeder.permissions_map'));

        foreach ($config as $key => $modules)  {

            // Create a new role
            $role = Role::create([
                'name' => $key,
                'display_name' => ucwords(str_replace('_', ' ', $key)),
                'description' => ucwords(str_replace('_', ' ', $key)),
                'icon' => $modules['icon'],
                'slug' => $modules['slug'],
                'keyword' =>$modules['keyword'],
            ]);
            $permissions = [];

//            $this->command->info('Creating Role '. strtoupper($key));

            // Reading role permission modules
            foreach ($modules as $module => $value) {

                foreach (explode(',', $value) as $p => $perm) {

                    $permissionValue = $mapPermission->get($perm);

                    $permissions[] = \App\Permission::firstOrCreate([
                        'name' => $permissionValue . '-' . $module,
                        'display_name' => ucfirst($permissionValue) . ' ' . ucfirst($module),
                        'description' => ucfirst($permissionValue) . ' ' . ucfirst($module),
                    ])->id;

//                    $this->command->info('Creating Permission to '.$permissionValue.' for '. $module);
                }
            }

            // Attach all permissions to the role
            $role->permissions()->sync($permissions);

//            $this->command->info("Creating '{$key}' user");

            // Create default user for each role
            $user = User::create([
                'firstname' => ucwords(str_replace('_', ' ', $key)),
                'lastname' => ucwords(str_replace('_', ' ', $key)),
                'email' => $key.'@ironside.com',
                'password' => bcrypt('mallam'),
                'confirmed_at' => Carbon::now(),
                'cellphone'    => '123456789',
                'telephone'    => '123456789',
                'gender'       => 'nigga',
                'born_at'       => '1995-10-06',
                'image'       => '/uploads/images/default.png',
            ]);

            $user->attachRole($role);
        }

        // Creating user with permissions
        if (!empty($userPermission)) {

            foreach ($userPermission as $key => $modules) {

                foreach ($modules as $module => $value) {

                    // Create default user for each permission set
                    $user = User::create([
                        'firstname' => ucwords(str_replace('_', ' ', $key)),
                        'lastname' => ucwords(str_replace('_', ' ', $key)),
                        'email' => $key.'@ironside.test',
                        'password' => bcrypt('mallam'),
                        'remember_token' => str_random(10),
                        'confirmed_at' => Carbon::now(),
                        'cellphone'    => '123456789',
                        'telephone'    => '123456789',
                        'gender'       => 'nigga',
                        'image'       => '/uploads/images/default.png',
                        'born_at'       => '1995-10-06',
                    ]);
                    $permissions = [];

                    foreach (explode(',', $value) as $p => $perm) {

                        $permissionValue = $mapPermission->get($perm);

                        $permissions[] = \App\Permission::firstOrCreate([
                            'name' => $permissionValue . '-' . $module,
                            'display_name' => ucfirst($permissionValue) . ' ' . ucfirst($module),
                            'description' => ucfirst($permissionValue) . ' ' . ucfirst($module),
                        ])->id;

//                        $this->command->info('Creating Permission to '.$permissionValue.' for '. $module);
                    }
                }

                // Attach all permissions to the user
                $user->permissions()->sync($permissions);
            }
        }
    }

    /**
     * Truncates all the laratrust tables and the users table
     *
     * @return    void
     */
    public function truncateLaratrustTables()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('permission_role')->truncate();
        DB::table('permission_user')->truncate();
        DB::table('role_user')->truncate();
        User::truncate();
        \App\Role::truncate();
        \App\Permission::truncate();
        Schema::enableForeignKeyConstraints();
    }
}
