<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminPageController;
use App\Http\Controllers\Admin\AttendanceController;
use App\Http\Controllers\Admin\HolidayController;
use App\Http\Controllers\Admin\CompanyPolicyController;
use App\Http\Controllers\Admin\CompanyDetailController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\RoleManagerController;
use App\Http\Controllers\Admin\PermissionManagerController;
use App\Http\Controllers\Admin\EmployeeRoleController;
use App\Http\Controllers\Admin\LeaveApplicationController;
use App\Http\Controllers\Admin\LaunchSheetController;
use App\Http\Controllers\Admin\TaskFormController;
use App\Http\Controllers\Admin\TaskSubmissionController;
use App\Http\Controllers\Admin\PayrollAccountController;
use App\Http\Controllers\Admin\ClientAccountController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\ClientWeeklyReportController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\DailySaleController;
use App\Http\Controllers\Admin\WeeklyReportController;
use App\Http\Controllers\Admin\MeetingNoteController as AdminMeetingNoteController;
use App\Http\Controllers\Admin\LaunchProviderController;
use App\Http\Controllers\Admin\PdfReportController;
use App\Http\Controllers\Admin\NoticeBoardController;
use App\Http\Controllers\Admin\ComputerConfigurationController;
use App\Http\Controllers\Admin\ApplicationController;

// EMPLOYEE CONTROLLERS
use App\Http\Controllers\Employee\LeaveManagementController;
use App\Http\Controllers\Employee\LaunchManagementController;
use App\Http\Controllers\Employee\ReportController;
use App\Http\Controllers\Employee\PcConfigurationController;
use App\Http\Controllers\Employee\AttendanceController as EmployeeAttendanceController;
use App\Http\Controllers\Employee\MeetingNoteController as EmployeeMeetingNoteController;
use App\Http\Controllers\Employee\ApplicationController as EmployeeApplicationController;
use App\Http\Controllers\Employee\TaskBoardController as EmployeeTaskBoardController;
use App\Http\Controllers\Employee\TaskCommentController as EmployeeTaskCommentController;

