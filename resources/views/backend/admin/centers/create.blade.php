@extends('backend.admin.layout.app')

@section('title', 'Add New Center')

@section('content')
    <!-- Breadcrumb & Page Title -->
    <div class="mb-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.centers.index') }}" class="text-decoration-none">Centers</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Center</li>
            </ol>
        </nav>
        <div class="row d-flex justify-content-between align-items-center">
            <div class="col-md-9">
                <h1 class="h3 mb-0">Add New Center</h1>
            </div>
        </div>
    </div>

    <!-- Form -->
    <div class="mt-4 shadow rounded p-3 bg-white">
        <form action="{{ route('admin.centers.store') }}" method="POST">
            @csrf

            <div class="row g-3">
                {{-- Center Name --}}
                <div class="col-md-6 col-lg-4">
                    <label for="name" class="form-label">Center Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}"
                           class="form-control @error('name') is-invalid @enderror" required>
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- Status --}}
                <div class="col-md-6 col-lg-4">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status" class="form-select @error('status') is-invalid @enderror" required>
                        <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- Address --}}
                <div class="col-12">
                    <label for="address" class="form-label">Address</label>
                    <textarea name="address" id="address" rows="3"
                              class="form-control @error('address') is-invalid @enderror" required>{{ old('address') }}</textarea>
                    @error('address') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- Country --}}
                <div class="col-md-4 col-lg-3">
                    <label for="country_id" class="form-label">Country</label>
                    <select name="country_id" id="country_id"
                            class="form-select @error('country_id') is-invalid @enderror" required>
                        <option value="">Select Country</option>
                        @foreach($countries as $country)
                            <option value="{{ $country->id }}" {{ old('country_id') == $country->id ? 'selected' : '' }}>
                                {{ $country->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('country_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- State --}}
                <div class="col-md-4 col-lg-3">
                    <label for="state_id" class="form-label">State</label>
                    <select name="state_id" id="state_id"
                            class="form-select @error('state_id') is-invalid @enderror" required>
                        <option value="">Select State</option>
                        @foreach($states as $state)
                            @if(old('country_id') == $state->country_id)
                                <option value="{{ $state->id }}" {{ old('state_id') == $state->id ? 'selected' : '' }}>
                                    {{ $state->name }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                    @error('state_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- City --}}
                <div class="col-md-4 col-lg-3">
                    <label for="city_id" class="form-label">City</label>
                    <select name="city_id" id="city_id"
                            class="form-select @error('city_id') is-invalid @enderror" required>
                        <option value="">Select City</option>
                        @foreach($cities as $city)
                            @if(old('state_id') == $city->state_id)
                                <option value="{{ $city->id }}" {{ old('city_id') == $city->id ? 'selected' : '' }}>
                                    {{ $city->name }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                    @error('city_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- Postal Code --}}
                <div class="col-md-6 col-lg-3">
                    <label for="postal_code" class="form-label">Postal Code</label>
                    <input type="text" name="postal_code" id="postal_code"
                           value="{{ old('postal_code') }}"
                           class="form-control @error('postal_code') is-invalid @enderror" required>
                    @error('postal_code') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="mt-4">
                <button class="btn btn-primary">Add Center</button>
            </div>
        </form>
    </div>

    {{-- SweetAlert --}}
    @include('backend.alert')
@endsection

@section('footer')
    <script>
        const states = @json($states);
        const cities = @json($cities);

        document.addEventListener('DOMContentLoaded', function () {
            const countrySelect = document.getElementById('country_id');
            const stateSelect = document.getElementById('state_id');
            const citySelect = document.getElementById('city_id');

            function populateStates(countryId) {
                stateSelect.innerHTML = '<option value="">Select State</option>';
                citySelect.innerHTML = '<option value="">Select City</option>';

                if (!countryId) return;

                const filteredStates = states.filter(state => state.country_id == countryId);
                filteredStates.forEach(state => {
                    const option = document.createElement('option');
                    option.value = state.id;
                    option.textContent = state.name;
                    stateSelect.appendChild(option);
                });

                const oldState = "{{ old('state_id') }}";
                if (oldState && countryId == "{{ old('country_id') }}") {
                    stateSelect.value = oldState;
                    populateCities(oldState);
                }
            }

            function populateCities(stateId) {
                citySelect.innerHTML = '<option value="">Select City</option>';
                if (!stateId) return;

                const filteredCities = cities.filter(city => city.state_id == stateId);
                filteredCities.forEach(city => {
                    const option = document.createElement('option');
                    option.value = city.id;
                    option.textContent = city.name;
                    citySelect.appendChild(option);
                });

                const oldCity = "{{ old('city_id') }}";
                if (oldCity && stateId == "{{ old('state_id') }}") {
                    citySelect.value = oldCity;
                }
            }

            countrySelect.addEventListener('change', () => {
                populateStates(countrySelect.value);
            });

            stateSelect.addEventListener('change', () => {
                populateCities(stateSelect.value);
            });

            const oldCountry = "{{ old('country_id') }}";
            if (oldCountry) {
                populateStates(oldCountry);
            }
        });
    </script>
@endsection
