<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Customer model for the `customers` table.
 *
 * Not used by the TFA5 pages yet (they read the static array in
 * CustomerController); CustomerSeeder uses it to fill the table.
 */
class Customer extends Model
{
    protected $fillable = [
        'customer_code',
        'name',
        'email',
        'phone',
        'city',
        'loyalty_points',
        'status',
        'joined_at',
    ];

    protected function casts(): array
    {
        return [
            'loyalty_points' => 'integer',
            'joined_at' => 'date',
        ];
    }
}
