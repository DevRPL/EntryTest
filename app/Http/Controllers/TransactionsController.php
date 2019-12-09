<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\TransactionRepository;
use App\Services\Contracts\TransactionServiceContract;
use App\Services\Contracts\ItemServiceContract;
use Illuminate\Support\Facades\Auth;

/**
 * Class transactionsController.
 */
class TransactionsController extends Controller
{
    /**
     * @var transactionRepository
     */
    protected $transaction;
    protected $item;

    /**
     * transactionsController constructor.
     *
     * @param transactionRepository $repository
     */
    public function __construct(
        TransactionServiceContract $transaction,
        ItemServiceContract $item
    ) {
        $this->transaction = $transaction;
        $this->item = $item;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = $this->transaction->all();

        return view('transaction.index', compact('transactions'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = $this->item->all();

        return view('transaction.create', compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        
        $this->transaction->create($data);

        if ($request->input('action') == 'save') {
            return redirect()->back();
        } else {
            return redirect()->route('transactions.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaction = $this->transaction->find($id);

        $items = $this->item->all();

        return view('transaction.edit', compact('transaction', 'items'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param string                $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(Request $request, $id)
    {
        $data = $request->except('_token', '_method');
        $data['user_id'] = Auth::user()->id;
        $this->transaction->update($data, $id);
        
        if ($request->input('action') == 'save') {
            return redirect()->back();
        } else {
            return redirect()->route('transactions.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->transaction->find($id)->delete($id);
        
        return redirect()->back();
    }
}
