<?php

namespace Tests\Feature;

use Tests\TestCase;

// use Illuminate\Foundation\Testing\WithoutMiddleware;
// use Illuminate\Foundation\Testing\DatabaseMigrations;
// use Illuminate\Foundation\Testing\DatabaseTransactions;

class CalculationsTest extends TestCase {
	/**
	 * A basic test example.
	 *
	 * @return void
	 */
	public function testAdd() {
		$this->assertEquals(4, 2 + 2);
	}

	/**
	 * A basic test example.
	 *
	 * @return void
	 */
	public function testMultiply() {
		$this->assertEquals(9, 3 * 3);
	}
}
