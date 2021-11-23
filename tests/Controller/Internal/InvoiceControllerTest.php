<?php

namespace App\Tests\Controller\Internal;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class InvoiceControllerTest extends WebTestCase
{
    public function testNameConversation(): void
    {
        $client = static::createClient();

        $client->request('GET', '/internal/invoice/1');

        // Validate a successful response and some content
        $this->assertResponseIsSuccessful();
        $response = json_decode($client->getResponse()->getContent(), true);
        var_dump($response);
    }

    public function testExpand(): void
    {
        $client = static::createClient();

        $client->request('GET', '/internal/invoice/1', ['expand' => 'customer,lines.track']);

        // Validate a successful response and some content
        $this->assertResponseIsSuccessful();
        $response = json_decode($client->getResponse()->getContent(), true);
        var_dump($response);
        $this->assertArrayHasKey('customer', $response);
    }
}
