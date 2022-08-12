@extends('layouts.app')

@section('title', 'Operadores')

@section('content')

    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-12">
                <h1 class="bg-primario text-white text-center fw-bold fs-1 p-3 mt-3">Usuarios con Acceso al Sistema ({{ $users->count() }})</h1>
            </div>

            <div class="col-12">
                @include('layouts.alerts');
            </div>

            <div class="col-10 col-md-12 text-center">
                <div class="list-group bg-light">
                    @foreach ($users as $user)
                        <a href="{{ route('users.edit', $user) }}" class="list-group-item list-group-item-action fs-2 my-1 shadow">
                            {{ $user->name }}
                            <span class="text-secondary d-block">{{ $user->email }}</span>
                            <span class="text-secundario d-block">{{ ucfirst(strToLower($user->role)) }}</span>
                        </a>
                    @endforeach
                  </div>
            </div>
        </div>
    </div>

@endsection
