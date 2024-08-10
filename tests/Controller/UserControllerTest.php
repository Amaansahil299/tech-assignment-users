<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class UserControllerTest extends WebTestCase
{
    public function testCreateUser()
    {
        $client = static::createClient();

        $client->request('POST', '/users', [], [], ['CONTENT_TYPE' => 'application/json'], json_encode([
            'email' => 'amanullahsahil299@gmailcom',
            'firstName' => 'Aman',
            'lastName' => 'Ullah',
        ]));

        $this->assertEquals(Response::HTTP_CREATED, $client->getResponse()->getStatusCode());
    }
}
