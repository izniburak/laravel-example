<?php 

namespace App\Services\Exchange;

class ExchangeAdapter implements ExchangeInterface
{
    protected $exchange;

    public function __construct(MockInterface $exchange)
    {
        $this->exchange = $exchange;
    }

    public function get()
    {
        return $this->exchange->getData();
    }
}
