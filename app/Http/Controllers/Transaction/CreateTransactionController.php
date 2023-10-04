<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class CreateTransactionController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'description' => ['required', 'max:255'],
            'type' => ['required', 'in:outcome,income'],
            'price' => ['required', 'numeric', 'min:0', 'not_in:0'],
            'category' => ['required', 'max:255'],
        ]);

        $user_id = $request->user()->id;
        $transactionData = $request->only(['description', 'type', 'price', 'category']);
        $transactionData['user_id'] = $user_id;
        $transactionData['createdAt'] = now();

        $transaction = Transaction::create($transactionData);

        return response()->json($transaction);
    }
}
