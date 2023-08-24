
@extends('employee.layouts.shreyu')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('employee.computer-configurations.store') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" name="employee_id" value="{{ $employee->id }}">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Processor</label>
                                        <input type="text" name="processor" id="processor"
                                            class="form-control @error('processor') is-invalid @enderror" value="{{ old('processor') }}"
                                            required>
                                        @error('processor')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Processor Change Date</label>
                                        <input type="text" name="processor_change_date" id="processor_change_date" 
                                            class="form-control flatpickr-input @error('processor_change_date') is-invalid @enderror" 
                                            value="{{ old('processor_change_date') }}"
                                            required>
                                        @error('processor_change_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Motherboard</label>
                                        <input type="text" name="motherboard" id="motherboard"
                                            class="form-control @error('motherboard') is-invalid @enderror" value="{{ old('motherboard') }}"
                                            required>
                                        @error('motherboard')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Motherboard Change Date</label>
                                        <input type="text" name="motherboard_change_date" id="motherboard_change_date"
                                            class="form-control flatpickr-input @error('motherboard_change_date') is-invalid @enderror" value="{{ old('motherboard_change_date') }}"
                                            required>
                                        @error('motherboard_change_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Ram</label>
                                        <select class="form-control" id="" name="ram" data-plugin="customselect">
                                            <option value="">Select</option>
                                            @php
                                                $rams = ['4 GB','8 GB', '16 GB','32 GB', '64 GB', '128 GB']
                                            @endphp
                                            @foreach ($rams as $ram)
                                                <option value="{{ $ram }}">{{ $ram }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Ram Change Date</label>
                                        <input type="text" name="ram_change_date" id="ram_change_date"
                                            class="form-control flatpickr-input @error('ram_change_date') is-invalid @enderror" value="{{ old('ram_change_date') }}"
                                            required>
                                        @error('ram_change_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Power Supply</label>
                                        <input type="text" name="power_supply" id="power_supply"
                                            class="form-control @error('power_supply') is-invalid @enderror" value="{{ old('power_supply') }}"
                                            required>
                                        @error('power_supply')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">PSU Change Date</label>
                                        <input type="text" name="psu_change_date" id="psu_change_date"
                                            class="form-control flatpickr-input @error('psu_change_date') is-invalid @enderror" value="{{ old('psu_change_date') }}"
                                            required>
                                        @error('psu_change_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name">Do you have Graphics Card?</label>
                                        <select name="graphics_card_toggle" data-plugin="customselect" id="graphics_card_toggle" class="form-control">
                                            <option value="">Select</option>
                                            @php
                                                $graphics_cards = ['Yes', 'No']
                                            @endphp
                                            @foreach ($graphics_cards as $graphics_card)
                                                <option value="{{ strtolower($graphics_card) }}">{{ $graphics_card }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" id="graphics_card_model">
                                        <label for="name">Graphics Card Model</label>
                                        <input type="text" name="graphics_card" id="graphics_card"
                                            class="form-control @error('graphics_card') is-invalid @enderror" value="{{ old('graphics_card') }}"
                                            required>
                                        @error('graphics_card')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group" id="graphics_card_model_date">
                                        <label for="name">GPU Change Date</label>
                                        <input type="text" name="gpu_change_date" id="gpu_change_date"
                                            class="form-control flatpickr-input @error('gpu_change_date') is-invalid @enderror" value="{{ old('gpu_change_date') }}"
                                            required>
                                        @error('gpu_change_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Hard Disk</label>
                                        <select data-plugin="customselect" name="hard_disk" id="hard_disk" class="form-control">
                                            <option value="">Select</option>
                                            @php
                                                $hard_disks = ['500 GB', '1 TB', '2 TB', '4 TB']
                                            @endphp
                                            @foreach ($hard_disks as $hard_disk)
                                                <option value="{{ $hard_disk }}">{{ $hard_disk }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">HDD Change Date</label>
                                        <input type="text" name="hdd_change_date" id="hdd_change_date"
                                            class="form-control flatpickr-input @error('hdd_change_date') is-invalid @enderror" value="{{ old('hdd_change_date') }}"
                                            required>
                                        @error('hdd_change_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">SSD</label>
                                        <select data-plugin="customselect" name="ssd" id="ssd" class="form-control">
                                            <option value="">Select</option>
                                            @php
                                                $ssds = ['128 GB','240 GB','250 GB', '256 GB','500 GB', '512 GB', '1 TB', '2 TB', '4 TB']
                                            @endphp
                                            @foreach ($ssds as $ssd)
                                                <option value="{{ $ssd }}">{{ $ssd }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">SSD Change Date</label>
                                        <input type="text" name="ssd_change_date" id="ssd_change_date"
                                            class="form-control flatpickr-input @error('ssd_change_date') is-invalid @enderror" value="{{ old('ssd_change_date') }}"
                                            required>
                                        @error('ssd_change_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Keyboard </label>
                                        <input type="text" name="keyboard" id="keyboard"
                                            class="form-control @error('keyboard') is-invalid @enderror" value="{{ old('keyboard') }}"
                                            required>
                                        @error('keyboard')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Keyboard Change Date</label>
                                        <input type="text" name="keyboard_change_date" id="keyboard_change_date"
                                            class="form-control flatpickr-input @error('keyboard_change_date') is-invalid @enderror" value="{{ old('keyboard_change_date') }}"
                                            required>
                                        @error('keyboard_change_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Mouse </label>
                                        <input type="text" name="mouse" id="mouse"
                                            class="form-control @error('mouse') is-invalid @enderror" value="{{ old('mouse') }}"
                                            required>
                                        @error('mouse')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Mouse Change Date</label>
                                        <input type="text" name="mouse_change_date" id="mouse_change_date"
                                            class="form-control flatpickr-input @error('mouse_change_date') is-invalid @enderror" value="{{ old('mouse_change_date') }}"
                                            required>
                                        @error('mouse_change_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">UPS</label>
                                        <select data-plugin="customselect" name="ups" id="ups" class="form-control">
                                            <option value="">Select</option>
                                            @php
                                                $ups = ['Yes', 'No']
                                            @endphp
                                            @foreach ($ups as $up)
                                                <option value="{{ $up }}">{{ $up }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">UPS Change Date</label>
                                        <input type="text" name="ups_change_date" id="ups_change_date"
                                            class="form-control flatpickr-input @error('ups_change_date') is-invalid @enderror" value="{{ old('ups_change_date') }}"
                                            required>
                                        @error('ups_change_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Monitor</label>
                                        <input type="text" name="monitor" id="monitor"
                                            class="form-control @error('monitor') is-invalid @enderror" value="{{ old('monitor') }}"
                                            required>
                                        @error('monitor')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Monitor Change Date</label>
                                        <input type="text" name="monitor_change_date" id="monitor_change_date"
                                            class="form-control flatpickr-input @error('monitor_change_date') is-invalid @enderror" value="{{ old('monitor_change_date') }}"
                                            required>
                                        @error('monitor_change_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Headphone </label>
                                        <input type="text" name="headphone" id="headphone"
                                            class="form-control @error('headphone') is-invalid @enderror" value="{{ old('headphone') }}"
                                            required>
                                        @error('headphone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Headphone Change Date</label>
                                        <input type="text" name="headphone_change_date" id="headphone_change_date"
                                            class="form-control flatpickr-input @error('headphone_change_date') is-invalid @enderror" value="{{ old('headphone_change_date') }}"
                                            required>
                                        @error('headphone_change_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Casing</label>
                                        <input type="text" name="casing" id="casing"
                                            class="form-control @error('casing') is-invalid @enderror" value="{{ old('casing') }}"
                                            required>
                                        @error('casing')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Casing Change Date</label>
                                        <input type="text" name="casing_change_date" id="casing_change_date"
                                            class="form-control flatpickr-input @error('casing_change_date') is-invalid @enderror" value="{{ old('casing_change_date') }}"
                                            required>
                                        @error('casing_change_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Mouse pad</label>
                                        <select data-plugin="customselect" name="mouse_pad" id="mouse_pad" class="form-control">
                                            <option value="">Select</option>
                                            @php
                                                $mouse_pads = ['Yes', 'No']
                                            @endphp
                                            @foreach ($mouse_pads as $mouse_pad)
                                                <option value="{{ $mouse_pad }}">{{ $mouse_pad }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Mouse Pad Change Date</label>
                                        <input type="text" name="mouse_pad_change_date" id="mouse_pad_change_date"
                                            class="form-control flatpickr-input @error('mouse_pad_change_date') is-invalid @enderror" value="{{ old('mouse_pad_change_date') }}"
                                            required>
                                        @error('mouse_pad_change_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer text-center" style="justify-content: center; z-index: 1; position: fixed; bottom: 0; left: 250px; 
                            width: calc(100% - 250px); background: rgb(241, 241, 241);">
                            <button type="submit" class="btn btn-primary w-25">Save</button>
                        </div>
                    </form>

                    {{-- @php
                        $post = new App\Models\ComputerConfiguration();
                        $table_columns = $post->getTableColumns();
                        dd($table_columns);
                    @endphp --}}
                </div>
            </div>
        </div>
    </div>
@endsection
