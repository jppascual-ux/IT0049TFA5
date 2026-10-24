<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

/**
 * Customer Accounts page.
 *
 * For TFA5 the data comes from a static PHP array (a temporary stand-in for
 * the database). Every record uses the same keys so the Blade view can loop
 * through them with @foreach.
 */
class CustomerController extends Controller
{
    /**
     * Temporary data source: sample customer accounts.
     *
     * @var array<int, array<string, mixed>>
     */
    private array $customers = [
        [
            'id' => 1,
            'customer_code' => 'CUST-0001',
            'name' => 'Maria Clara Santos',
            'email' => 'maria.santos@example.com',
            'phone' => '0917 123 4567',
            'city' => 'Quezon City',
            'loyalty_points' => 1250,
            'status' => 'Active',
            'joined_at' => '2026-01-15',
        ],
        [
            'id' => 2,
            'customer_code' => 'CUST-0002',
            'name' => 'Juan Miguel Dela Cruz',
            'email' => 'juan.delacruz@example.com',
            'phone' => '0918 234 5678',
            'city' => 'Manila',
            'loyalty_points' => 840,
            'status' => 'Active',
            'joined_at' => '2026-02-03',
        ],
        [
            'id' => 3,
            'customer_code' => 'CUST-0003',
            'name' => 'Angelica Reyes',
            'email' => 'angelica.reyes@example.com',
            'phone' => '0920 345 6789',
            'city' => 'Makati City',
            'loyalty_points' => 2310,
            'status' => 'Active',
            'joined_at' => '2026-03-21',
        ],
        [
            'id' => 4,
            'customer_code' => 'CUST-0004',
            'name' => 'Paolo Mendoza',
            'email' => 'paolo.mendoza@example.com',
            'phone' => '0921 456 7890',
            'city' => 'Pasig City',
            'loyalty_points' => 120,
            'status' => 'Inactive',
            'joined_at' => '2026-04-09',
        ],
        [
            'id' => 5,
            'customer_code' => 'CUST-0005',
            'name' => 'Kristine Joy Bautista',
            'email' => 'kristine.bautista@example.com',
            'phone' => '0927 567 8901',
            'city' => 'Taguig City',
            'loyalty_points' => 560,
            'status' => 'Active',
            'joined_at' => '2026-05-30',
        ],
        [
            'id' => 6,
            'customer_code' => 'CUST-0006',
            'name' => 'Ramon Villanueva',
            'email' => 'ramon.villanueva@example.com',
            'phone' => '0935 678 9012',
            'city' => 'Caloocan City',
            'loyalty_points' => 0,
            'status' => 'Inactive',
            'joined_at' => '2026-07-12',
        ],
    ];

    /**
     * GET /customers  -> list every customer account.
     */
    public function index(): View
    {
        $customers = $this->customers;

        return view('customers.index', [
            'title' => 'Customer Accounts',
            'customers' => $customers,
            'activeCount' => count(array_filter($customers, fn ($c) => $c['status'] === 'Active')),
            'totalPoints' => array_sum(array_column($customers, 'loyalty_points')),
        ]);
    }
}
