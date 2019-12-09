@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Manage User</div>
                    <div class="card-body">
                    @if (Auth::user()->role_id == 1 && Auth::user()->is_active == 1)
                        @component('shared.block.btn_create', ['route' => 'users.create']) @endcomponent
                    @endif
                    <table id="example" class="table table-striped table-bordered"> 
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                                @if (Auth::user()->role_id == 1 && Auth::user()->is_active == 1)
                                    <th>Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $no => $user)
                                <tr>
                                <td>{{ $no +1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role->name ?? '' }}</td>
                                    @if ($user->is_active == 1)
                                        <td>Active</td>
                                    @else
                                        <td>Non Active</td>
                                    @endif
                                    @if (Auth::user()->role_id == 1 && Auth::user()->is_active == 1)
                                        <td>
                                            @component('shared.block.btn_icon_edit', [
                                                'route' => 'users.edit',
                                                'params' => ['id' => $user->id]
                                            ]) @endcomponent
                                            @component('shared.block.btn_icon_delete', [
                                                'route' => 'users.destroy',
                                                'params' => ['id' => $user->id]
                                            ]) @endcomponent
                                        </td>
                                    @endif
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
