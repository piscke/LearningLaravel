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

    public function testBasicExample2()
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
		$crawler = $this->client->request('GET', '/');
		
		$this->assertTrue($this->client->getResponse()->isOk());
		
		$this->assertCount(1, $crawler->filter('h1:contains("You have arrived.")'));

	}
}
