@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Users</div>
    
                <div class="card-body">
                    <form method="POST" action="{{ route('transactions.store') }}">
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Customer:</label>
                            <div class="col-sm-6">
                                <input type="text" name="customer_name" class="form-control" placeholder="Customer">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Item:</label>
                            <div class="col-sm-6">
                                <select class="form-control" name="item_id">
                                    @foreach ($items as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4"></div>
                            <div class="col-lg-4">
                                {{ csrf_field() }}
                                @component('shared.block.btn_submit_store') @endcomponent
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
