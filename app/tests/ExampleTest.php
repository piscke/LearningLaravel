<?php

class ExampleTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testBasicExample()
	{
		$crawler = $this->client->request('GET', '/');

		$this->assertTrue($this->client->getResponse()->isOk());

	}
	
	/**
	 * Teste do Bruno
	 *
	 * @return void
	 */
	public function testBruno()
	{
		$crawler = $this->client->request('GET', '/bruno');
		$this->assertResponseStatus(404);
		//$this->assertTrue($this->client->getResponse()->isOk() != true);

	}
}
