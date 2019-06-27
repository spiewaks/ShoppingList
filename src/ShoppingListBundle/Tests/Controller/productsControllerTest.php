<?php

namespace ShoppingListBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class productsControllerTest extends WebTestCase
{
    public function testShowall()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/showAll');
    }

    public function testAddnew()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/addNew');
    }

    public function testRemoveproduct()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/removeProduct');
    }

}
