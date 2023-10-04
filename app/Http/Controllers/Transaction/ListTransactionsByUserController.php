<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class ListTransactionsByUserController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $user_id = $request->user()->id;
        $sort = $request->_sort ?? 'createdAt';
        $order = $request->_order ?? 'desc';
        $q = $request->q ?? '';

        $transactions = Transaction::where('user_id', $user_id)
            ->where(function ($query) use ($q) {
                $query->where('description', 'like', "$q%")
                    ->orWhere('category', 'like', "$q%");
            })
            ->orderBy($sort, $order)->get();

        return response()->json($transactions);
    }
}
