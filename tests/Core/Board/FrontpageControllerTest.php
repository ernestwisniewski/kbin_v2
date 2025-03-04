<?php

namespace Core\Board;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class FrontpageControllerTest extends WebTestCase
{
    public function testIndex(): void
    {
        $client = static::createClient();
        $client->request('GET', '/frontpage');

        self::assertResponseIsSuccessful();
    }
}
