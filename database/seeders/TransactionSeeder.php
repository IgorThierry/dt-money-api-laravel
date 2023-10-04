<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Seeder;


class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();
        $oneDayAgo = now()->subDay();
        $transactions = [
            [
                'description' => 'Desenvolvimento de site',
                'type' => 'income',
                'price' => 10000,
                'category' => 'Venda',
                'user_id' => 1,
                'createdAt' => $oneDayAgo,
            ],
            [
                'description' => 'Hambúrguer',
                'type' => 'outcome',
                'price' => 60,
                'category' => 'Alimentação',
                'user_id' => 1,
                'createdAt' => $now,
            ]
        ];

        foreach ($transactions as $t) {
            Transaction::create($t);
        }
    }
}
