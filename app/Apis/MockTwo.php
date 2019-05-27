<?php 

namespace App\Apis;

use Exception;
use App\Services\Exchange\MockInterface;

class MockTwo implements MockInterface
{
    protected $url;

    public function __construct()
    {
        // MockTwo
        $this->url = 'http://www.mocky.io/v2/5a74524e2d0000430bfe0fa3';
    }

    public function getData(): array
    {
        try {
            $response = file_get_contents($this->url);
            $response = json_decode($response, true);

            return [
                'usd'   => $response[0]['oran'],
                'eur'   => $response[1]['oran'],
                'gbp'   => $response[2]['oran'],
            ];
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}