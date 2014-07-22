<?php

use Illuminate\Support\Facades\Input;

class ControllerTest extends TestCase {

    public function setUp()
    {
        parent::setUp();

        Artisan::call('migrate');

        $this->seed('UsersSeeder');
    }

	public function test_root_status_ok()
	{
		$crawler = $this->client->request('GET', '/');

		$this->assertTrue($this->client->getResponse()->isOk());
	}

    public function test_users_count()
    {
        $response = $this->action('GET', 'UserController@index');

        $view = $response->original;

        $this->assertEquals(4, $view['users']->count());
    }

    public function test_user_se_o_primeiro_usuario_e_o_piscke()
    {
        $response = $this->action('GET', 'UserController@get', array('user' => 1));

        $view = $response->original;

        $this->assertEquals('Leandro Salvatti Piscke', $view['user']->name);
    }

    public function test_users_se_retorna_json()
    {
        $response = $this->action('GET', 'UserController@index', array(), array(), array(), array('HTTP_Accept' => 'application/json'));

        $this->assertResponseStatus(200);

        $this->assertEquals('application/json', $response->headers->get('Content-Type'));
    }

    public function tearDown() {
        parent::tearDown();

        Artisan::call('migrate', ['reset']);
    }
}
