<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'name' => 'Paket Basic',
                'description' => 'Paket photo booth basic dengan 2 jam sesi foto, unlimited print, dan 1 backdrop pilihan.',
                'price' => 1500000,
            ],
            [
                'name' => 'Paket Standard',
                'description' => 'Paket photo booth standard dengan 4 jam sesi foto, unlimited print, 2 backdrop pilihan, dan soft file semua foto.',
                'price' => 2500000,
            ],
            [
                'name' => 'Paket Premium',
                'description' => 'Paket photo booth premium dengan 6 jam sesi foto, unlimited print, 3 backdrop custom, soft file semua foto, dan video booth.',
                'price' => 3500000,
            ],
            [
                'name' => 'Paket Wedding',
                'description' => 'Paket khusus wedding dengan full day sesi foto, unlimited print, backdrop custom sesuai tema wedding, album foto, dan video montage.',
                'price' => 5000000,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
