<x-app-layout>
    <x-slot name="header">
        <h2 class="h5 font-weight-bold text-dark dark:text-light">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container py-4">
        <div class="text-center mb-5">
            <h1 class="display-4 text-white">CodeOngkir</h1>
            <p class="dark:text-white">Project Cek Ongkir ke Seluruh Kota dan Kabupaten di Indonesia</p>
        </div>

        <div class="row g-4 mb-5">
            <div class="col-md-4">
                <div class="card text-center bg-dark-600 dark:bg-gray-900 text-white shadow-lg border border-white">
                    <div class="card-header font-weight-bold bg-transparent border-bottom border-gray-600">Free</div>
                    <div class="card-body">
                        <i class="fas fa-truck text-primary fa-3x"></i>
                        <ul class="list-unstyled mt-3 mb-4 text-gray-300">
                            <li>Cek Ongkir Lebih Mudah</li>
                        </ul>
                        <button type="button" class="btn btn-primary">Sign up for free</button>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-center bg-dark-600 dark:bg-gray-900 text-white shadow-lg border border-white">
                    <div class="card-header font-weight-bold bg-transparent border-bottom border-gray-600">Pro</div>
                    <div class="card-body">
                        <i class="fas fa-box text-primary fa-3x"></i>
                        <ul class="list-unstyled mt-3 mb-4 text-gray-300">
                            <li>Lacak lokasi paket</li>
                        </ul>
                        <button type="button" class="btn btn-primary">Get started</button>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-center bg-dark-600 dark:bg-gray-900 text-white shadow-lg border border-white">
                    <div class="card-header font-weight-bold bg-transparent border-bottom border-gray-600">Enterprise
                    </div>
                    <div class="card-body">
                        <i class="fas fa-plane-departure text-primary fa-3x"></i>
                        <ul class="list-unstyled mt-3 mb-4 text-gray-300">
                            <li>Cek Ongkir Pengiriman Internasional</li>
                        </ul>
                        <button type="button" class="btn btn-primary">Contact us</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="card bg-dark-600 dark:bg-gray-900 text-white shadow-lg p-4 border border-white">
            <h4 class="h5 mb-4 text-white">Formulir Cek Ongkir</h4>
            <form action="{{ route('store') }}" method="POST">
                @csrf
                <div class="row g-4">
                    <div class="col-md-6">
                        <h5 class="text-gray-400 mb-2">Asal Pengirim:</h5>
                        <div class="form-group mb-3">
                            <label class="form-label text-gray-300" for="origin_province">Provinsi</label>
                            <select id="origin_province" name="origin_province"
                                class="form-select bg-dark-900 dark:bg-gray-800 text-white border-gray-600">
                                <option value="#">-</option>
                                @foreach ($province as $key => $province)
                                    <option value="{{ $key }}">{{ $province }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label text-gray-300" for="origin_city">Kota/Kabupaten</label>
                            <select id="origin_city" name="origin_city"
                                class="form-select bg-dark-900 dark:bg-gray-800 text-white border-gray-600">
                                <option value="#">-</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <h5 class="text-gray-400 mb-2">Tujuan Pengirim:</h5>
                        <div class="form-group mb-3">
                            <label class="form-label text-gray-300" for="destination_city">Kota/Kabupaten</label>
                            <select id="destination_city" name="destination_city"
                                class="form-select bg-dark-900 dark:bg-gray-800 text-white border-gray-600">
                                <option value="#">-</option>
                            </select>
                        </div>
                        <h5 class="text-gray-400 mb-2">Pilih Expedisi:</h5>
                        @foreach ($courier as $key => $value)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="courier-{{ $key }}"
                                    name="courier[]" value="{{ $value->code }}">
                                <label class="form-check-label"
                                    for="courier-{{ $key }}">{{ $value->title }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
