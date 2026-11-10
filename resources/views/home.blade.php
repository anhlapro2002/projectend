@extends('master.index')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    @if (session('success'))
        <div class="alert alert-success" id="myText">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger" id="myText">{{ session('error') }}</div>
    @endif
    <div class="row">
        <div class="col-lg-12 col-md-12 order-1">
            <div class="row">
                <div class="col-lg-3 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img
                                        src="{{asset('assets/img/icons/unicons/student.png')}}"
                                        alt="chart success"
                                        class="rounded"
                                    />
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Total Orders</span>
                            <h3 class="card-title mb-2">{{ $totalOrders }}</h3>
                        </div>  
                    </div>
                </div>

                <div class="col-lg-3 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="{{asset('assets/img/icons/unicons/money2.png')}}" alt="Credit Card" class="rounded" />
                                </div>
                            </div>
                            <span class="d-block mb-1">Total Revenue</span>
                            <h3 class="card-title text-nowrap mb-2">${{ number_format($totalRevenue) }}</h3>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img
                                        src="{{asset('assets/img/icons/unicons/money3.png')}}"
                                        alt="Credit Card"
                                        class="rounded"
                                    />
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Monthly Revenue</span>
                            <h3 class="card-title mb-2">${{ number_format($monthlyRevenue->sum()) }}</h3>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="{{asset('assets/img/icons/unicons/money.png')}}" alt="Credit Card" class="rounded" />
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Total Revenue</span>
                            <h3 class="card-title mb-2">${{ number_format($totalRevenue) }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row g-3">
            <!-- Yearly Revenue Chart -->
            <div class="col-lg-12">
                <div class="card z-index-2">
                    <div class="card-header pb-0">
                        <h6>Tổng quan về doanh số</h6>
                        <select id="yearSelect" class="form-select">
                            @for ($i = 2020; $i <= date('Y'); $i++)
                                <option value="{{ $i }}" {{ $year == $i ? 'selected' : '' }}>{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="card-body p-3">
                        <div class="chart">
                            <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>
    
            <!-- Monthly Sales Chart -->
            <div class="col-lg-6" hidden>
                <div class="card z-index-2">
                    <div class="card-header pb-0">
                        <h6>Doanh số từng tháng</h6>
                        <select id="monthSelect" class="form-select">
                            @for ($i = 1; $i <= 12; $i++)
                                <option value="{{ $i }}" {{ $month == $i ? 'selected' : '' }}>Tháng {{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="card-body p-3">
                        <div class="chart">
                            <canvas id="chart-monthly" class="chart-canvas" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>
    
            <!-- Daily Sales Chart -->
            <div class="col-lg-6" hidden>
                <div class="card z-index-2">
                    <div class="card-header pb-0">
                        <h6>Doanh số chi tiết theo ngày</h6>
                    </div>
                    <div class="card-body p-3">
                        <div class="chart">
                            <canvas id="chart-daily" class="chart-canvas" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
   document.addEventListener('DOMContentLoaded', function() {
    var ctx2 = document.getElementById("chart-line").getContext("2d");
    var ctxMonthly = document.getElementById("chart-monthly").getContext("2d");
    var ctxDaily = document.getElementById("chart-daily").getContext("2d");

    var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);
    gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)');

    var chartLine = new Chart(ctx2, {
        type: "line",
        data: {
            labels: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"],
            datasets: [{
                label: "Doanh thu",
                tension: 0.4,
                borderWidth: 0,
                pointRadius: 0,
                borderColor: "#cb0c9f",
                borderWidth: 3,
                backgroundColor: gradientStroke1,
                fill: true,
                data: @json($monthlyRevenue->values()), 
                maxBarThickness: 6
            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false,
                }
            },
            interaction: {
                intersect: false,
                mode: 'index',
            },
            scales: {
                y: {
                    grid: {
                        drawBorder: false,
                        display: true,
                        drawOnChartArea: true,
                        drawTicks: false,
                        borderDash: [5, 5]
                    },
                    ticks: {
                        display: true,
                        padding: 10,
                        color: '#b2b9bf',
                        font: {
                            size: 11,
                            family: "Open Sans",
                            style: 'normal',
                            lineHeight: 2
                        },
                    }
                },
                x: {
                    grid: {
                        drawBorder: false,
                        display: false,
                        drawOnChartArea: false,
                        drawTicks: false,
                        borderDash: [5, 5]
                    },
                    ticks: {
                        display: true,
                        color: '#b2b9bf',
                        padding: 20,
                        font: {
                            size: 11,
                            family: "Open Sans",
                            style: 'normal',
                            lineHeight: 2
                        },
                    }
                },
            },
        },
    });

    var chartMonthly = new Chart(ctxMonthly, {
        type: "bar",
        data: {
            labels: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"],
            datasets: [{
                label: "Doanh số",
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1,
                data: @json($monthlySales->values()),
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 20
                    }
                }
            }
        }
    });

    var chartDaily = new Chart(ctxDaily, {
        type: "line",
        data: {
            labels: Array.from({ length: 31 }, (_, i) => i + 1),
            datasets: [{
                label: "Doanh số hàng ngày",
                borderColor: "#ff6384",
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                data: @json($dailySales->values()),
                borderWidth: 1,
                fill: true,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 10
                    }
                }
            }
        }
    });

    document.getElementById('yearSelect').addEventListener('change', function() {
        var selectedYear = this.value;
        var selectedMonth = document.getElementById('monthSelect').value;
        
        $.ajax({
                    url: '{{route('home')}}', 
                    type: 'POST',
                    data:{
                        year: selectedYear,
                        month: selectedMonth,
                        _token: "{{ csrf_token() }}",
                    },
                    success: function(data) {
                        document.open(); // Mở tài liệu
                        document.write(data); // Ghi dữ liệu trả về vào tài liệu
                        document.close(); // Đóng tài liệu
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
    });

    document.getElementById('monthSelect').addEventListener('change', function() {
        var selectedYear = document.getElementById('yearSelect').value;
        var selectedMonth = this.value;
        $.ajax({
                    url: '{{route('home')}}', 
                    type: 'POST',
                    data:{
                        year: selectedYear,
                        month: selectedMonth,
                        _token: "{{ csrf_token() }}",
                    },
                    success: function(data) {
                        document.open(); // Mở tài liệu
                        document.write(data); // Ghi dữ liệu trả về vào tài liệu
                        document.close(); // Đóng tài liệu
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
    });
});


</script>


<!-- / Content -->
@endsection
