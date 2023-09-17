@extends('layouts.dashboard.app')

@section('content')
    @vite('resources/assets/js/components/leaflet/Leaflet.js')

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="row-reverse">
                        <div class="col mb-5">
                            <label for="leaflet-geocoder-input" class="form-label fw-bold h3 mb-3 d-flex align-items-center">
                                <span class="iconify" data-icon="openmoji:location-indicator-red" data-width="50"></span>
                                Buscar en el mapa:
                            </label>
                            <div class="row">
                                <div class="col">
                                    <input type="text" id="place-input" placeholder="Busca la ubicación..." class="form-control">
                                </div>
                                <div class="col">
                                    <button id="search-button" class="btn btn-primary bg-gradient">Buscar</button>
                                </div>
                            </div>
                        </div>
                        <div class="col" id="details-screen">
                            <div id="map" class="w-100 min-vh-100"></div>
                            <div id="place-details"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
