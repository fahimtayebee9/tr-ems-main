{{-- modal dialog--}}
<div class="modal fade" id="punchOutModal" tabindex="-1" role="dialog" aria-labelledby="punchOutModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="punchOutModalLabel" style="font-size: 18px;">Are you sure you want to punch out?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{-- text message to submit his/her completed task before punch out --}}
                <p class="text-left">Please submit your completed task before punch out.</p>
                {{-- <p>Are you sure you want to punch out?</p> --}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                {{-- <form action="{{ route('employee.attendance.update') }}" method="post">
                    @csrf
                    <input type="hidden" name="employee_id" value="{{ $employee->id }}">
                    <input type="hidden" name="attendance_id" value="{{ $attendance->id }}">
                    <input type="hidden" name="date" value="{{ date('Y-m-d') }}">
                    <button type="submit" class="btn btn-primary">Punch Out</button>
                </form> --}}
                <button class="btn btn-info" data-toggle="modal" data-target="#mdl-daily-task-create" data-dismiss="modal" >Submit Completed Tasks</button>

            </div>
        </div>
    </div>
</div>