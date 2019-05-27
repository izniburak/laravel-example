<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\Exchange\ExchangeFactory;
use App\Services\Exchange\ExchangeAdapter;
use App\Apis\MockTwo;
use App\Exchange;

class ExchangeUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'exchange:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update exchange informations.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $exchange1 = ExchangeFactory::createExchange();

        $mockTwo = ExchangeFactory::createMock(MockTwo::class);
        $exchange2 = new ExchangeAdapter($mockTwo);

        // update exchanges data
        $exchangeData = $exchange1->get();
        $mockTwoData = $exchange2->get();

        $exchange = new Exchange;
        $exchange->data = json_encode([
            'exchange' => $exchangeData,
            'mockTwo' => $mockTwoData,
        ]);

        if ($exchange->save()) {
            $this->comment("All exchange data updated!");
            return;
        }

        $this->error("Exchange datas cannot be updated!");
    }
}
