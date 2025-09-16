@extends('backend.admin.layout.app')

@section('title', 'Edit Institute')

@section('content')
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4 row">
        <div class="col-md-9">
            <h1 class="h3 mb-0">Edit Institute</h1>
        </div>
    </div>

    <!-- Edit Institute Form -->
    <div class="card mt-4">
        <div class="card-header">
            <h5 class="mb-0">Update Institute Information</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.institutes.update', $institute->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- User fields --}}
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input 
                        type="text" 
                        name="username" 
                        id="username" 
                        value="{{ old('username', $institute->username) }}" 
                        class="form-control @error('username') is-invalid @enderror" 
                        required 
                        autofocus
                    >
                    @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input 
                        type="email" 
                        name="email" 
                        id="email" 
                        value="{{ old('email', $institute->email) }}" 
                        class="form-control @error('email') is-invalid @enderror" 
                        required
                    >
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">
                        New Password 
                        <small class="text-muted">(leave blank to keep current)</small>
                    </label>
                    <input 
                        type="password" 
                        name="password" 
                        id="password" 
                        class="form-control @error('password') is-invalid @enderror" 
                        autocomplete="new-password"
                    >
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm New Password</label>
                    <input 
                        type="password" 
                        name="password_confirmation" 
                        id="password_confirmation" 
                        class="form-control @error('password_confirmation') is-invalid @enderror" 
                        autocomplete="new-password"
                    >
                    @error('password_confirmation')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Institute fields --}}
                <div class="mb-3">
                    <label for="name" class="form-label">Institute Name</label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name" 
                        value="{{ old('name', $institute->institute->name ?? '') }}" 
                        class="form-control @error('name') is-invalid @enderror" 
                        required
                    >
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="principal_name" class="form-label">Principal Name</label>
                    <input 
                        type="text" 
                        name="principal_name" 
                        id="principal_name" 
                        value="{{ old('principal_name', $institute->institute->principal_name ?? '') }}" 
                        class="form-control @error('principal_name') is-invalid @enderror" 
                        required
                    >
                    @error('principal_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="mobile_no" class="form-label">Mobile Number</label>
                    <input 
                        type="text" 
                        name="mobile_no" 
                        id="mobile_no" 
                        value="{{ old('mobile_no', $institute->institute->mobile_no ?? '') }}" 
                        class="form-control @error('mobile_no') is-invalid @enderror" 
                        required
                    >
                    @error('mobile_no')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="whatsapp_no" class="form-label">WhatsApp Number</label>
                    <input 
                        type="text" 
                        name="whatsapp_no" 
                        id="whatsapp_no" 
                        value="{{ old('whatsapp_no', $institute->institute->whatsapp_no ?? '') }}" 
                        class="form-control @error('whatsapp_no') is-invalid @enderror"
                    >
                    @error('whatsapp_no')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="website" class="form-label">Website</label>
                    <input 
                        type="text" 
                        name="website" 
                        id="website" 
                        value="{{ old('website', $institute->institute->website ?? '') }}" 
                        class="form-control @error('website') is-invalid @enderror"
                    >
                    @error('website')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea 
                        name="address" 
                        id="address" 
                        class="form-control @error('address') is-invalid @enderror" 
                        rows="3"
                        required
                    >{{ old('address', $institute->institute->address ?? '') }}</textarea>
                    @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="country_id" class="form-label">Country</label>
                        <select 
                            name="country_id" 
                            id="country_id" 
                            class="form-select @error('country_id') is-invalid @enderror" 
                            required
                        >
                            <option value="">Select Country</option>
                            @foreach($countries as $country)
                                <option 
                                    value="{{ $country->id }}" 
                                    {{ old('country_id', $institute->institute->country_id ?? '') == $country->id ? 'selected' : '' }}
                                >
                                    {{ $country->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('country_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="state_id" class="form-label">State</label>
                        <select 
                            name="state_id" 
                            id="state_id" 
                            class="form-select @error('state_id') is-invalid @enderror" 
                            required
                        >
                            <option value="">Select State</option>
                            {{-- JS will populate --}}
                        </select>
                        @error('state_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="city_id" class="form-label">City</label>
                        <select 
                            name="city_id" 
                            id="city_id" 
                            class="form-select @error('city_id') is-invalid @enderror" 
                            required
                        >
                            <option value="">Select City</option>
                            {{-- JS will populate --}}
                        </select>
                        @error('city_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="postal_code" class="form-label">Postal Code</label>
                    <input 
                        type="text" 
                        name="postal_code" 
                        id="postal_code" 
                        value="{{ old('postal_code', $institute->institute->postal_code ?? '') }}" 
                        class="form-control @error('postal_code') is-invalid @enderror"
                        required
                    >
                    @error('postal_code')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="registration_number" class="form-label">Registration Number</label>
                    <input 
                        type="text" 
                        name="registration_number" 
                        id="registration_number" 
                        value="{{ old('registration_number', $institute->institute->registration_number ?? '') }}" 
                        class="form-control @error('registration_number') is-invalid @enderror"
                    >
                    @error('registration_number')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button class="btn btn-primary">Update Institute</button>
            </form>
        </div>
    </div>

    {{-- SweetAlert notification --}}
    @include('backend.alert')
@endsection

@section('scripts')
<script>
    const states = @json($states);
    const cities = @json($cities);

    function populateStates(countryId, selectedStateId = null) {
        const stateSelect = document.getElementById('state_id');
        stateSelect.innerHTML = '<option value="">Select State</option>';
        if (!countryId) return;

        states
            .filter(state => state.country_id == countryId)
            .forEach(state => {
                const selected = selectedStateId == state.id ? 'selected' : '';
                stateSelect.insertAdjacentHTML('beforeend', `<option value="${state.id}" ${selected}>${state.name}</option>`);
            });
    }

    function populateCities(stateId, selectedCityId = null) {
        const citySelect = document.getElementById('city_id');
        citySelect.innerHTML = '<option value="">Select City</option>';
        if (!stateId) return;

        cities
            .filter(city => city.state_id == stateId)
            .forEach(city => {
                const selected = selectedCityId == city.id ? 'selected' : '';
                citySelect.insertAdjacentHTML('beforeend', `<option value="${city.id}" ${selected}>${city.name}</option>`);
            });
    }

    document.addEventListener('DOMContentLoaded', function () {
        const countrySelect = document.getElementById('country_id');
        const stateSelect = document.getElementById('state_id');

        countrySelect.addEventListener('change', () => {
            populateStates(countrySelect.value);
            populateCities(null);
        });

        stateSelect.addEventListener('change', () => {
            populateCities(stateSelect.value);
        });

        // Pre-select states and cities on load
        const oldCountry = "{{ old('country_id', $institute->institute->country_id ?? '') }}";
        const oldState = "{{ old('state_id', $institute->institute->state_id ?? '') }}";
        const oldCity = "{{ old('city_id', $institute->institute->city_id ?? '') }}";

        if (oldCountry) {
            populateStates(oldCountry, oldState);
        }
        if (oldState) {
            populateCities(oldState, oldCity);
        }
    });
</script>
@endsection
