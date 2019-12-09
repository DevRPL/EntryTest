@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Manage Item</div>
    
                <div class="card-body">
                    @component('shared.block.btn_create', ['route' => 'items.create']) 
                    @endcomponent
                    
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Item Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $no => $item)
                                <tr>
                                    <td>{{ $no +1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        @component('shared.block.btn_icon_edit', [
                                            'route' => 'items.edit',
                                            'params' => ['id' => $item->id]
                                        ]) @endcomponent
                                        @component('shared.block.btn_icon_delete', [
                                            'route' => 'items.destroy',
                                            'params' => ['id' => $item->id]
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
