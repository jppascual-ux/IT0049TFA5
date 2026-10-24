<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

/**
 * Seeds the customers table with the same records as the static array
 * in CustomerController.
 */
class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        $customers = [
            ['customer_code' => 'CUST-0001', 'name' => 'Maria Clara Santos',    'email' => 'maria.santos@example.com',     'phone' => '0917 123 4567', 'city' => 'Quezon City',   'loyalty_points' => 1250, 'status' => 'Active',   'joined_at' => '2026-01-15'],
            ['customer_code' => 'CUST-0002', 'name' => 'Juan Miguel Dela Cruz', 'email' => 'juan.delacruz@example.com',    'phone' => '0918 234 5678', 'city' => 'Manila',        'loyalty_points' => 840,  'status' => 'Active',   'joined_at' => '2026-02-03'],
            ['customer_code' => 'CUST-0003', 'name' => 'Angelica Reyes',        'email' => 'angelica.reyes@example.com',   'phone' => '0920 345 6789', 'city' => 'Makati City',   'loyalty_points' => 2310, 'status' => 'Active',   'joined_at' => '2026-03-21'],
            ['customer_code' => 'CUST-0004', 'name' => 'Paolo Mendoza',         'email' => 'paolo.mendoza@example.com',    'phone' => '0921 456 7890', 'city' => 'Pasig City',    'loyalty_points' => 120,  'status' => 'Inactive', 'joined_at' => '2026-04-09'],
            ['customer_code' => 'CUST-0005', 'name' => 'Kristine Joy Bautista', 'email' => 'kristine.bautista@example.com', 'phone' => '0927 567 8901', 'city' => 'Taguig City',   'loyalty_points' => 560,  'status' => 'Active',   'joined_at' => '2026-05-30'],
            ['customer_code' => 'CUST-0006', 'name' => 'Ramon Villanueva',      'email' => 'ramon.villanueva@example.com', 'phone' => '0935 678 9012', 'city' => 'Caloocan City', 'loyalty_points' => 0,    'status' => 'Inactive', 'joined_at' => '2026-07-12'],
        ];

        foreach ($customers as $customer) {
            Customer::updateOrCreate(['customer_code' => $customer['customer_code']], $customer);
        }
    }
}
