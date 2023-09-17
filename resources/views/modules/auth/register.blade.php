@extends('layouts.auth.app')
@section('content')
    <div class="text-center mt-4">
        <h1 class="h2">Crear cuenta nueva</h1>
        <p class="lead">
            Por favor ingresa los siguientes datos:
        </p>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="m-sm-3">
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nombre y apellido</label>
                        <input class="form-control form-control-lg" type="text" name="name"
                            placeholder="Ingresa tu nombre y apellido" />
                        @error('name')
                            <span class="my-5 text-danger fw-bold">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Correo electrónico</label>
                        <input class="form-control form-control-lg" type="email" name="email"
                            placeholder="Ingresa tu correo electrónico" />
                        @error('email')
                            <span class="my-5 text-danger fw-bold">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Contraseña</label>
                        <input class="form-control form-control-lg" type="password" name="password"
                            placeholder="Ingresa tu contraseña" />
                        @error('password')
                            <span class="my-5 text-danger fw-bold">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Repite la contraseña</label>
                        <input class="form-control form-control-lg" type="password" name="password_confirmation"
                            placeholder="Ingresa tu contraseña" />
                    </div>
                    <div class="d-grid gap-2 mt-3">
                        <button type="submit" class="btn btn-lg btn-success bg-gradient">Registrarse</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="text-center mb-3">
        ¿Ya tienes una cuenta? <a href="{{ URL::to('/') }}">Iniciar sesión</a>
    </div>
@endsection
