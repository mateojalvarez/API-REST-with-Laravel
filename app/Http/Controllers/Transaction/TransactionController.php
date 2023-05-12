<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\ApiController;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Http\JsonResponse;

class TransactionController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('scope:read-general')->only('show');
        $this->middleware('can:view,transaction')->only('show');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $this->allowAdminAction();

        return $this->showAll(Transaction::all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction): JsonResponse
    {
        return $this->showOne($transaction);
    }
}
