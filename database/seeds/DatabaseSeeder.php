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
        echo('asdaaaassss');
        // $this->call(UsersTableSeeder::class);



        // очистка таблицы активаций
        DB::table('roles')->truncate();
        DB::table('users')->truncate();
        DB::table('role_users')->truncate();

        // роль админа  // записать в таблицу   "roles"  эти поля
        $administratorRole = Sentinel::getRoleRepository()->create([
            'name' => 'Administrator',
            'slug' => 'administrator',
            'permissions' => [],
        ]);

        // роль менеджера  // записать в таблицу   "roles"  эти поля
        $managerRole = Sentinel::getRoleRepository()->create([
            'name' => 'Manager',
            'slug' => 'manager',
            'permissions' => [],
        ]);

        // роль агента  // записать в таблицу   "roles"  эти поля
        $agentRole = Sentinel::getRoleRepository()->create([
            'name' => 'Agent',
            'slug' => 'agent',
            'permissions' => [],
        ]);


        /** Админ */
        // создание пользователя    // записать в таблицу   "users"  эти поля
        $admin = Sentinel::getUserRepository()->create(array(
            'email' => 'admin@admin.com',
            'password' => 'admin',
            'first_name' => 'admin',
            'last_name' => 'admin'
        ));

        // генерация кода подтверждения
        $code = Activation::create($admin)->code;
        // подтверждение пользователя
        Activation::complete($admin, $code);
        // привязка пользователя $admin к роли $managerRole  ("role_users")
        $managerRole->users()->attach($admin);
        //$administratorRole->users()->attach($admin);
        // ищем в таблице 'role', поле 'slug' с именем 'administrator' и берем его 'id'
        $role = Sentinel::findRoleBySlug('administrator');
        $role->users()->attach($admin);
    }
}
