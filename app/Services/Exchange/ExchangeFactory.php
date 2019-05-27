<?php 

namespace App\Services\Exchange;

class ExchangeFactory
{
    public static function createExchange()
    {
        return new Exchange;
    }

    public static function createMock(string $mock)
    {
        return new $mock;
    }
}
