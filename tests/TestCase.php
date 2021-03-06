<?php

namespace Tests;

use App\Models\Access\Role\Role;
use App\Models\Access\User\User;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

/**
 * Class TestCase.
 */
abstract class TestCase extends BaseTestCase {
	use DatabaseTransactions;

	/**
	 * The base URL to use while testing the application.
	 *
	 * @var string
	 */
	protected $baseUrl = 'http://travis-ci.test';

	/**
	 * @var
	 */
	protected $admin;

	/**
	 * @var
	 */
	protected $executive;

	/**
	 * @var
	 */
	protected $user;

	/**
	 * @var
	 */
	protected $adminRole;

	/**
	 * @var
	 */
	protected $executiveRole;

	/**
	 * @var
	 */
	protected $userRole;

	/**
	 * Creates the application.
	 *
	 * @return \Illuminate\Foundation\Application
	 */
	public function createApplication() {
		$app = require __DIR__ . '/../bootstrap/app.php';

		$app->make(Kernel::class)->bootstrap();

		return $app;
	}

	/**
	 * Set up tests.
	 */
	public function setUp() {
		parent::setUp();

		// Set up the database
		Artisan::call('migrate:refresh');
		Artisan::call('db:seed');

		// Run the tests in English
		App::setLocale('en');

		/*
		 * Create class properties to be used in tests
		 */
		$this->admin = User::find(1);
		$this->executive = User::find(2);
		$this->user = User::find(3);
		$this->adminRole = Role::find(1);
		$this->executiveRole = Role::find(2);
		$this->userRole = Role::find(3);
	}

	public function tearDown() {
		$this->beforeApplicationDestroyed(function () {
			DB::disconnect();
		});

		parent::tearDown();
	}
}
