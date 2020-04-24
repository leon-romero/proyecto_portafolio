<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class InsertarDatos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'insertar:datos';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'insertar datos';

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
        try {
            DB::unprepared(file_get_contents('database/migrations/insertarDatos.sql'));
            $this->info("Import completed!");
        } catch (\Throwable $th) {
            $this->info("Error. " . $th);
        }
    }
}
