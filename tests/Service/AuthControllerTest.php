<?php

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AuthControllerTest extends WebTestCase
{
    public function testLogin()
    {
        $client = static::createClient();

        // Simulate a POST request to /login
        $client->request('POST', '/login', ['email' => 'test@example.com', 'password' => 'password']);

        // Assert the response status code
        $this->assertSame(200, $client->getResponse()->getStatusCode());

        // Assert the JSON response content
        $responseData = json_decode($client->getResponse()->getContent(), true);
        $this->assertArrayHasKey('token', $responseData);
    }
}
