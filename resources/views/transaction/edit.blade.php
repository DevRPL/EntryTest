@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edir Transactions</div>
    
                <div class="card-body">
                    <form method="POST" action="{{ route('transactions.update', ['id' => $transaction->id]) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Customer Name:</label>
                            <div class="col-sm-10">
                                <input type="text" name="customer_name" value="{{ $transaction->customer_name }}" class="form-control" placeholder="Items">
                            </div>
                        </div>
                        <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Item:</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="item_id" id="m_select2_bookings">
                                @foreach ($items ?:[] as $item)
                                    <option value="{{ $item->id }}" {{ $item->id == $transaction->item_id ? 'selected':'' }}>{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                        <div class="row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-4">
                                {{ csrf_field() }}
                                @component('shared.block.btn_submit_update') @endcomponent
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
