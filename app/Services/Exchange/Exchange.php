<?php 

namespace App\Services\Exchange;

use Exception;
use App\Exchange as ExchangeModel;

class Exchange implements ExchangeInterface
{
    protected $url;

    public function __construct()
    {
        // Mock One
        $this->url = 'http://www.mocky.io/v2/5a74519d2d0000430bfe0fa0';
    }

    public function get(): array
    {
        try {
            $response = file_get_contents($this->url);
            $response = json_decode($response, true);

            return [
                'usd'   => $response['result'][0]['amount'],
                'eur'   => $response['result'][1]['amount'],
                'gbp'   => $response['result'][2]['amount'],
            ];
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
