@extends('layouts.auth.app')
@section('content')
    <div class="text-center mt-4">
        <img src="https://appcore.trymyride.co/images/tmr-logo.svg" alt="" class="w-50 mb-5">
    </div>

    <div class="card">
        <div class="card-body">
            <div class="m-sm-3">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-bold">Correo electrónico</label>
                        <input class="form-control form-control-lg" type="email" name="email"
                            placeholder="Ingresa tu correo electrónico" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Contraseña</label>
                        <input class="form-control form-control-lg" type="password" name="password"
                            placeholder="ingresa tu contraseña" />
                    </div>
                    @if ($errors->any())
                        <span class="my-5 text-danger fw-bold">Tus credenciales no son válidas</span>
                    @endif
                    <div class="d-grid gap-2 mt-3">
                        <button type="submit" class="btn btn-lg btn-primary bg-gradient">Iniciar sesión</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="text-center mb-3">
        ¿No tienes una cuenta? <a href="{{ route('register') }}">Registrarme</a>
    </div>
@endsection
