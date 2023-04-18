<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class meadmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:meadmin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
//        User::create([
//            'name' => 'SU',
//            'email' => 'SU@admin.nl',
//            'password' => Hash::make('SU'),
//            'icon_color' => 'red',
//            'icon' => 'S',
//            'is_active' => 'Active',
//        ]);
    }
}
