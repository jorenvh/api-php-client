<?php

namespace Akeneo\Pim\tests\Api\Channel;

use Akeneo\Pim\tests\Api\ApiTestCase;

class GetChannelApiIntegration extends ApiTestCase
{
    public function testGet()
    {
        $api = $this->createClient()->getChannelApi();

        $channel = $api->get('ecommerce');

        $this->assertSameContent([
            'code'             => 'ecommerce',
            'currencies'       => [
                'USD',
                'EUR',
            ],
            'locales'          => [
                'en_US',
                'fr_FR',
            ],
            'category_tree'    => '2014_collection',
            'conversion_units' => [
            ],
            'labels'           => [
                'en_US' => 'Ecommerce',
                'de_DE' => 'Ecommerce',
                'fr_FR' => 'Ecommerce',
            ],
        ], $channel);
    }

    /**
     * @expectedException \Akeneo\Pim\Exception\NotFoundHttpException
     */
    public function testGetNotFound()
    {
        $api = $this->createClient()->getChannelApi();

        $api->get('unknown');
    }
}
