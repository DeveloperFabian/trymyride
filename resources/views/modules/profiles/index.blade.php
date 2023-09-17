@extends('layouts.dashboard.app')
@section('content')
    <div class="row">
        <div class="col-4 card shadow">
            <div class="card-body">
                <div class="row-reverse">
                    <div class="col mb-3">
                        <h2 class="fw-bold">Mi perfil</h2>
                    </div>
                    <div class="col d-flex justify-content-center mb-3">
                        <img class="rounded-5"
                            src="{{ Auth::user()->getMedia('profiles')->last()? Auth::user()->getMedia('profiles')->last()->getUrl(): 'https://img.freepik.com/vector-premium/icono-circulo-usuario-anonimo-ilustracion-vector-estilo-plano-sombra_520826-1931.jpg' }}"
                            style="width: 75%; height: 100%; object-fit: cover;" />

                    </div>
                    <div class="col">
                        <h4 class="fw-bold text-center">{{ $users->full_name }}</h4>
                    </div>
                    <div class="col">
                        <p class="text-center">{{ $users->email }}</p>
                    </div>
                    <hr style="border: solid #000 2px">
                    <div class="col">
                        <p class="text-center">Redes Sociales</p>
                    </div>
                    <div class="col d-flex justify-content-center">
                        <span class="iconify me-2" data-icon="logos:facebook" data-width="25"></span>
                        <span class="iconify me-2" data-icon="skill-icons:instagram" data-width="25"></span>
                        <span class="iconify me-2" data-icon="skill-icons:twitter" data-width="25"></span>
                        <span class="iconify me-2" data-icon="logos:whatsapp-icon" data-width="25"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col card shadow">
            <div class="card-body">
                <form method="POST" action="{{ route('profiles.update') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row-reverse">
                        <div class="col mb-4">
                            <div class="row">
                                <div class="col">
                                    <label for="" class="fw-bold mb-2">NOMBRE</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        value="{{ $users->name }}">
                                </div>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="row">
                                <div class="col">
                                    <label for="" class="fw-bold mb-2">CORREO</label>
                                    <input type="email" name="email" id="email" class="form-control"
                                        value="{{ $users->email }}">
                                </div>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="row">
                                <div class="col">
                                    <label for="" class="fw-bold mb-2">NUEVA CONTRASEÑA</label>
                                    <input type="password" name="password" id="password" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="row">
                                <div class="col">
                                    <label for="" class="fw-bold mb-2">Foto de
                                        perfil</label>
                                    <input type="file" name="image" id="image" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="col my-5 d-flex justify-content-center">
                            <button type="submit"
                                class="btn btn-lg btn-success border-0 text-white rounded-3">ACTUALIZAR
                                PERFIL</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if (session('message'))
        <script>
            Swal.fire({
                title: 'Éxito',
                text: '{{ session('message') }}',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        </script>
    @endif
@endsection
