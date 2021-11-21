<?php

declare(strict_types=1);

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AlbumControllerTest extends WebTestCase
{
    public function testPaginator(): void
    {
        $client = static::createClient();

        $client->request('GET', '/album');

        // Validate a successful response and some content
        $this->assertResponseIsSuccessful();
        $response = json_decode($client->getResponse()->getContent(), true);
        $this->assertArrayHasKey('totalCount', $response);
        $this->assertArrayHasKey('page', $response);
        $this->assertArrayHasKey('pageCount', $response);
        $this->assertArrayHasKey('pageSize', $response);
        $this->assertArrayHasKey('items', $response);
    }

    public function testPage(): void
    {
        $client = static::createClient();

        $client->request('GET', '/album', ['page' => 2, 'page_size' => 10]);

        // Validate a successful response and some content
        $this->assertResponseIsSuccessful();
        $response = json_decode($client->getResponse()->getContent(), true);
        $this->assertArrayHasKey('totalCount', $response);
        $this->assertArrayHasKey('page', $response);
        $this->assertArrayHasKey('pageCount', $response);
        $this->assertArrayHasKey('pageSize', $response);
        $this->assertArrayHasKey('items', $response);
        $this->assertEquals(2, $response['page']);
        $this->assertEquals(10, $response['pageSize']);
    }
}
