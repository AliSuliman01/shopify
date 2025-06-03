<?php

namespace App\Console\Commands;

use App\Models\Admin;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CreateAdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-admin-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->ask('Enter admin name');
        $email = $this->ask('Enter admin email');
        $password = $this->ask('Enter admin password');
            
        DB::transaction(function() use ($name, $email, $password){

            $admin = Admin::query()->create([]);

            $admin->user()->create([
                'name' => $name,
                'email' => $email,
                'password' => $password,            
            ]);
        }); 

        $this->info('Admin created successfully');
    }
}
