<?php

namespace ShoppingListBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class shoppinglistControllerTest extends WebTestCase
{
    public function testAddtolist()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/addToList');
    }

    public function testSavelist()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/saveList');
    }

}
