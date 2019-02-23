<?php

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ApiControllerTest extends WebTestCase
{
    public function testShowJson()
    {
        $client = static::createClient();

        $client->request('GET', '/api/album/tt1109624/small');

        $this->assertTrue(
            $client->getResponse()->headers->contains(
                'Content-Type',
                'application/json'
                )
            );
    }
}
