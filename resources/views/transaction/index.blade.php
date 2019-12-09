@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Manage Transaction</div>
    
                <div class="card-body">
                    @component('shared.block.btn_create', ['route' => 'transactions.create']) 
                    @endcomponent
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Customer Name</th>
                                <th>Item</th>
                                <th>Created By</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($transactions as $no => $transaction)
                                <tr>
                                    <td>{{ $no +1 }}</td>
                                    <td>{{ $transaction->customer_name }}</td>
                                    <td>{{ $transaction->user->name ?? '' }}</td>
                                    <td>{{ $transaction->item->name ?? '' }}</td>
                                    <td>
                                        @component('shared.block.btn_icon_edit', [
                                            'route' => 'transactions.edit',
                                            'params' => ['id' => $transaction->id]
                                        ]) @endcomponent
                                        @component('shared.block.btn_icon_delete', [
                                            'route' => 'transactions.destroy',
                                            'params' => ['id' => $transaction->id]
                                        ]) @endcomponent
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
