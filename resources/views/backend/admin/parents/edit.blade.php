@extends('backend.admin.layout.app')

@section('title', 'Edit Parent')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4 row">
        <div class="col-md-9">
            <h1 class="h3 mb-0">Edit Parent</h1>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            <h5 class="mb-0">Update Parent Information</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.parents.update', $parent->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Account Info --}}
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input 
                        type="text" 
                        name="username" 
                        id="username" 
                        value="{{ old('username', $parent->username) }}" 
                        class="form-control @error('username') is-invalid @enderror" 
                        required
                    >
                    @error('username') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input 
                        type="email" 
                        name="email" 
                        id="email" 
                        value="{{ old('email', $parent->email) }}" 
                        class="form-control @error('email') is-invalid @enderror" 
                        required
                    >
                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">
                        New Password <small class="text-muted">(leave blank to keep current)</small>
                    </label>
                    <input 
                        type="password" 
                        name="password" 
                        id="password" 
                        class="form-control @error('password') is-invalid @enderror"
                    >
                    @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm New Password</label>
                    <input 
                        type="password" 
                        name="password_confirmation" 
                        id="password_confirmation" 
                        class="form-control @error('password_confirmation') is-invalid @enderror"
                    >
                    @error('password_confirmation') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- Profile Info --}}
                <div class="mb-3">
                    <label for="first_name" class="form-label">First Name</label>
                    <input 
                        type="text" 
                        name="first_name" 
                        id="first_name" 
                        value="{{ old('first_name', $parent->parent->first_name ?? '') }}" 
                        class="form-control @error('first_name') is-invalid @enderror" 
                        required
                    >
                    @error('first_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input 
                        type="text" 
                        name="last_name" 
                        id="last_name" 
                        value="{{ old('last_name', $parent->parent->last_name ?? '') }}" 
                        class="form-control @error('last_name') is-invalid @enderror" 
                        required
                    >
                    @error('last_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input 
                        type="text" 
                        name="phone" 
                        id="phone" 
                        value="{{ old('phone', $parent->parent->phone ?? '') }}" 
                        class="form-control @error('phone') is-invalid @enderror" 
                        required
                    >
                    @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea 
                        name="address" 
                        id="address" 
                        class="form-control @error('address') is-invalid @enderror" 
                        rows="3"
                        required
                    >{{ old('address', $parent->parent->address ?? '') }}</textarea>
                    @error('address') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- Location Info --}}
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
                                    {{ old('country_id', $parent->parent->country_id ?? '') == $country->id ? 'selected' : '' }}
                                >
                                    {{ $country->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('country_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
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
                        </select>
                        @error('state_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
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
                        </select>
                        @error('city_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="postal_code" class="form-label">Postal Code</label>
                    <input 
                        type="text" 
                        name="postal_code" 
                        id="postal_code" 
                        value="{{ old('postal_code', $parent->parent->postal_code ?? '') }}" 
                        class="form-control @error('postal_code') is-invalid @enderror" 
                        required
                    >
                    @error('postal_code') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <button class="btn btn-primary">Update Parent</button>
            </form>
        </div>
    </div>

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
        const oldCountry = "{{ old('country_id', $parent->parent->country_id ?? '') }}";
        const oldState = "{{ old('state_id', $parent->parent->state_id ?? '') }}";
        const oldCity = "{{ old('city_id', $parent->parent->city_id ?? '') }}";

        if (oldCountry) {
            populateStates(oldCountry, oldState);
        }

        if (oldState) {
            populateCities(oldState, oldCity);
        }

        document.getElementById('country_id').addEventListener('change', function () {
            populateStates(this.value);
            populateCities(null);
        });

        document.getElementById('state_id').addEventListener('change', function () {
            populateCities(this.value);
        });
    });
</script>
@endsection
