<?php

namespace ShoppingListBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class categoriesControllerTest extends WebTestCase
{
    public function testAddcategory()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/addCategory');
    }

    public function testShowallcategories()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/showAllCategories');
    }

    public function testRemovecategory()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/removeCategory');
    }

}
