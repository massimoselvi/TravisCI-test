<?php

namespace Tests\Feature;

use App\Models\Access\User\User;
use Tests\TestCase;

// use Illuminate\Foundation\Testing\WithoutMiddleware;
// use Illuminate\Foundation\Testing\DatabaseMigrations;
// use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase {
	/**
	 * A basic test example.
	 *
	 * @return void
	 */
	public function testItShouldCreateUser() {
		$user = User::create([
			'name' => 'Francesco',
			'email' => 'hey@hellofrancesco.com',
			'password' => 'such-security',
		]);
		$this->assertDatabaseHas('users',
			[
				'name' => 'Francesco',
				'email' => 'hey@hellofrancesco.com',
			]);
	}
}
