<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class VueControllerTest extends WebTestCase
{
    /**
     * @dataProvider provideUrls
     */
    public function testShowGet($url)
    {
        $client = static::createClient();

        $client->request('GET', $url);

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function provideUrls()
    {
        return [
            ['/'],
            ['/does-this-load-our-vue'],
        ];
    }
}
