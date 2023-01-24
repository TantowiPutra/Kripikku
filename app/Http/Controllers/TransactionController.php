<?php

namespace App\Http\Controllers;

use App\Models\Transactionheader;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transaction_data = Transactionheader::where('user_id', auth()->user()->id);
        return view('history.history_transaction', [
            "title" => "My Transaction",
            "active" => "My Transaction",
            "transaction_data" => $transaction_data->paginate(3)->withQueryString()
        ]);
    }
}
