@extends("admin.layouts.app-v2")

@section("body")

<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            @include('admin.includes.breadcrumb-v2')
        </div>
        <div class="col-auto float-end ms-auto">
            
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                @if(!empty($list_of_configurations))
                <div class="table-responsive">
                    <table class="table table-hover m-b-0">
                        <thead class="thead-dark">
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Employee</th>
                                <th class="text-center">Last Changed Date</th>
                                <th class="text-center">Last Updated</th>
                                {{-- <th class="text-center">Request Submitted</th> --}}
                                <th class="text-center" width="160">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($list_of_configurations as $sheet)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-left">
                                        {{ $sheet->employee->user->first_name . " " . $sheet->employee->user->last_name }}
                                        <span class="d-block text-small">
                                            {{ $sheet->employee->user->username }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        @php    
                                            $parts_list = [
                                                'processor', 'motherboard', 'ram', 'psu', 'gpu', 'hdd', 'ssd', 'keyboard', 'mouse', 'ups', 'monitor', 'headphone', 'casing', 'mouse_pad'
                                            ];
                                            // generate column name dynamically using array $parts_list
                                            $change_dates_list = [];
                                            foreach($parts_list as $part) {
                                                if(!empty($sheet->$part)) {
                                                    $column_name = $part . "_change_date";
                                                    $change_dates_list[] = [
                                                        'part' => $part,
                                                        'date' => $sheet->$column_name
                                                    ];
                                                }
                                            }
                                            // sort the array by date
                                            usort($change_dates_list, function($a, $b) {
                                                return $a['date'] <=> $b['date'];
                                            });
                                            // get the first element of the array
                                            $last_change_date = end($change_dates_list);
                                        @endphp
                                        {{ date('d M, Y', strtotime($last_change_date['date'])) }} 
                                    </td>
                                    <td class="text-center">
                                        {{ strtoupper($last_change_date['part']) }}
                                    </td>
                                    {{-- <td class="text-left">
                                        @foreach($parts_list as $part)
                                            @if(!empty($sheet->$part))
                                                <span class="badge badge-info">
                                                    {{ strtoupper($sheet->$part) }} - {{ strtoupper($part) }}
                                                </span>
                                            @endif
                                        @endforeach
                                    </td> --}}
                                    <td class="text-center">
                                        <a href="" type="button" data-target="#mdl-configuration-{{ $sheet->id }}" data-toggle="modal" class="btn btn-sm btn-primary">
                                            <i class="fa fa-eye"></i> Configuration
                                        </a>

                                        @include('admin.pc_configurations.modals.emp-configurations')
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else 
                    <div class="alert alert-info">No Salary Sheets Found</div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection