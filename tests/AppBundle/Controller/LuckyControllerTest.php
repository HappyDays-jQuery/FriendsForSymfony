<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class LuckyControllerTest extends WebTestCase
{
    public function testLuckyNumber()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/lucky/number/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Lucky Numbers:', $crawler->filter('body h1')->text());
    }

    public function testLuckyNumberCount()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/lucky/number/5');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Lucky Numbers:', $crawler->filter('body h1')->text());
    }

    public function testApiLuckyNumber()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/api/lucky/number');
        $response = $client->getResponse();
        $headers = $response->headers;
        $content = $response->getContent();

        $this->assertEquals(200, $response->getStatusCode(), "レスポンスのステータスコードが 200 であること");
        $this->assertTrue($headers->contains('Content-Type', 'application/json'), "レスポンスヘッダの Content-Type が 'application/json' であること");
        $json = json_decode($content, true);
        $this->assertNotNull($json, 'レスポンスボディがJSONテキスト(＝JSONデコード成功)であること');
    }
}
