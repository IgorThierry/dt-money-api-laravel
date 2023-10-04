<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use App\Models\Transaction;


class DeleteTransactionController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id)
    {
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return response()->json([
                'message' => 'Transaction not found',
            ], 404);
        }

        $transaction->delete();

        return response('', 204);
    }
}
