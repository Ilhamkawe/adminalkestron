<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\DiskonModel;
use Carbon\Carbon;
class everyMinute extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'diskon:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Ubah Status diskon';

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
        try{
            DiskonModel::where('tanggal_mulai',Carbon::now()->format('Y-m-d H:i:00'))->update(['status'=>"AKTIF"]);
            DiskonModel::where('tanggal_selesai',Carbon::now()->format('Y-m-d H:i:00'))->update(['status'=>"SELESAI"]);
            echo "Schedule Update Status Diskon DIjalankan";
        }catch(Exception $e){
            echo $e;
        }
        
    }
}
