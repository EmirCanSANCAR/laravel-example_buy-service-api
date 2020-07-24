<?php

use Illuminate\Database\Seeder;
use App\Models\ServiceProvider;
use App\Models\Service;

class ServiceProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $serviceProviders = factory(ServiceProvider::class, 100)->create();

        $faker = Faker\Factory::create();
        foreach ($serviceProviders as $serviceProvider) {

            //Service Provider Types Seeder
            $faker->unique(true); // fakerReset
            $typeIds = [];
            $randomTypeCount = $faker->numberBetween(1, 4);
            for ($i = 0; $i < $randomTypeCount; $i++) {
                $typeIds[] = $faker->unique()->numberBetween(1, 100);
            }
            $serviceProvider->types()->sync($typeIds);

            //Service Provider Services Seeder
            $faker->unique(true); // fakerReset
            $randomServiceCount = $faker->numberBetween(1, 4);
            factory(Service::class, $randomServiceCount)->create(['service_provider_id' => $serviceProvider->id]);
        }
    }
}
