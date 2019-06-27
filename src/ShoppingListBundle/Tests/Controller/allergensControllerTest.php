<?php

namespace ShoppingListBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class allergensControllerTest extends WebTestCase
{
    public function testAddallergen()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/addAllergen');
    }

    public function testShowallallergens()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/showAllAllergens');
    }

    public function testRemoveallergen()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/removeAllergen');
    }

}
