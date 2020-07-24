<?php

use Illuminate\Database\Seeder;
use App\Models\ServiceProviderType;

class ServiceProviderTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ServiceProviderType::class, 100)->create();
    }
}
