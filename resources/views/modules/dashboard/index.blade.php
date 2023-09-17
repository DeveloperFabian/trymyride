@extends('layouts.dashboard.app')
@section('content')
    <div class="row">
        <div class="col-4">
            <div class="row-reverse">
                <div class="col">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xxl-6">
                            <div class="rotating-card-container">
                                <div
                                    class="card card-rotate card-background card-background-mask-primary shadow-primary mt-md-0 mt-5">
                                    <div class="front front-background"
                                        style="background-image: url(https://i.ibb.co/zRHmxz0/bicicleta-familia-mar-paseo-wallpaper-thumb.png); background-size: cover;">
                                        <div class="card-body text-center">
                                            <div class="row-reverse">
                                                <div class="col my-3">
                                                    <span class="iconify text-white" data-icon="fa6-solid:house-medical"
                                                        data-width="50"></span>
                                                </div>
                                                <div class="col">
                                                    <h3 class="text-white">Numero de usuarios activos</h3>
                                                </div>
                                                <div class="col my-3">
                                                    <h3 class="text-white">0</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="back back-background"
                                        style="background-image: url(https://i.ibb.co/1qsDBSW/131a39dad5a661c9729a83ccc1eb96ff.png); background-size: cover;">
                                        <div class="card-body text-center">
                                            <div class="row-reverse">
                                                <div class="col">
                                                    <button class="btn btn-primary rounded-circle p-2">
                                                        <span class="iconify text-white" data-icon="fa6-solid:angles-right"
                                                            data-width="25"></span>
                                                    </button>
                                                </div>
                                                <div class="col">
                                                    <span class="fw-bold text-white">Ir al modulo</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xxl-6">
                            <div class="rotating-card-container">
                                <div
                                    class="card card-rotate card-background card-background-mask-primary shadow-primary mt-md-0 mt-5">
                                    <div class="front front-background"
                                        style="background-image: url(https://i.ibb.co/zRHmxz0/bicicleta-familia-mar-paseo-wallpaper-thumb.png); background-size: cover;">
                                        <div class="card-body text-center">
                                            <div class="row-reverse">
                                                <div class="col my-3">
                                                    <span class="iconify text-white" data-icon="fa6-solid:house-medical"
                                                        data-width="50"></span>
                                                </div>
                                                <div class="col">
                                                    <h3 class="text-white">Numero de usuarios inactivos</h3>
                                                </div>
                                                <div class="col my-3">
                                                    <h3 class="text-white">0</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="back back-background"
                                        style="background-image: url(https://i.ibb.co/1qsDBSW/131a39dad5a661c9729a83ccc1eb96ff.png); background-size: cover;">
                                        <div class="card-body text-center">
                                            <div class="row-reverse">
                                                <div class="col">
                                                    <button class="btn btn-primary rounded-circle p-2">
                                                        <span class="iconify text-white" data-icon="fa6-solid:angles-right"
                                                            data-width="25"></span>
                                                    </button>
                                                </div>
                                                <div class="col">
                                                    <span class="fw-bold text-white">Ir al modulo</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card text-bg-dark">
                <img src="https://i.ibb.co/zHSBPqq/Openstreetmap-logo-svg-1.png" class="card-img" alt="...">
                <div class="card-img-overlay">
                    <h1 class="text-white fw-bold">OpenStreetMap</h1>
                    <p class="card-text">Aplicación de búsqueda de lugares que permitirá a los usuarios buscar ubicaciones y mostrar puntos de interés cercanos a esa ubicación en un mapa de OpenStreetMap</p>
                    <a href="{{route('maps.index')}}" class="btn btn-success bg-gradient">Ir al módulo</a>
                </div>
            </div>
        </div>
    </div>

    <style>
        .chart-container {
            width: 100%;
        }
    </style>
@endsection
