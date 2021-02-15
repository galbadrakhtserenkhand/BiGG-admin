<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

use App\Models\Admin;

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Admin::create([
            'name' => 'Galaa',
            'email' => 'galaa.1223@yahoo.com',
            'password' => Hash::make('Lightman1223'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