/*
|--------------------------------------------------------------------------
| ADMINISTRATION Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::post('/admin/custom-reports/daily-sales/get-data', [DailySaleController::class, 'getDataForChart'])->name('admin.reports.custom-daily-report.getDataForChart');

Auth::routes();

Route::prefix("admin")->middleware(['auth'])->group(function () {
    Route::get('/dashboard',[AdminPageController::class, 'index'])->name('admin.dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('admin.profile');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // Route group for Computer Configuration
    Route::group(['prefix' => 'computer-configurations'], function () {
        Route::get('/', [ComputerConfigurationController::class, 'index'])->name('admin.computer-configurations.index');
        Route::get('/create', [ComputerConfigurationController::class, 'create'])->name('admin.computer-configurations.create');
        Route::get('/show/{computerConfiguration}', [ComputerConfigurationController::class, 'show'])->name('admin.computer-configurations.show');
        Route::post('/store', [ComputerConfigurationController::class, 'store'])->name('admin.computer-configurations.store');
        Route::post('/update/{computerConfiguration}', [ComputerConfigurationController::class, 'update'])->name('admin.computer-configurations.update');
        Route::get('/destroy/{computerConfiguration}', [ComputerConfigurationController::class, 'destroy'])->name('admin.computer-configurations.destroy');
        Route::get('/requests', [ComputerConfigurationController::class, 'requests'])->name('admin.computer-configurations.requests');
        Route::post('/requests/update', [ComputerConfigurationController::class, 'updateAccessoryRequest'])->name('admin.computer-configurations.requests.update');
    });

    // Routes For NOTICE BOARD  
    Route::group(['prefix' => 'notice-board'], function(){
        Route::get('/', [NoticeBoardController::class, 'index'])->name('admin.notice-board.index');
        Route::post('/store', [NoticeBoardController::class, 'store'])->name('admin.notice-board.store');
        Route::post('/update/{notice_uid}', [NoticeBoardController::class, 'update'])->name('admin.notice-board.update');
        Route::post('/delete/{notice_uid}', [NoticeBoardController::class, 'destroy'])->name('admin.notice-board.destroy');
    });
    
    // Routes For Launch Sheet
    Route::group(['prefix' => 'launch-sheet'], function(){
        Route::get('/', [LaunchSheetController::class, 'index'])->name('admin.launch-sheet.index');
        Route::get('/calculate-total-launch', [LaunchSheetController::class, 'reloadTotalLaunch'])->name('admin.launch-sheet.calculate');
        Route::post('/update', [LaunchSheetController::class, 'update'])->name('admin.launchSheets.update');
        Route::get('/invoices', [LaunchSheetController::class, 'invoices'])->name('admin.launch-sheet.invoice');
        Route::post('/invoices/create', [LaunchSheetController::class, 'createInvoice'])->name('admin.launch-sheet.createInvoice');
        Route::post('/invoices/export/pdf', [LaunchSheetController::class, 'export'])->name('admin.launch-sheet.exportPDF');
        Route::get('/invoices/export/excel', [LaunchSheetController::class, 'exportExcel'])->name('admin.launch-sheet.exportExcel');
        Route::get('invoices/show/{invoice_number}', [LaunchSheetController::class, 'showInvoice'])->name('admin.launch-sheet.showInvoice');

        Route::group(['prefix' => 'providers'], function(){
            Route::get('/', [LaunchProviderController::class, 'index'])->name('admin.launch-sheet.provider.index');
            Route::post('/update/{id}', [LaunchProviderController::class, 'update'])->name('admin.launch-sheet.provider.update');
            Route::post('/store', [LaunchProviderController::class, 'store'])->name('admin.launch-sheet.provider.store');
            Route::post('/destroy', [LaunchProviderController::class, 'destroy'])->name('admin.launch-sheet.provider.destroy');
        });
    });

    Route::resource("holidays", HolidayController::class, [
        'names' => [
            'index' => 'holidays.index',
            'create' => 'holidays.create',
            'store' => 'holidays.store',
            'edit' => 'holidays.edit',
            'update' => 'holidays.update',
            'destroy' => 'holidays.destroy',
        ]
    ]);

    // Route group for departments
    Route::group(['prefix' => 'departments'], function () {
        Route::get('/', [DepartmentController::class, 'index'])->name('departments.index');
        Route::post('/store', [DepartmentController::class, 'store'])->name('departments.store');
        Route::post('/update/{roleManager}', [DepartmentController::class, 'update'])->name('departments.update');
        Route::get('/destroy/{id}', [DepartmentController::class, 'destroy'])->name('departments.destroy');

        Route::post('/import/bulk-data', [DepartmentController::class, 'importBulk'])->name('admin.departments.import.bulk');
    });

    // Route::post('/import/bulk-data', [DepartmentController::class, 'importBulk'])->name('admin.departments.import.bulk');
    Route::get('/administration/export/template', [UserController::class, 'exportUserTemplate'])->name('admin.administration.export.template');
    Route::post('/administration/import/bulk-data', [UserController::class, 'importBulk'])->name('admin.administration.import.bulk');
    Route::post('/employees/import/bulk-data', [EmployeeController::class, 'importBulk'])->name('admin.employees.import.bulk');
    
    Route::group(['prefix' => 'company-policy'], function () {
        Route::get('/', [CompanyPolicyController::class, 'index'])->name('company-policy.index');
        Route::post('/update', [CompanyPolicyController::class, 'update'])->name('company-policy.update');
        Route::get('/edit/{companyPolicy}', [CompanyPolicyController::class, 'edit'])->name('company-policy.edit');

        // Single Rule Update Routes
        Route::post('/update/attendance-rule', [CompanyPolicyController::class, 'updateAttendanceRule'])->name('company-policy.update.attendanceRule');
        Route::post('/update/hdar', [CompanyPolicyController::class, 'updateHalfDayAbsentRule'])->name('company-policy.update.hdar');
    });
    
    Route::group(['prefix' => 'company-details'], function () {
        Route::post('/update/{companyDetail}', [CompanyDetailController::class, 'update'])->name('company-details.update');
    });
    
    // Administration routes
    Route::group(['prefix' => 'administration'], function () {
        Route::get('/users', [UserController::class, 'index'])->name('administration.index');
        Route::get('/users/create', [UserController::class, 'create'])->name('administration.users.create');
        Route::post('/users/store', [UserController::class, 'store'])->name('administration.users.store');
        Route::get('/users/lastUserName', [UserController::class, 'getUserName'])->name('admin.administration.findLastUsername');
        Route::get('/users/edit/{user}', [UserController::class, 'edit'])->name('administration.users.edit');
        Route::post('/users/update/{user}', [UserController::class, 'update'])->name('administration.users.update');
    });
    
    // Route group for Roles
    Route::group(['prefix' => 'roles'], function () {
        Route::get('/', [RoleManagerController::class, 'index'])->name('roles.index');
        Route::post('/store', [RoleManagerController::class, 'store'])->name('roles.store');
        Route::post('/update/{role}', [RoleManagerController::class, 'update'])->name('roles.update');
        Route::get('/destroy/{role}', [RoleManagerController::class, 'destroy'])->name('roles.destroy');
    });
    
    // Route group for Permissions
    Route::group(['prefix' => 'permissions'], function () {
        Route::get('/', [PermissionManagerController::class, 'index'])->name('permissions.index');
        Route::get('/create', [PermissionManagerController::class, 'create'])->name('permissions.create');
        
        Route::post('/store', [PermissionManagerController::class, 'store'])->name('permissions.store');
        Route::post('/update/{permission}', [PermissionManagerController::class, 'update'])->name('permissions.update');
        Route::get('/destroy/{permission}', [PermissionManagerController::class, 'destroy'])->name('permissions.destroy');
        Route::get('/show/{permission}', [PermissionManagerController::class, 'show'])->name('permissions.show');
        Route::get('/edit/{permission}', [PermissionManagerController::class, 'edit'])->name('permissions.edit');
    });
    
    // routes for employee roles management
    Route::group(['prefix' => 'designations'], function () {
        Route::get('/', [EmployeeRoleController::class, 'index'])->name('designations.index');
        Route::post('/store', [EmployeeRoleController::class, 'store'])->name('designations.store');
        Route::post('/update/{employeeRole}', [EmployeeRoleController::class, 'update'])->name('designations.update');
        Route::get('/destroy/{employeeRole}', [EmployeeRoleController::class, 'destroy'])->name('designations.destroy');

        Route::post('/import/bulk-data', [EmployeeRoleController::class, 'importBulk'])->name('admin.designations.import.bulk');
    });
    
    // routes for employee management
    Route::group(['prefix' => 'employees'], function () {
        Route::get('/', [EmployeeController::class, 'index'])->name('admin.employees.index');
        Route::get('/grid-view', [EmployeeController::class, 'gridView'])->name('admin.employees.grid-view');
        Route::get('/create', [EmployeeController::class, 'create'])->name('admin.employees.create');
        Route::post('/store', [EmployeeController::class, 'store'])->name('admin.employees.store');
        Route::get('/show/{employee}', [EmployeeController::class, 'show'])->name('admin.employees.show');
        Route::get('/edit/{employee}', [EmployeeController::class, 'edit'])->name('admin.employees.edit');
        Route::post('/update/{employee}', [EmployeeController::class, 'update'])->name('admin.employees.update');
        Route::get('/destroy/{employee}', [EmployeeController::class, 'destroy'])->name('admin.employees.destroy');
        
        Route::post('/filter/by-designation', [EmployeeController::class, 'filterDataByDesignation'])->name('admin.employees.filter.designation');
        Route::post('/filter/by-department', [EmployeeController::class, 'filterDataByDepartment'])->name('admin.employees.filter.department');
        Route::post('/filter/by-employeeId', [EmployeeController::class, 'filterDataByEmpId'])->name('admin.employees.filter.employeeId');

        Route::post('/update/payroll/{employee_id}', [EmployeeController::class, 'updatePayrollAccount'])->name('admin.employee.update.payrollaccount');
    });
    
    // routes for attendance management
    Route::group(['prefix' => 'attendance'], function () {
        Route::get('/', [AttendanceController::class, 'index'])->name('admin.attendance.index');
        Route::get('/create', [AttendanceController::class, 'create'])->name('admin.attendance.create');
        Route::post('/store', [AttendanceController::class, 'store'])->name('admin.attendance.store');
        Route::get('/show/{attendance}', [AttendanceController::class, 'show'])->name('admin.attendance.show');
        Route::get('/edit/{attendance}', [AttendanceController::class, 'edit'])->name('admin.attendance.edit');
        Route::post('/update/{attendance}', [AttendanceController::class, 'update'])->name('admin.attendance.update');
        Route::get('/destroy/{attendance}', [AttendanceController::class, 'destroy'])->name('admin.attendance.destroy');
        
        // Route::get('/attendances/{month}/{year}', [AttendanceController::class, 'previewMonthData'])->name('admin.attendance.previewMonthData');

        Route::post('/export', [AttendanceController::class, 'exportFile'])->name('admin.attendance.export');
        Route::get('/getDataForChart', [AttendanceController::class, 'getDataForChart'])->name('admin.attendance.getDataForChart');
        // Route::get('/filter', )
    });

    Route::get('/attendance/seedDatabase', [AttendanceController::class, 'seedDatabase'])->name('admin.attendance.seedDatabase');
    Route::get('/launch-sheet/seedDatabase', [LaunchSheetController::class, 'seedDatabase'])->name('admin.launch.seedDatabase');
    
    // routes for leave management
    Route::group(['prefix' => 'applications'], function () {
        Route::get('/', [ApplicationController::class, 'index'])->name('admin.application.index');
        Route::get('/show/{application}', [ApplicationController::class, 'show'])->name('admin.application.show');
        Route::post('/update/{application_id}', [ApplicationController::class, 'updateByAstManager'])->name('admin.leave.application.astmanager');
        Route::post('/update/{application_id}', [ApplicationController::class, 'updateByManager'])->name('admin.application.update.manager');
        Route::get('/destroy/{application}', [ApplicationController::class, 'destroy'])->name('admin.application.destroy');
        Route::get('/export/pdf/{application_id}', [ApplicationController::class, 'createPdf'])->name('admin.application.exportPDF');
    });
    
    // Routes For Custom Weekly Report
    Route::group(['prefix' => 'custom-reports'], function(){
        // DAILY REPORTS ROUTES
        Route::group(['prefix' => 'daily-sales'], function(){
            Route::get('/', [DailySaleController::class, 'index'])->name('admin.reports.custom-daily-report.index');
            Route::post('/import', [DailySaleController::class, 'importBulk'])->name('admin.reports.custom-daily-report.import');
            Route::get('/export', [DailySaleController::class, 'export'])->name('admin.reports.custom-daily-report.export');
            Route::post('/get-data', [DailySaleController::class, 'getDataForChart'])->name('admin.reports.custom-daily-report.getDataForChart');
        });

        Route::group(['prefix' => 'weekly-sales'], function(){
            Route::get('/generate', [WeeklyReportController::class, 'generate'])->name('admin.reports.custom-weekly-report.generateReport'); //index
            Route::post('/store', [WeeklyReportController::class, 'store'])->name('admin.reports.custom-weekly-report.store'); //store
            Route::get('/donwload', [WeeklyReportController::class, 'download'])->name('admin.reports.custom-weekly-report.download');
            Route::post('/update/{id}' , [WeeklyReportController::class, 'update'])->name('admin.reports.custom-weekly-report.update');
            Route::get('/destroy/{id}' , [WeeklyReportController::class, 'destroy'])->name('admin.reports.custom-weekly-report.destroy');
            Route::post('/view/combined/pdf', [WeeklyReportController::class, 'viewCombinedPdf'])->name('admin.reports.custom-weekly-report.view.combined.pdf');
            Route::post('/download/pdf/{id}', [WeeklyReportController::class, 'downloadPdf'])->name('admin.reports.custom-weekly-report.download.pdf');
            Route::post('/generate/all', [WeeklyReportController::class, 'generateAllReport'])->name('admin.reports.custom-weekly-report.generateAll');
            Route::get('/download/pdf-report/{id}', [WeeklyReportController::class, 'downloadPdfReport'])->name('admin.reports.custom-weekly-report.downloadPdfReport');
            Route::post('/download/all/combined', [WeeklyReportController::class, 'downloadCombinedReport'])->name('admin.reports.custom-weekly-report.downloadCombinedReport');
        });

        Route::group(['prefix' => 'pdfs'], function(){
            Route::get('/', [PdfReportController::class, 'index'])->name('admin.reports.pdf.index');
            Route::post('/download', [PdfReportController::class, 'download'])->name('admin.reports.pdf.download');
            Route::post('/view/{id}', [PdfReportController::class, 'view'])->name('admin.reports.pdf.view');
            Route::post('/destroy/{id}', [PdfReportController::class, 'destroy'])->name('admin.reports.pdf.destroy');
            Route::post('/download/all', [PdfReportController::class, 'downloadAll'])->name('admin.reports.pdf.downloadAll');
            Route::post('/empty-database', [PdfReportController::class, 'deleteAllReport'])->name('admin.reports.pdf.destroy.allReport');
        });

        Route::get('/choose-template', [ClientWeeklyReportController::class, 'getReportTheme'])->name('admin.reports.custom-weekly-report.generate.blank');

        Route::get('/generate/single-account', [ClientWeeklyReportController::class, 'generate'])->name('admin.reports.custom-weekly-report.generate.single');
        Route::get('/generate/multiple-account', [ClientWeeklyReportController::class, 'generateMultiple'])->name('admin.reports.custom-weekly-report.generate.multiple');
        Route::post('/generate/store', [ClientWeeklyReportController::class, 'generateStore'])->name('admin.reports.custom-weekly-report.generate.store');
        
        Route::get('/show/{report_number}', [ClientWeeklyReportController::class, 'show'])->name('admin.reports.custom-weekly-report.show');
        Route::post('/update/location', [ClientWeeklyReportController::class, 'updateLocation'])->name('admin.reports.custom-weekly-report.update.location');
        
        Route::post('/update/amazon-us-sales/{report_number}', [ClientWeeklyReportController::class, 'updateAmzUsSales'])->name('admin.reports.custom-weekly-report.update.amazon-us-sales');
        Route::post('/update/amazon-ca-sales/{report_number}', [ClientWeeklyReportController::class, 'updateAmzCaSales'])->name('admin.reports.custom-weekly-report.update.amazon-uk-sales');
        Route::post('/update/walmart-sales/{report_number}', [ClientWeeklyReportController::class, 'updateWalmartSales'])->name('admin.reports.custom-weekly-report.update.walmart-sales');
        Route::get('/edit/meeting-notes/{report_number}', [ClientWeeklyReportController::class, 'editMeetingNotes'])->name('admin.reports.custom-weekly-report.edit.meeting-notes');
        Route::post('/update/meeting-notes/{report_number}', [ClientWeeklyReportController::class, 'updateMeetingNotes'])->name('admin.reports.custom-weekly-report.update.meeting-notes');
        Route::get('/edit/weekly-tasks/{report_number}', [ClientWeeklyReportController::class, 'editWeeklyReportTasks'])->name('admin.reports.custom-weekly-report.edit.weekly-tasks');
        Route::post('/update/weekly-tasks/{report_number}', [ClientWeeklyReportController::class, 'updateWeeklyReportTasks'])->name('admin.reports.custom-weekly-report.update.weekly-tasks');
        
        Route::get('/export/pdf/{report_number}', [ClientWeeklyReportController::class, 'exportPdf'])->name('admin.reports.custom-weekly-report.export.pdf');
        Route::get('/graph-data/{market}', [ClientWeeklyReportController::class, 'graphData'])->name('admin.reports.custom-weekly-report.graphdata');
        Route::get('/reset/report-form', [ClientWeeklyReportController::class, 'resetForm'])->name('admin.reports.custom-weekly-report.reset');
        
        Route::get('/monthly', [ClientWeeklyReportController::class, 'viewMonthlySales'])->name('admin.reports.custom-monthly-report.index');
    });

    // Task Management
    Route::group(['prefix' => 'tasks'], function () {
        // Route::get('/', [TaskSubmissionController::class, 'index'])->name('admin.tasks.index');
        Route::get('/', [TaskSubmissionController::class, 'index'])->name('admin.tasks.index');
        Route::get('/show/{taskSubmissionDate}/{employeeId}', [TaskSubmissionController::class, 'show'])->name('admin.tasks.submissions.show');
        Route::get('/getbydesignation/{designation}', [TaskSubmissionController::class, 'getByDesignation'])->name('admin.tasks.getbydesignation');
        Route::get('/getbydate/{date}', [TaskSubmissionController::class, 'getByDate'])->name('admin.tasks.getbydate');
        
        // Task Forms
        Route::get('/forms', [TaskFormController::class, 'index'])->name('admin.tasks.forms.index');
        Route::get('/forms/create', [TaskFormController::class, 'create'])->name('admin.tasks.forms.create');
        Route::post('/forms/store', [TaskFormController::class, 'store'])->name('admin.tasks.forms.store');
        Route::get('/forms/show/{taskForm}', [TaskFormController::class, 'show'])->name('admin.tasks.forms.show');
        Route::get('/forms/edit/{taskForm}', [TaskFormController::class, 'edit'])->name('admin.tasks.forms.edit');
        Route::post('/forms/update/{taskForm}', [TaskFormController::class, 'update'])->name('admin.tasks.forms.update');
        Route::get('/forms/destroy/{taskForm}', [TaskFormController::class, 'destroy'])->name('admin.tasks.forms.destroy');
    });

    // CLIENT ACCOUNTS
    Route::group(['prefix' => 'client-accounts'], function(){
        Route::post('/assign', [ClientAccountController::class, 'assignAccountManager'])->name('admin.client-accounts.assign');
        Route::get('/', [ClientAccountController::class, 'index'])->name('admin.client-accounts.index');
        Route::post('/store', [ClientAccountController::class, 'store'])->name('admin.client-accounts.store');
        Route::post('/update/{clientAccount}', [ClientAccountController::class, 'update'])->name('admin.client-accounts.update');
        Route::get('/destroy/{clientAccount}', [ClientAccountController::class, 'destroy'])->name('admin.client-accounts.destroy');
        Route::post('/import/bulk-accounts', [ClientAccountController::class, 'importBulkAccounts'])->name('admin.client-accounts.import.bulk-accounts');
        Route::get('/export/bulk-accounts-template', [ClientAccountController::class, 'exportBulkAccountsTemplate'])->name('admin.client-accounts.export.bulk-accounts-template');
    });
    
    // Routes for Payroll Management
    Route::group(['prefix' => 'payroll'], function () {
        Route::get('/', [PayrollAccountController::class, 'index'])->name('admin.payroll.index');
        Route::get('/show/{payroll}', [PayrollAccountController::class, 'show'])->name('admin.payroll.show');
        Route::post('/generate', [PayrollAccountController::class, 'generatePayroll'])->name('admin.payroll.generate');

        // download route for payroll
        Route::get('/download/pdf', [PayrollAccountController::class, 'downloadPayrollPdf'])->name('admin.payroll.downloadPdf');
        Route::post('/download/excel', [PayrollAccountController::class, 'downloadPayrollExcel'])->name('admin.payroll.downloadExcel');
        
    });

    // Routes for Invoice Management
    Route::group(['prefix' => 'invoice-management'], function(){
        Route::get('/', [InvoiceController::class, 'index'])->name('admin.invoice-management.index');
        Route::get('/show/{invoice}', [InvoiceController::class, 'show'])->name('admin.invoice-management.show');
        Route::get('/create', [InvoiceController::class, 'create'])->name('admin.invoice-management.create');
        Route::post('/store', [InvoiceController::class, 'store'])->name('admin.invoice-management.store');
        Route::get('/edit/{invoice}', [InvoiceController::class, 'edit'])->name('admin.invoice-management.edit');
        Route::post('/update/{invoice}', [InvoiceController::class, 'update'])->name('admin.invoice-management.update');
        Route::get('/destroy/{invoice}', [InvoiceController::class, 'destroy'])->name('admin.invoice-management.destroy');

        // download route for invoice
        Route::get('/download/pdf/{invoice}', [InvoiceController::class, 'downloadInvoicePdf'])->name('admin.invoice-management.downloadPdf');
    });
});


/*
|--------------------------------------------------------------------------
| EMPLOYEE Web Routes
|--------------------------------------------------------------------------
*/

