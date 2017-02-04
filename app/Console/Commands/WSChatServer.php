<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use App\ChatApp as Chat;

class WSChatServer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'chat:serve';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start chat server.';

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
        // $port = intval($this->option('port'));
        $port = intval(9090);

        $this->info("Starting chat web socket server on port " . $port);
        
        $server = IoServer::factory(
            new HttpServer(
                new WsServer(
                    new Chat()
                )
            ),
            $port,
            '0.0.0.0'
        );

        $server->run();
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['port', 'p', InputOption::VALUE_OPTIONAL, 'Port where to launch the server.', 9090],
        ];
    }
}
