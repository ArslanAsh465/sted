@extends('backend.admin.layout.app')

@section('title', "Add New Teacher")

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4 row">
        <div class="col-md-9">
            <h1 class="h3 mb-0">Add New Teacher</h1>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            <h5 class="mb-0">Create New Teacher</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.teachers.store') }}" method="POST">
                @csrf

                {{-- User fields --}}
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" id="username" value="{{ old('username') }}" 
                        class="form-control @error('username') is-invalid @enderror" required autofocus>
                    @error('username')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" 
                        class="form-control @error('email') is-invalid @enderror" required>
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" 
                        class="form-control @error('password') is-invalid @enderror" required autocomplete="new-password">
                    @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" 
                        class="form-control @error('password_confirmation') is-invalid @enderror" required autocomplete="new-password">
                    @error('password_confirmation')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- TeacherProfile fields --}}
                <div class="mb-3">
                    <label for="institute_id" class="form-label">Institute</label>
                    <select name="institute_id" id="institute_id" class="form-select @error('institute_id') is-invalid @enderror" required>
                        <option value="">Select Institute</option>
                        @foreach($institutes as $institute)
                            <option value="{{ $institute->institute->id ?? '' }}" 
                                {{ old('institute_id') == ($institute->institute->id ?? '') ? 'selected' : '' }}>
                                {{ $institute->institute->name ?? 'N/A' }}
                            </option>
                        @endforeach
                    </select>
                    @error('institute_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}" 
                        class="form-control @error('first_name') is-invalid @enderror" required>
                    @error('first_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}" 
                        class="form-control @error('last_name') is-invalid @enderror" required>
                    @error('last_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" name="phone" id="phone" value="{{ old('phone') }}" 
                        class="form-control @error('phone') is-invalid @enderror" required>
                    @error('phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="qualification" class="form-label">Qualification</label>
                    <input type="text" name="qualification" id="qualification" value="{{ old('qualification') }}" 
                        class="form-control @error('qualification') is-invalid @enderror" required>
                    @error('qualification')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="specialization" class="form-label">Specialization</label>
                    <input type="text" name="specialization" id="specialization" value="{{ old('specialization') }}" 
                        class="form-control @error('specialization') is-invalid @enderror" required>
                    @error('specialization')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea name="address" id="address" rows="3" 
                            class="form-control @error('address') is-invalid @enderror" required>{{ old('address') }}</textarea>
                    @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Country Select --}}
                <div class="mb-3">
                    <label for="country_id" class="form-label">Country</label>
                    <select name="country_id" id="country_id" class="form-select @error('country_id') is-invalid @enderror" required>
                        <option value="">Select Country</option>
                        @foreach($countries as $country)
                            <option value="{{ $country->id }}" {{ old('country_id') == $country->id ? 'selected' : '' }}>
                                {{ $country->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('country_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- State Select --}}
                <div class="mb-3">
                    <label for="state_id" class="form-label">State</label>
                    <select name="state_id" id="state_id" class="form-select @error('state_id') is-invalid @enderror" required>
                        <option value="">Select State</option>
                        {{-- Filter states by old country --}}
                        @foreach($states as $state)
                            @if(old('country_id') == $state->country_id)
                                <option value="{{ $state->id }}" {{ old('state_id') == $state->id ? 'selected' : '' }}>
                                    {{ $state->name }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                    @error('state_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- City Select --}}
                <div class="mb-3">
                    <label for="city_id" class="form-label">City</label>
                    <select name="city_id" id="city_id" class="form-select @error('city_id') is-invalid @enderror" required>
                        <option value="">Select City</option>
                        {{-- Filter cities by old state --}}
                        @foreach($cities as $city)
                            @if(old('state_id') == $city->state_id)
                                <option value="{{ $city->id }}" {{ old('city_id') == $city->id ? 'selected' : '' }}>
                                    {{ $city->name }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                    @error('city_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="postal_code" class="form-label">Postal Code</label>
                    <input type="text" name="postal_code" id="postal_code" value="{{ old('postal_code') }}" 
                        class="form-control @error('postal_code') is-invalid @enderror" required>
                    @error('postal_code')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button class="btn btn-primary">Create Teacher</button>
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

            // Restore old state selection if exists
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

            // Restore old city selection if exists
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

        // Initial population on page load (for old values)
        const oldCountry = "{{ old('country_id') }}";
        if (oldCountry) {
            populateStates(oldCountry);
        }
    });
</script>
@endsection
