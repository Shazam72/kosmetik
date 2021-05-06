<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class DBCreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:create {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Database';

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
     * @return int
     */
    public function handle()
    {
        $db_namne=$this->argument('name');
        $collate=config('database.connections.mysql.collation');
        $charset=config('database.connections.mysql.charset');

        DB::statement("CREATE DATABASE $db_namne CHARACTER SET $charset COLLATE $collate");

        echo "\"$db_namne\" database created successfully";
    }
}
