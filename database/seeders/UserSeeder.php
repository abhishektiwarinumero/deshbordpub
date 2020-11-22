<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
	private $roles = [
		'Moderator' => 5,
		'Booster' => 100,
		'Member' => 500,
	];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$this->seedAdmin();
		foreach ($this->roles as $role => $many) {
			$this->seedUsers($role, $many);
		}
        User::factory(10)->create();
		$member = User::factory()->create(['email' => 'user@kingboosting.com']);
		$member->assignRole('Member');
    }

    public function seedAdmin(): void
	{
		User::create([
			'username' => 'Admin',
			'first_name' => 'King',
			'last_name' => 'Boosting',
			'email' => 'admin@kingboosting.com',
			'email_verified_at' => now(),
			'password' => bcrypt('*iUJA2m%Ey67'),
			'country' => 'TR',
		])->assignRole('Admin');
	}

	public function seedUsers(string $role, int $number): void
	{
		User::factory($number)->create()->each(
			fn ($user) =>
			$user->assignRole($role)
		);
	}
}