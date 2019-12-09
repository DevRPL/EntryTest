<?php

namespace App\Services;

use App\Entities\Transaction;
use App\Repositories\TransactionRepository;
use App\Services\Contracts\TransactionServiceContract;

class TransactionService implements TransactionServiceContract
{
    protected $transaction;

    public function __construct(TransactionRepository $transaction)
    {
        $this->transaction = $transaction;
    }

    public function all($columns = ['*'])
    {
        return $this->transaction->all();
    }

    public function find($id, $columns = ['*'])
    {
        return $this->transaction->find($id);
    }

    public function create(array $attributes)
    {
        return $this->transaction->create($attributes);
    }

    public function update(array $attributes, $id)
    {
        return $this->transaction->find($id)->update($attributes);
    }

    public function delete($id)
    {
        return $this->transaction->find($id);
    }

    public function transactionAllDepartment()
    {
        return $this->transaction->transactionAllDepartment();
    }
}
