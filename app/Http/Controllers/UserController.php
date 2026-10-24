<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

/**
 * User Accounts page (the staff who log in to the POS).
 *
 * For TFA5 the data comes from a static PHP array (a temporary stand-in for
 * the database). Passwords are intentionally left out: a listing page never
 * needs them.
 */
class UserController extends Controller
{
    /**
     * Temporary data source: sample POS user accounts.
     *
     * @var array<int, array<string, mixed>>
     */
    private array $users = [
        [
            'id' => 1,
            'name' => 'Jose Luis Pascual',
            'username' => 'jlpascual',
            'email' => 'jlpascual@saripos.test',
            'role' => 'Administrator',
            'status' => 'Active',
            'last_login' => '2026-10-23 08:12',
        ],
        [
            'id' => 2,
            'name' => 'Andrea Gonzales',
            'username' => 'agonzales',
            'email' => 'agonzales@saripos.test',
            'role' => 'Store Manager',
            'status' => 'Active',
            'last_login' => '2026-10-22 17:45',
        ],
        [
            'id' => 3,
            'name' => 'Mark Anthony Ramos',
            'username' => 'maramos',
            'email' => 'maramos@saripos.test',
            'role' => 'Cashier',
            'status' => 'Active',
            'last_login' => '2026-10-23 07:58',
        ],
        [
            'id' => 4,
            'name' => 'Bea Castillo',
            'username' => 'bcastillo',
            'email' => 'bcastillo@saripos.test',
            'role' => 'Cashier',
            'status' => 'Active',
            'last_login' => '2026-10-21 13:20',
        ],
        [
            'id' => 5,
            'name' => 'Carlo Aquino',
            'username' => 'caquino',
            'email' => 'caquino@saripos.test',
            'role' => 'Inventory Clerk',
            'status' => 'Suspended',
            'last_login' => '2026-09-30 10:05',
        ],
    ];

    /**
     * GET /users  -> list every POS user account.
     */
    public function index(): View
    {
        $users = $this->users;

        return view('users.index', [
            'title' => 'User Accounts',
            'users' => $users,
            'activeCount' => count(array_filter($users, fn ($u) => $u['status'] === 'Active')),
            'roleCount' => count(array_unique(array_column($users, 'role'))),
        ]);
    }
}
