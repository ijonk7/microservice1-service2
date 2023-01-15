<?php

namespace App\Console\Commands;

use App\Models\ListNumber;
use Illuminate\Console\Command;
use PhpAmqpLib\Connection\AMQPStreamConnection;

class ReceiveRabbitmq extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'receive:rabbitmq';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command Receive Rabbitmq';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
        $channel = $connection->channel();

        $channel->exchange_declare('squared_exchange', 'direct', false, false, false);

        list($queue_name, ,) = $channel->queue_declare("", false, false, true, false);
        $channel->queue_bind($queue_name, 'squared_exchange', 'squared_routing_key');

        $callback = function ($msg) {
            $this->info($msg->body);

            $list_number = new ListNumber();
            $list_number->value = $msg->body;
            $list_number->save();

            if ($list_number) {
                $this->info('Data saved successfully.');
            } else {
                $this->info('Data failed to save.');
            }
        };

        $channel->basic_consume($queue_name, '', false, true, false, false, $callback);

        while ($channel->is_open()) {
            $channel->wait();
        }

        $channel->close();
        $connection->close();
    }
}