Route::prefix('employee')->middleware(['auth'])->group(function(){
    Route::get('/dashboard', [PageController::class, 'empDashboard'])->name('employee.dashboard');

    Route::get('/profile', [PageController::class, 'empProfile'])->name('employee.profile');
    Route::post('/profile/update', [PageController::class, 'empProfileUpdate'])->name('employee.profile.update');

    // ROUTE:: Computer Configuration
    Route::group(['prefix' => 'computer-configurations'], function(){
        Route::get('/', [PcConfigurationController::class, 'index'])->name('employee.computer-configurations.index');
        Route::get('/create', [PcConfigurationController::class, 'create'])->name('employee.computer-configurations.create');
        Route::post('/store', [PcConfigurationController::class, 'store'])->name('employee.computer-configurations.store');
        Route::get('/edit/{pcConfiguration}', [PcConfigurationController::class, 'edit'])->name('employee.computer-configurations.edit');
        Route::post('/update/{pcConfiguration}', [PcConfigurationController::class, 'update'])->name('employee.computer-configurations.update');
        Route::get('/request/accessories', [PcConfigurationController::class, 'requestAccessories'])->name('employee.computer-configurations.request-accessories');
        Route::post('/request/accessories/store', [PcConfigurationController::class, 'requestAccessoriesStore'])->name('employee.computer-configurations.request-accessories.store');
    });
    
    Route::group(['prefix' => 'attendance'], function(){
        Route::get('/', [EmployeeAttendanceController::class, 'empAttendance'])->name('employee.attendance');
        Route::get('/filterData', [EmployeeAttendanceController::class, 'filterAttendanceData'])->name('employee.attendance.filterData');
        Route::post('/store', [EmployeeAttendanceController::class, 'empAttendanceStore'])->name('employee.attendance.store');
        Route::post('/update', [EmployeeAttendanceController::class, 'empAttendanceUpdate'])->name('employee.attendance.update');
        Route::get('/getall/{attendance}', [EmployeeAttendanceController::class, 'empAttendanceGetAll'])->name('employee.attendance.getall');
        Route::get('/status/{status}', [EmployeeAttendanceController::class, 'empAttendanceGetByStatus'])->name('employee.attendance.bystatus');
        Route::get('/getByMonth/{month}', [EmployeeAttendanceController::class, 'empAttendanceGetByMonth'])->name('employee.attendance.bymonth');
        Route::get('/getlaunchsheet/{attendance}', [EmployeeAttendanceController::class, 'empAttendanceGetLaunchSheet'])->name('employee.attendance.getlaunchsheet');
        
        Route::post('/break/store', [EmployeeAttendanceController::class, 'empAttendanceBreakStore'])->name('employee.attendance.break.store');
        Route::post('/break/update', [EmployeeAttendanceController::class, 'empAttendanceBreakUpdate'])->name('employee.attendance.break.update');
    });

    Route::get('/launch-management', [PageController::class, 'empLaunchManagement'])->name('employee.launch-management');
    Route::post('/launch-management/store', [LaunchManagementController::class, 'empLaunchManagementStore'])->name('employee.launch-management.store');
    
    Route::group(['prefix' => 'applications'], function(){
        Route::get('/', [EmployeeApplicationController::class, 'index'])->name('employee.applications');
        Route::get('/create', [EmployeeApplicationController::class, 'create'])->name('employee.applications.create');
        Route::post('/store', [EmployeeApplicationController::class, 'store'])->name('employee.applications.store');
        Route::get('/edit/{application}', [EmployeeApplicationController::class, 'edit'])->name('employee.applications.edit');
        Route::post('/update/{application}', [EmployeeApplicationController::class, 'update'])->name('employee.applications.update');
        Route::get('/destroy/{application}', [EmployeeApplicationController::class, 'destroy'])->name('employee.applications.destroy');
        Route::get('/getByType/{type}', [LeaveManagementController::class, 'empLeaveGetByType'])->name('employee.applications.getbytype');
        Route::get('/download/pdf/{leave}', [EmployeeApplicationController::class, 'downloadPdf'])->name('employee.applications.downloadPdf');

        // FILTER ROUTES
        Route::get('/leave-applications', [EmployeeApplicationController::class, 'getLeaveApplications'])->name('employee.applications.leave-applicaitons');
        Route::get('/other-applications', [EmployeeApplicationController::class, 'otherApplications'])->name('employee.applications.others-applicaitons');
    });

    Route::group(['prefix' => 'task-board'], function () {
        Route::get('/', [EmployeeTaskBoardController::class, 'index'])->name('employee.task-management');
        Route::post('/store', [EmployeeTaskBoardController::class, 'store'])->name('employee.task-management.store');
        Route::post('/update/{task}', [EmployeeTaskBoardController::class, 'update'])->name('employee.task-management.update');
        Route::get('/destroy/{task}', [EmployeeTaskBoardController::class, 'destroy'])->name('employee.task-management.destroy');
        Route::get('/show/{task}', [EmployeeTaskBoardController::class, 'show'])->name('employee.task-management.show');
        Route::get('/create', [EmployeeTaskBoardController::class, 'create'])->name('employee.task-management.create');
        Route::get('/filterData', [EmployeeTaskBoardController::class, 'filterData'])->name('employee.task-management.filterData');

        // TASK COMMENTS
        Route::get('/task-comments/{task_id}', [EmployeeTaskCommentController::class, 'getByTask'])->name('employee.task-comment.getbytask');
        Route::post('/task-comments/store', [EmployeeTaskCommentController::class, 'store'])->name('employee.task-comment.store');
    });

    Route::group(['prefix' => 'meeting-notes'], function(){
        Route::get('/', [EmployeeMeetingNoteController::class, 'index'])->name('employee.meeting-notes');
        Route::post('/store', [EmployeeMeetingNoteController::class, 'store'])->name('employee.meeting-notes.store');
        Route::post('/update/{meeting}', [EmployeeMeetingNoteController::class, 'update'])->name('employee.meeting-notes.update');
        Route::get('/destroy/{meeting}', [EmployeeMeetingNoteController::class, 'destroy'])->name('employee.meeting-notes.destroy');
        Route::get('/show/{meeting}', [EmployeeMeetingNoteController::class, 'show'])->name('employee.meeting-notes.show');
        Route::get('/create', [EmployeeMeetingNoteController::class, 'create'])->name('employee.meeting-notes.create');
        Route::get('/filterData', [EmployeeMeetingNoteController::class, 'filterData'])->name('employee.meeting-notes.filterData');
    });

    // LaunchManagementController
    Route::group(['prefix' => 'launch-management'], function () {
        Route::get('/', [LaunchManagementController::class, 'empLaunchManagement'])->name('employee.launch-sheet.index');
        Route::get('/calculate', [LaunchManagementController::class, 'calculateTotalLaunch'])->name('employee.launch-sheet.calculateTotalLaunch');
        Route::get('/getByMonth/{month}', [LaunchManagementController::class, 'empLaunchManagementGetByMonth'])->name('employee.launch-sheet.getbymonth');
        Route::get('/invoices', [LaunchManagementController::class, 'empLaunchManagementInvoices'])->name('employee.launch-sheet.invoices');
        Route::post('/invoices/create', [LaunchManagementController::class, 'createInvoice'])->name('employee.launch-sheet.createInvoice');
        Route::get('/invoices/export/pdf/{invoice_number}', [LaunchManagementController::class, 'createInvoicePdf'])->name('employee.launch-sheet.exportPDF');
        Route::get('/invoices/export/excel', [LaunchManagementController::class, 'exportExcel'])->name('employee.launch-sheet.exportExcel');
        Route::get('/invoices/show/{invoice_number}', [LaunchManagementController::class, 'showInvoice'])->name('employee.launch-sheet.showInvoice');
        Route::post('/update/{employeeId}', [LaunchManagementController::class, 'empLaunchManagementUpdate'])->name('employee.launch-sheet.update');
    });

    Route::group(['prefix' => 'reports'], function(){
        Route::get('/generate', [ReportController::class, 'index'])->name('employee.reports.generate');
        Route::get('/daily-sales-reports', [ReportController::class, 'dailySalesReports'])->name('employee.reports.dailySalesReports');

    });

    // PERFORMANCE TRACKER FOR EMPLOYEE
    Route::group(['prefix' => 'performance-tracker'], function(){
        Route::get('/', [PerformanceTrackerController::class, 'index'])->name('employee.performance-tracker.index');
        Route::get('/filterData', [PerformanceTrackerController::class, 'filterData'])->name('employee.performance-tracker.filterData');
        Route::get('/getByMonth/{month}', [PerformanceTrackerController::class, 'getByMonth'])->name('employee.performance-tracker.getByMonth');
    });


});