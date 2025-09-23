@extends('backend.admin.layout.app')

@section('title', 'Admin Dashboard')

@section('header')
    <style>
        .hover-shadow:hover {
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
            transform: translateY(-3px);
            transition: all 0.3s ease-in-out;
        }
        .icon-circle {
            width: 50px;
            height: 50px;
        }
    </style>
@endsection

@section('content')
    <!-- Page Header -->
    <div class="mb-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </nav>
        <div class="row d-flex justify-content-between align-items-center">
            <div class="col-md-9">
                <h1 class="h3 mb-0">Dashboard</h1>
            </div>
        </div>
    </div>

    <!-- Cards Section -->
    <div class="mt-4 shadow rounded p-3 bg-white">
        <div class="row g-3">
            @php
                $widgets = [
                    ['label' => 'Admins', 'count' => $admins, 'icon' => 'shield-lock'],
                    ['label' => 'Moderators', 'count' => $moderators, 'icon' => 'person-gear'],
                    ['label' => 'Institutes', 'count' => $institutes, 'icon' => 'building'],
                    ['label' => 'Teachers', 'count' => $teachers, 'icon' => 'easel'],
                    ['label' => 'Parents', 'count' => $parents, 'icon' => 'people'],
                    ['label' => 'Students', 'count' => $students, 'icon' => 'mortarboard'],
                ];
            @endphp

            @foreach ($widgets as $widget)
                <div class="col-md-4">
                    <div class="card border border-primary shadow-sm h-100 py-3 rounded-3 hover-shadow">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <div class="text-primary small text-uppercase fw-semibold">{{ $widget['label'] }}</div>
                                <div class="h4 mb-0 fw-bold text-primary">{{ $widget['count'] }}</div>
                            </div>
                            <div class="icon-circle d-flex justify-content-center align-items-center rounded-circle"
                                style="width: 3.5rem; height: 3.5rem; border: 2px solid var(--bs-primary); color: var(--bs-primary);">
                                <i class="bi bi-{{ $widget['icon'] }}" style="font-size: 2rem;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Charts Section -->
    <div class="mt-4 shadow rounded p-3">
        <div class="row">
            <div class="col-12">
                <h6 class="mb-3">Student Registrations (Last 6 Months)</h6>
                <div class="card">
                    <div class="card-body">
                        <canvas id="studentChart" style="width: 100%; height: 300px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('studentChart').getContext('2d');
        const studentChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($studentChartLabels),
                datasets: [{
                    label: 'Students Added',
                    data: @json($studentChartData),
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: 'rgba(54, 162, 235, 1)'
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        stepSize: 1
                    }
                }
            }
        });
    </script>
@endsection
