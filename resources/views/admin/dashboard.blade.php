@extends('admin.layouts.app-v2')

@section('body')
    @php
        $userList = \App\Models\User::where('role_id', 3)->get();
        $attendanceList = \App\Models\Attendance::where('date', date('Y-m-d'))->get();
        $absentEmployeeList = [];
        
        // check who is absent today User table and Attendance Table
        foreach ($userList as $user) {
            $isAbsent = true;
            foreach ($attendanceList as $attendance) {
                if ($user->employee->id == $attendance->employee_id) {
                    $isAbsent = false;
                    break;
                }
            }
            if ($isAbsent) {
                array_push($absentEmployeeList, $user);
            }
        }
    @endphp
    <div class="row">
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="card-body">
                    <span class="dash-widget-icon"><i class="fa fa-cubes"></i></span>
                    <div class="dash-widget-info">
                        <h3>
                            {{ count($userList) }}
                        </h3>
                        <span>All Employees</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="card-body">
                    <span class="dash-widget-icon"><i class="fa fa-usd"></i></span>
                    <div class="dash-widget-info">
                        <h3>
                            @php
                                $total_clients = \App\Models\ClientAccount::orderby('id', 'desc')->count();
                            @endphp
                            {{ $total_clients }}
                        </h3>
                        <span>Clients</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="card-body">
                    <span class="dash-widget-icon"><i class="fa fa-diamond"></i></span>
                    <div class="dash-widget-info">
                        <h3>37</h3>
                        <span>Tasks</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="card-body">
                    <span class="dash-widget-icon"><i class="fa fa-user"></i></span>
                    <div class="dash-widget-info">
                        <h3>
                            {{ count($userList) - count($absentEmployeeList) }}
                        </h3>
                        <span>Today's Attendance</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="card">
                        <div class="card-body">
                            {{--bar-charts  --}}
                            <h3 class="card-title">Monthly Attendance</h3> 
                            <div id="bar-charts-dash"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-lg-6 col-xl-8 d-flex">
            <div class="card flex-fill">
                <div class="card-body">
                    <h4 class="card-title">Task Statistics</h4>
                    <div class="statistics">
                        <div class="row">
                            <div class="col-md-6 col-6 text-center">
                                <div class="stats-box mb-4">
                                    <p>Total Tasks</p>
                                    <h3>385</h3>
                                </div>
                            </div>
                            <div class="col-md-6 col-6 text-center">
                                <div class="stats-box mb-4">
                                    <p>Overdue Tasks</p>
                                    <h3>19</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-purple" role="progressbar" style="width: 30%" aria-valuenow="30"
                            aria-valuemin="0" aria-valuemax="100">30%</div>
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 22%" aria-valuenow="18"
                            aria-valuemin="0" aria-valuemax="100">22%</div>
                        <div class="progress-bar bg-success" role="progressbar" style="width: 24%" aria-valuenow="12"
                            aria-valuemin="0" aria-valuemax="100">24%</div>
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 26%" aria-valuenow="14"
                            aria-valuemin="0" aria-valuemax="100">21%</div>
                        <div class="progress-bar bg-info" role="progressbar" style="width: 10%" aria-valuenow="14"
                            aria-valuemin="0" aria-valuemax="100">10%</div>
                    </div>
                    <div>
                        <p><i class="fa fa-dot-circle-o text-purple me-2"></i>Completed Tasks <span
                                class="float-end">166</span></p>
                        <p><i class="fa fa-dot-circle-o text-warning me-2"></i>Inprogress Tasks <span
                                class="float-end">115</span></p>
                        <p><i class="fa fa-dot-circle-o text-success me-2"></i>On Hold Tasks <span
                                class="float-end">31</span></p>
                        <p><i class="fa fa-dot-circle-o text-danger me-2"></i>Pending Tasks <span
                                class="float-end">47</span></p>
                        <p class="mb-0"><i class="fa fa-dot-circle-o text-info me-2"></i>Review Tasks <span
                                class="float-end">5</span></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-6 col-xl-4 d-flex">
            <div class="card flex-fill">
                <div class="card-body">
                    <h4 class="card-title">
                        Today Absent
                        <span class="badge bg-inverse-danger ms-2">{{ count($absentEmployeeList) }}</span>
                    </h4>
                    
                    @foreach ($absentEmployeeList as $item)   
                        <div class="leave-info-box">
                            <div class="media d-flex align-items-center">
                                <a href="profile.html" class="avatar"><img alt="" src="assets/img/user.jpg"></a>
                                <div class="media-body flex-grow-1">
                                    <div class="text-sm my-0">{{ $item->first_name . " " . $item->last_name }}</div>
                                </div>
                            </div>
                            <div class="row align-items-center mt-3">
                                <div class="col-6">
                                    <h6 class="mb-0">{{ date('d M, Y') }}</h6>
                                    <span class="text-sm text-muted">Absent Date</span>
                                </div>
                                <div class="col-6 text-end">
                                    <span class="badge bg-inverse-danger">Pending</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @if (count($absentEmployeeList) > 2)
                        <div class="load-more text-center">
                            <a class="text-dark" href="javascript:void(0);">Load More</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
