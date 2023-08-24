<?php

/*
|--------------------------------------------------------------------------
| Load The Cached Routes
|--------------------------------------------------------------------------
|
| Here we will decode and unserialize the RouteCollection instance that
| holds all of the route information for an application. This allows
| us to instantaneously load the entire route map into the router.
|
*/

app('router')->setCompiledRoutes(
    array (
  'compiled' => 
  array (
    0 => false,
    1 => 
    array (
      '/sanctum/csrf-cookie' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::kt2wko4z6CEZ3NEl',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::hkGBVSC5LxmtrKtz',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::gcb4bIwJ6HZEYsKN',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'login',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::zHY39L7UZyu0TeQN',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'logout',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/register' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'register',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::00pr2M3B3UpFDCF9',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/password/reset' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.request',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'password.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/password/email' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.email',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/password/confirm' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.confirm',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::2LUzXYmHUc7harjT',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/dashboard' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.dashboard',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/profile' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.profile',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'profile.update',
          ),
          1 => NULL,
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/computer-configurations' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.computer-configurations.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/computer-configurations/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.computer-configurations.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/computer-configurations/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.computer-configurations.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/computer-configurations/requests' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.computer-configurations.requests',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/computer-configurations/requests/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.computer-configurations.requests.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/notice-board' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.notice-board.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/notice-board/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.notice-board.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/launch-sheet' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.launch-sheet.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/launch-sheet/calculate-total-launch' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.launch-sheet.calculate',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/launch-sheet/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.launchSheets.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/launch-sheet/invoices' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.launch-sheet.invoice',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/launch-sheet/invoices/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.launch-sheet.createInvoice',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/launch-sheet/invoices/export/pdf' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.launch-sheet.exportPDF',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/launch-sheet/invoices/export/excel' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.launch-sheet.exportExcel',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/launch-sheet/providers' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.launch-sheet.provider.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/launch-sheet/providers/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.launch-sheet.provider.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/launch-sheet/providers/destroy' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.launch-sheet.provider.destroy',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/holidays' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'holidays.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'holidays.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/holidays/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'holidays.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/departments' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'departments.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/departments/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'departments.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/departments/import/bulk-data' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.departments.import.bulk',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/administration/export/template' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.administration.export.template',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/administration/import/bulk-data' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.administration.import.bulk',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/employees/import/bulk-data' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.employees.import.bulk',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/company-policy' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'company-policy.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/company-policy/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'company-policy.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/company-policy/update/attendance-rule' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'company-policy.update.attendanceRule',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/company-policy/update/hdar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'company-policy.update.hdar',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/administration/users' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'administration.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/administration/users/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'administration.users.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/administration/users/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'administration.users.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/administration/users/lastUserName' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.administration.findLastUsername',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/roles' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'roles.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/roles/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'roles.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/permissions' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'permissions.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/permissions/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'permissions.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/permissions/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'permissions.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/designations' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'designations.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/designations/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'designations.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/designations/import/bulk-data' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.designations.import.bulk',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/employees' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.employees.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/employees/grid-view' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.employees.grid-view',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/employees/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.employees.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/employees/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.employees.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/employees/filter/by-designation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.employees.filter.designation',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/employees/filter/by-department' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.employees.filter.department',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/employees/filter/by-employeeId' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.employees.filter.employeeId',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/attendance' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.attendance.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/attendance/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.attendance.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/attendance/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.attendance.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/attendance/export' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.attendance.export',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/attendance/getDataForChart' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.attendance.getDataForChart',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/attendance/seedDatabase' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.attendance.seedDatabase',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/launch-sheet/seedDatabase' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.launch.seedDatabase',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/applications' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.application.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/custom-reports/daily-sales' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.reports.custom-daily-report.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/custom-reports/daily-sales/import' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.reports.custom-daily-report.import',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/custom-reports/daily-sales/export' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.reports.custom-daily-report.export',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/custom-reports/daily-sales/get-data' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.reports.custom-daily-report.getDataForChart',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/custom-reports/weekly-sales/generate' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.reports.custom-weekly-report.generateReport',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/custom-reports/weekly-sales/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.reports.custom-weekly-report.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/custom-reports/weekly-sales/donwload' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.reports.custom-weekly-report.download',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/custom-reports/weekly-sales/view/combined/pdf' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.reports.custom-weekly-report.view.combined.pdf',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/custom-reports/weekly-sales/generate/all' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.reports.custom-weekly-report.generateAll',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/custom-reports/weekly-sales/download/all/combined' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.reports.custom-weekly-report.downloadCombinedReport',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/custom-reports/pdfs' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.reports.pdf.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/custom-reports/pdfs/download' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.reports.pdf.download',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/custom-reports/pdfs/download/all' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.reports.pdf.downloadAll',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/custom-reports/pdfs/empty-database' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.reports.pdf.destroy.allReport',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/custom-reports/choose-template' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.reports.custom-weekly-report.generate.blank',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/custom-reports/generate/single-account' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.reports.custom-weekly-report.generate.single',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/custom-reports/generate/multiple-account' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.reports.custom-weekly-report.generate.multiple',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/custom-reports/generate/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.reports.custom-weekly-report.generate.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/custom-reports/update/location' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.reports.custom-weekly-report.update.location',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/custom-reports/reset/report-form' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.reports.custom-weekly-report.reset',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/custom-reports/monthly' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.reports.custom-monthly-report.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/tasks' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.tasks.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/tasks/forms' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.tasks.forms.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/tasks/forms/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.tasks.forms.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/tasks/forms/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.tasks.forms.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/client-accounts/assign' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.client-accounts.assign',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/client-accounts' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.client-accounts.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/client-accounts/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.client-accounts.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/client-accounts/import/bulk-accounts' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.client-accounts.import.bulk-accounts',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/client-accounts/export/bulk-accounts-template' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.client-accounts.export.bulk-accounts-template',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/payroll' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.payroll.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/payroll/generate' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.payroll.generate',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/payroll/download/pdf' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.payroll.downloadPdf',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/payroll/download/excel' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.payroll.downloadExcel',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/invoice-management' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.invoice-management.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/invoice-management/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.invoice-management.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/invoice-management/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.invoice-management.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/employee/dashboard' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employee.dashboard',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/employee/profile' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employee.profile',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/employee/profile/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employee.profile.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/employee/computer-configurations' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employee.computer-configurations.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/employee/computer-configurations/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employee.computer-configurations.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/employee/computer-configurations/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employee.computer-configurations.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/employee/computer-configurations/request/accessories' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employee.computer-configurations.request-accessories',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/employee/computer-configurations/request/accessories/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employee.computer-configurations.request-accessories.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/employee/attendance' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employee.attendance',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/employee/attendance/filterData' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employee.attendance.filterData',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/employee/attendance/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employee.attendance.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/employee/attendance/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employee.attendance.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/employee/attendance/break/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employee.attendance.break.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/employee/attendance/break/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employee.attendance.break.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/employee/launch-management' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employee.launch-sheet.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/employee/launch-management/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employee.launch-management.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/employee/applications' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employee.applications',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/employee/applications/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employee.applications.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/employee/applications/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employee.applications.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/employee/applications/leave-applications' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employee.applications.leave-applicaitons',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/employee/applications/other-applications' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employee.applications.others-applicaitons',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/employee/task-board' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employee.task-management',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/employee/task-board/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employee.task-management.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/employee/task-board/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employee.task-management.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/employee/task-board/filterData' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employee.task-management.filterData',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/employee/meeting-notes' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employee.meeting-notes',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/employee/meeting-notes/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employee.meeting-notes.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/employee/meeting-notes/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employee.meeting-notes.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/employee/meeting-notes/filterData' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employee.meeting-notes.filterData',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/employee/launch-management/calculate' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employee.launch-sheet.calculateTotalLaunch',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/employee/launch-management/invoices' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employee.launch-sheet.invoices',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/employee/launch-management/invoices/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employee.launch-sheet.createInvoice',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/employee/launch-management/invoices/export/excel' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employee.launch-sheet.exportExcel',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/employee/reports/generate' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employee.reports.generate',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/employee/reports/daily-sales-reports' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employee.reports.dailySalesReports',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/employee/performance-tracker' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employee.performance-tracker.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/employee/performance-tracker/filterData' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employee.performance-tracker.filterData',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
    ),
    2 => 
    array (
      0 => '{^(?|/password/reset/([^/]++)(*:31)|/admin/(?|c(?|omp(?|uter\\-configurations/(?|show/([^/]++)(*:95)|update/([^/]++)(*:117)|destroy/([^/]++)(*:141))|any\\-(?|policy/edit/([^/]++)(*:178)|details/update/([^/]++)(*:209)))|ustom\\-reports/(?|weekly\\-sales/(?|update/([^/]++)(*:269)|d(?|estroy/([^/]++)(*:296)|ownload/pdf(?|/([^/]++)(*:327)|\\-report/([^/]++)(*:352))))|pdfs/(?|view/([^/]++)(*:384)|destroy/([^/]++)(*:408))|show/([^/]++)(*:430)|update/(?|amazon\\-(?|us\\-sales/([^/]++)(*:477)|ca\\-sales/([^/]++)(*:503))|w(?|almart\\-sales/([^/]++)(*:538)|eekly\\-tasks/([^/]++)(*:567))|meeting\\-notes/([^/]++)(*:599))|e(?|dit/(?|meeting\\-notes/([^/]++)(*:642)|weekly\\-tasks/([^/]++)(*:672))|xport/pdf/([^/]++)(*:699))|graph\\-data/([^/]++)(*:728))|lient\\-accounts/(?|update/([^/]++)(*:771)|destroy/([^/]++)(*:795)))|notice\\-board/(?|update/([^/]++)(*:837)|delete/([^/]++)(*:860))|launch\\-sheet/(?|invoices/show/([^/]++)(*:908)|providers/update/([^/]++)(*:941))|holidays/([^/]++)(?|(*:970)|/edit(*:983)|(*:991))|de(?|partments/(?|update/([^/]++)(*:1033)|destroy/([^/]++)(*:1058))|signations/(?|update/([^/]++)(*:1097)|destroy/([^/]++)(*:1122)))|a(?|dministration/users/(?|edit/([^/]++)(*:1173)|update/([^/]++)(*:1197))|ttendance/(?|show/([^/]++)(*:1233)|edit/([^/]++)(*:1255)|update/([^/]++)(*:1279)|destroy/([^/]++)(*:1304))|pplications/(?|show/([^/]++)(*:1342)|update/([^/]++)(*:1366)|destroy/([^/]++)(*:1391)|export/pdf/([^/]++)(*:1419)))|roles/(?|update/([^/]++)(*:1454)|destroy/([^/]++)(*:1479))|p(?|ermissions/(?|update/([^/]++)(*:1522)|destroy/([^/]++)(*:1547)|show/([^/]++)(*:1569)|edit/([^/]++)(*:1591))|ayroll/show/([^/]++)(*:1621))|employees/(?|show/([^/]++)(*:1657)|edit/([^/]++)(*:1679)|update/(?|([^/]++)(*:1706)|payroll/([^/]++)(*:1731))|destroy/([^/]++)(*:1757))|tasks/(?|show/([^/]++)/([^/]++)(*:1798)|getbyd(?|esignation/([^/]++)(*:1835)|ate/([^/]++)(*:1856))|forms/(?|show/([^/]++)(*:1888)|edit/([^/]++)(*:1910)|update/([^/]++)(*:1934)|destroy/([^/]++)(*:1959)))|invoice\\-management/(?|show/([^/]++)(*:2006)|edit/([^/]++)(*:2028)|update/([^/]++)(*:2052)|d(?|estroy/([^/]++)(*:2080)|ownload/pdf/([^/]++)(*:2109))))|/employee/(?|computer\\-configurations/(?|edit/([^/]++)(*:2175)|update/([^/]++)(*:2199))|a(?|ttendance/(?|get(?|all/([^/]++)(*:2244)|ByMonth/([^/]++)(*:2269)|launchsheet/([^/]++)(*:2298))|status/([^/]++)(*:2323))|pplications/(?|edit/([^/]++)(*:2361)|update/([^/]++)(*:2385)|d(?|estroy/([^/]++)(*:2413)|ownload/pdf/([^/]++)(*:2442))|getByType/([^/]++)(*:2470)))|task\\-board/(?|update/([^/]++)(*:2511)|destroy/([^/]++)(*:2536)|show/([^/]++)(*:2558)|task\\-comments/(?|([^/]++)(*:2593)|store(*:2607)))|meeting\\-notes/(?|update/([^/]++)(*:2651)|destroy/([^/]++)(*:2676)|show/([^/]++)(*:2698))|launch\\-management/(?|getByMonth/([^/]++)(*:2749)|invoices/(?|export/pdf/([^/]++)(*:2789)|show/([^/]++)(*:2811))|update/([^/]++)(*:2836))|performance\\-tracker/getByMonth/([^/]++)(*:2886)))/?$}sDu',
    ),
    3 => 
    array (
      31 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.reset',
          ),
          1 => 
          array (
            0 => 'token',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      95 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.computer-configurations.show',
          ),
          1 => 
          array (
            0 => 'computerConfiguration',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      117 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.computer-configurations.update',
          ),
          1 => 
          array (
            0 => 'computerConfiguration',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      141 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.computer-configurations.destroy',
          ),
          1 => 
          array (
            0 => 'computerConfiguration',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      178 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'company-policy.edit',
          ),
          1 => 
          array (
            0 => 'companyPolicy',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      209 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'company-details.update',
          ),
          1 => 
          array (
            0 => 'companyDetail',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      269 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.reports.custom-weekly-report.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      296 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.reports.custom-weekly-report.destroy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      327 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.reports.custom-weekly-report.download.pdf',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      352 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.reports.custom-weekly-report.downloadPdfReport',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      384 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.reports.pdf.view',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      408 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.reports.pdf.destroy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      430 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.reports.custom-weekly-report.show',
          ),
          1 => 
          array (
            0 => 'report_number',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      477 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.reports.custom-weekly-report.update.amazon-us-sales',
          ),
          1 => 
          array (
            0 => 'report_number',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      503 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.reports.custom-weekly-report.update.amazon-uk-sales',
          ),
          1 => 
          array (
            0 => 'report_number',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      538 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.reports.custom-weekly-report.update.walmart-sales',
          ),
          1 => 
          array (
            0 => 'report_number',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      567 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.reports.custom-weekly-report.update.weekly-tasks',
          ),
          1 => 
          array (
            0 => 'report_number',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      599 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.reports.custom-weekly-report.update.meeting-notes',
          ),
          1 => 
          array (
            0 => 'report_number',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      642 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.reports.custom-weekly-report.edit.meeting-notes',
          ),
          1 => 
          array (
            0 => 'report_number',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      672 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.reports.custom-weekly-report.edit.weekly-tasks',
          ),
          1 => 
          array (
            0 => 'report_number',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      699 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.reports.custom-weekly-report.export.pdf',
          ),
          1 => 
          array (
            0 => 'report_number',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      728 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.reports.custom-weekly-report.graphdata',
          ),
          1 => 
          array (
            0 => 'market',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      771 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.client-accounts.update',
          ),
          1 => 
          array (
            0 => 'clientAccount',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      795 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.client-accounts.destroy',
          ),
          1 => 
          array (
            0 => 'clientAccount',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      837 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.notice-board.update',
          ),
          1 => 
          array (
            0 => 'notice_uid',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      860 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.notice-board.destroy',
          ),
          1 => 
          array (
            0 => 'notice_uid',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      908 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.launch-sheet.showInvoice',
          ),
          1 => 
          array (
            0 => 'invoice_number',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      941 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.launch-sheet.provider.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      970 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'holidays.show',
          ),
          1 => 
          array (
            0 => 'holiday',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      983 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'holidays.edit',
          ),
          1 => 
          array (
            0 => 'holiday',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      991 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'holidays.update',
          ),
          1 => 
          array (
            0 => 'holiday',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'holidays.destroy',
          ),
          1 => 
          array (
            0 => 'holiday',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1033 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'departments.update',
          ),
          1 => 
          array (
            0 => 'roleManager',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1058 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'departments.destroy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1097 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'designations.update',
          ),
          1 => 
          array (
            0 => 'employeeRole',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1122 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'designations.destroy',
          ),
          1 => 
          array (
            0 => 'employeeRole',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1173 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'administration.users.edit',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1197 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'administration.users.update',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1233 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.attendance.show',
          ),
          1 => 
          array (
            0 => 'attendance',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1255 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.attendance.edit',
          ),
          1 => 
          array (
            0 => 'attendance',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1279 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.attendance.update',
          ),
          1 => 
          array (
            0 => 'attendance',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1304 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.attendance.destroy',
          ),
          1 => 
          array (
            0 => 'attendance',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1342 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.application.show',
          ),
          1 => 
          array (
            0 => 'application',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1366 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.application.update.manager',
          ),
          1 => 
          array (
            0 => 'application_id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1391 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.application.destroy',
          ),
          1 => 
          array (
            0 => 'application',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1419 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.application.exportPDF',
          ),
          1 => 
          array (
            0 => 'application_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1454 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'roles.update',
          ),
          1 => 
          array (
            0 => 'role',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1479 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'roles.destroy',
          ),
          1 => 
          array (
            0 => 'role',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1522 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'permissions.update',
          ),
          1 => 
          array (
            0 => 'permission',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1547 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'permissions.destroy',
          ),
          1 => 
          array (
            0 => 'permission',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1569 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'permissions.show',
          ),
          1 => 
          array (
            0 => 'permission',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1591 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'permissions.edit',
          ),
          1 => 
          array (
            0 => 'permission',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1621 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.payroll.show',
          ),
          1 => 
          array (
            0 => 'payroll',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1657 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.employees.show',
          ),
          1 => 
          array (
            0 => 'employee',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1679 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.employees.edit',
          ),
          1 => 
          array (
            0 => 'employee',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1706 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.employees.update',
          ),
          1 => 
          array (
            0 => 'employee',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1731 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.employee.update.payrollaccount',
          ),
          1 => 
          array (
            0 => 'employee_id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1757 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.employees.destroy',
          ),
          1 => 
          array (
            0 => 'employee',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1798 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.tasks.submissions.show',
          ),
          1 => 
          array (
            0 => 'taskSubmissionDate',
            1 => 'employeeId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1835 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.tasks.getbydesignation',
          ),
          1 => 
          array (
            0 => 'designation',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1856 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.tasks.getbydate',
          ),
          1 => 
          array (
            0 => 'date',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1888 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.tasks.forms.show',
          ),
          1 => 
          array (
            0 => 'taskForm',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1910 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.tasks.forms.edit',
          ),
          1 => 
          array (
            0 => 'taskForm',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1934 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.tasks.forms.update',
          ),
          1 => 
          array (
            0 => 'taskForm',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1959 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.tasks.forms.destroy',
          ),
          1 => 
          array (
            0 => 'taskForm',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2006 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.invoice-management.show',
          ),
          1 => 
          array (
            0 => 'invoice',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2028 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.invoice-management.edit',
          ),
          1 => 
          array (
            0 => 'invoice',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2052 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.invoice-management.update',
          ),
          1 => 
          array (
            0 => 'invoice',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2080 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.invoice-management.destroy',
          ),
          1 => 
          array (
            0 => 'invoice',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2109 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.invoice-management.downloadPdf',
          ),
          1 => 
          array (
            0 => 'invoice',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2175 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employee.computer-configurations.edit',
          ),
          1 => 
          array (
            0 => 'pcConfiguration',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2199 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employee.computer-configurations.update',
          ),
          1 => 
          array (
            0 => 'pcConfiguration',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2244 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employee.attendance.getall',
          ),
          1 => 
          array (
            0 => 'attendance',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2269 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employee.attendance.bymonth',
          ),
          1 => 
          array (
            0 => 'month',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2298 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employee.attendance.getlaunchsheet',
          ),
          1 => 
          array (
            0 => 'attendance',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2323 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employee.attendance.bystatus',
          ),
          1 => 
          array (
            0 => 'status',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2361 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employee.applications.edit',
          ),
          1 => 
          array (
            0 => 'application',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2385 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employee.applications.update',
          ),
          1 => 
          array (
            0 => 'application',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2413 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employee.applications.destroy',
          ),
          1 => 
          array (
            0 => 'application',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2442 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employee.applications.downloadPdf',
          ),
          1 => 
          array (
            0 => 'leave',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2470 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employee.applications.getbytype',
          ),
          1 => 
          array (
            0 => 'type',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2511 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employee.task-management.update',
          ),
          1 => 
          array (
            0 => 'task',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2536 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employee.task-management.destroy',
          ),
          1 => 
          array (
            0 => 'task',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2558 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employee.task-management.show',
          ),
          1 => 
          array (
            0 => 'task',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2593 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employee.task-comment.getbytask',
          ),
          1 => 
          array (
            0 => 'task_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2607 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employee.task-comment.store',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2651 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employee.meeting-notes.update',
          ),
          1 => 
          array (
            0 => 'meeting',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2676 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employee.meeting-notes.destroy',
          ),
          1 => 
          array (
            0 => 'meeting',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2698 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employee.meeting-notes.show',
          ),
          1 => 
          array (
            0 => 'meeting',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2749 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employee.launch-sheet.getbymonth',
          ),
          1 => 
          array (
            0 => 'month',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2789 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employee.launch-sheet.exportPDF',
          ),
          1 => 
          array (
            0 => 'invoice_number',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2811 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employee.launch-sheet.showInvoice',
          ),
          1 => 
          array (
            0 => 'invoice_number',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2836 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employee.launch-sheet.update',
          ),
          1 => 
          array (
            0 => 'employeeId',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2886 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'employee.performance-tracker.getByMonth',
          ),
          1 => 
          array (
            0 => 'month',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => NULL,
          1 => NULL,
          2 => NULL,
          3 => NULL,
          4 => false,
          5 => false,
          6 => 0,
        ),
      ),
    ),
    4 => NULL,
  ),
  'attributes' => 
  array (
    'generated::kt2wko4z6CEZ3NEl' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sanctum/csrf-cookie',
      'action' => 
      array (
        'uses' => 'Laravel\\Sanctum\\Http\\Controllers\\CsrfCookieController@show',
        'controller' => 'Laravel\\Sanctum\\Http\\Controllers\\CsrfCookieController@show',
        'namespace' => NULL,
        'prefix' => 'sanctum',
        'where' => 
        array (
        ),
        'middleware' => 
        array (
          0 => 'web',
        ),
        'as' => 'generated::kt2wko4z6CEZ3NEl',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::hkGBVSC5LxmtrKtz' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:297:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:79:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"000000003ece66f300000000075995a4";}";s:4:"hash";s:44:"hWQ0YREQYN6xwtRLay1GBmIpfdzgswJE91jpDyazGZU=";}}',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::hkGBVSC5LxmtrKtz',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::gcb4bIwJ6HZEYsKN' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '/',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:264:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:46:"function () {
    return \\view(\'welcome\');
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"000000003ece66fd00000000075995a4";}";s:4:"hash";s:44:"6OCt/qpVHYI/7pYkR7EKam3iASztsoGy3B/HqkZQGW0=";}}',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::gcb4bIwJ6HZEYsKN',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'login' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@showLoginForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@showLoginForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'login',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::zHY39L7UZyu0TeQN' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@login',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@login',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::zHY39L7UZyu0TeQN',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'logout' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@logout',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@logout',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'logout',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'register' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'register',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\RegisterController@showRegistrationForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\RegisterController@showRegistrationForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'register',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::00pr2M3B3UpFDCF9' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'register',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\RegisterController@register',
        'controller' => 'App\\Http\\Controllers\\Auth\\RegisterController@register',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::00pr2M3B3UpFDCF9',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.request' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'password/reset',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ForgotPasswordController@showLinkRequestForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\ForgotPasswordController@showLinkRequestForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.request',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.email' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'password/email',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ForgotPasswordController@sendResetLinkEmail',
        'controller' => 'App\\Http\\Controllers\\Auth\\ForgotPasswordController@sendResetLinkEmail',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.email',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.reset' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'password/reset/{token}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ResetPasswordController@showResetForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\ResetPasswordController@showResetForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.reset',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'password/reset',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ResetPasswordController@reset',
        'controller' => 'App\\Http\\Controllers\\Auth\\ResetPasswordController@reset',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.confirm' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'password/confirm',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ConfirmPasswordController@showConfirmForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\ConfirmPasswordController@showConfirmForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.confirm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::2LUzXYmHUc7harjT' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'password/confirm',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ConfirmPasswordController@confirm',
        'controller' => 'App\\Http\\Controllers\\Auth\\ConfirmPasswordController@confirm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::2LUzXYmHUc7harjT',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.dashboard' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/dashboard',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AdminPageController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdminPageController@index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'admin.dashboard',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.profile' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ProfileController@edit',
        'controller' => 'App\\Http\\Controllers\\ProfileController@edit',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'admin.profile',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'profile.update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'admin/profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ProfileController@update',
        'controller' => 'App\\Http\\Controllers\\ProfileController@update',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'profile.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.computer-configurations.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/computer-configurations',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ComputerConfigurationController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\ComputerConfigurationController@index',
        'namespace' => NULL,
        'prefix' => 'admin/computer-configurations',
        'where' => 
        array (
        ),
        'as' => 'admin.computer-configurations.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.computer-configurations.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/computer-configurations/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ComputerConfigurationController@create',
        'controller' => 'App\\Http\\Controllers\\Admin\\ComputerConfigurationController@create',
        'namespace' => NULL,
        'prefix' => 'admin/computer-configurations',
        'where' => 
        array (
        ),
        'as' => 'admin.computer-configurations.create',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.computer-configurations.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/computer-configurations/show/{computerConfiguration}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ComputerConfigurationController@show',
        'controller' => 'App\\Http\\Controllers\\Admin\\ComputerConfigurationController@show',
        'namespace' => NULL,
        'prefix' => 'admin/computer-configurations',
        'where' => 
        array (
        ),
        'as' => 'admin.computer-configurations.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.computer-configurations.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/computer-configurations/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ComputerConfigurationController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\ComputerConfigurationController@store',
        'namespace' => NULL,
        'prefix' => 'admin/computer-configurations',
        'where' => 
        array (
        ),
        'as' => 'admin.computer-configurations.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.computer-configurations.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/computer-configurations/update/{computerConfiguration}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ComputerConfigurationController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\ComputerConfigurationController@update',
        'namespace' => NULL,
        'prefix' => 'admin/computer-configurations',
        'where' => 
        array (
        ),
        'as' => 'admin.computer-configurations.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.computer-configurations.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/computer-configurations/destroy/{computerConfiguration}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ComputerConfigurationController@destroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\ComputerConfigurationController@destroy',
        'namespace' => NULL,
        'prefix' => 'admin/computer-configurations',
        'where' => 
        array (
        ),
        'as' => 'admin.computer-configurations.destroy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.computer-configurations.requests' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/computer-configurations/requests',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ComputerConfigurationController@requests',
        'controller' => 'App\\Http\\Controllers\\Admin\\ComputerConfigurationController@requests',
        'namespace' => NULL,
        'prefix' => 'admin/computer-configurations',
        'where' => 
        array (
        ),
        'as' => 'admin.computer-configurations.requests',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.computer-configurations.requests.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/computer-configurations/requests/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ComputerConfigurationController@updateAccessoryRequest',
        'controller' => 'App\\Http\\Controllers\\Admin\\ComputerConfigurationController@updateAccessoryRequest',
        'namespace' => NULL,
        'prefix' => 'admin/computer-configurations',
        'where' => 
        array (
        ),
        'as' => 'admin.computer-configurations.requests.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.notice-board.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/notice-board',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\NoticeBoardController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\NoticeBoardController@index',
        'namespace' => NULL,
        'prefix' => 'admin/notice-board',
        'where' => 
        array (
        ),
        'as' => 'admin.notice-board.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.notice-board.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/notice-board/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\NoticeBoardController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\NoticeBoardController@store',
        'namespace' => NULL,
        'prefix' => 'admin/notice-board',
        'where' => 
        array (
        ),
        'as' => 'admin.notice-board.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.notice-board.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/notice-board/update/{notice_uid}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\NoticeBoardController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\NoticeBoardController@update',
        'namespace' => NULL,
        'prefix' => 'admin/notice-board',
        'where' => 
        array (
        ),
        'as' => 'admin.notice-board.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.notice-board.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/notice-board/delete/{notice_uid}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\NoticeBoardController@destroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\NoticeBoardController@destroy',
        'namespace' => NULL,
        'prefix' => 'admin/notice-board',
        'where' => 
        array (
        ),
        'as' => 'admin.notice-board.destroy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.launch-sheet.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/launch-sheet',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\LaunchSheetController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\LaunchSheetController@index',
        'namespace' => NULL,
        'prefix' => 'admin/launch-sheet',
        'where' => 
        array (
        ),
        'as' => 'admin.launch-sheet.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.launch-sheet.calculate' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/launch-sheet/calculate-total-launch',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\LaunchSheetController@reloadTotalLaunch',
        'controller' => 'App\\Http\\Controllers\\Admin\\LaunchSheetController@reloadTotalLaunch',
        'namespace' => NULL,
        'prefix' => 'admin/launch-sheet',
        'where' => 
        array (
        ),
        'as' => 'admin.launch-sheet.calculate',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.launchSheets.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/launch-sheet/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\LaunchSheetController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\LaunchSheetController@update',
        'namespace' => NULL,
        'prefix' => 'admin/launch-sheet',
        'where' => 
        array (
        ),
        'as' => 'admin.launchSheets.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.launch-sheet.invoice' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/launch-sheet/invoices',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\LaunchSheetController@invoices',
        'controller' => 'App\\Http\\Controllers\\Admin\\LaunchSheetController@invoices',
        'namespace' => NULL,
        'prefix' => 'admin/launch-sheet',
        'where' => 
        array (
        ),
        'as' => 'admin.launch-sheet.invoice',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.launch-sheet.createInvoice' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/launch-sheet/invoices/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\LaunchSheetController@createInvoice',
        'controller' => 'App\\Http\\Controllers\\Admin\\LaunchSheetController@createInvoice',
        'namespace' => NULL,
        'prefix' => 'admin/launch-sheet',
        'where' => 
        array (
        ),
        'as' => 'admin.launch-sheet.createInvoice',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.launch-sheet.exportPDF' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/launch-sheet/invoices/export/pdf',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\LaunchSheetController@export',
        'controller' => 'App\\Http\\Controllers\\Admin\\LaunchSheetController@export',
        'namespace' => NULL,
        'prefix' => 'admin/launch-sheet',
        'where' => 
        array (
        ),
        'as' => 'admin.launch-sheet.exportPDF',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.launch-sheet.exportExcel' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/launch-sheet/invoices/export/excel',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\LaunchSheetController@exportExcel',
        'controller' => 'App\\Http\\Controllers\\Admin\\LaunchSheetController@exportExcel',
        'namespace' => NULL,
        'prefix' => 'admin/launch-sheet',
        'where' => 
        array (
        ),
        'as' => 'admin.launch-sheet.exportExcel',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.launch-sheet.showInvoice' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/launch-sheet/invoices/show/{invoice_number}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\LaunchSheetController@showInvoice',
        'controller' => 'App\\Http\\Controllers\\Admin\\LaunchSheetController@showInvoice',
        'namespace' => NULL,
        'prefix' => 'admin/launch-sheet',
        'where' => 
        array (
        ),
        'as' => 'admin.launch-sheet.showInvoice',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.launch-sheet.provider.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/launch-sheet/providers',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\LaunchProviderController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\LaunchProviderController@index',
        'namespace' => NULL,
        'prefix' => 'admin/launch-sheet/providers',
        'where' => 
        array (
        ),
        'as' => 'admin.launch-sheet.provider.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.launch-sheet.provider.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/launch-sheet/providers/update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\LaunchProviderController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\LaunchProviderController@update',
        'namespace' => NULL,
        'prefix' => 'admin/launch-sheet/providers',
        'where' => 
        array (
        ),
        'as' => 'admin.launch-sheet.provider.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.launch-sheet.provider.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/launch-sheet/providers/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\LaunchProviderController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\LaunchProviderController@store',
        'namespace' => NULL,
        'prefix' => 'admin/launch-sheet/providers',
        'where' => 
        array (
        ),
        'as' => 'admin.launch-sheet.provider.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.launch-sheet.provider.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/launch-sheet/providers/destroy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\LaunchProviderController@destroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\LaunchProviderController@destroy',
        'namespace' => NULL,
        'prefix' => 'admin/launch-sheet/providers',
        'where' => 
        array (
        ),
        'as' => 'admin.launch-sheet.provider.destroy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'holidays.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/holidays',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'as' => 'holidays.index',
        'uses' => 'App\\Http\\Controllers\\Admin\\HolidayController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\HolidayController@index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'holidays.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/holidays/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'as' => 'holidays.create',
        'uses' => 'App\\Http\\Controllers\\Admin\\HolidayController@create',
        'controller' => 'App\\Http\\Controllers\\Admin\\HolidayController@create',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'holidays.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/holidays',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'as' => 'holidays.store',
        'uses' => 'App\\Http\\Controllers\\Admin\\HolidayController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\HolidayController@store',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'holidays.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/holidays/{holiday}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'as' => 'holidays.show',
        'uses' => 'App\\Http\\Controllers\\Admin\\HolidayController@show',
        'controller' => 'App\\Http\\Controllers\\Admin\\HolidayController@show',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'holidays.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/holidays/{holiday}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'as' => 'holidays.edit',
        'uses' => 'App\\Http\\Controllers\\Admin\\HolidayController@edit',
        'controller' => 'App\\Http\\Controllers\\Admin\\HolidayController@edit',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'holidays.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/holidays/{holiday}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'as' => 'holidays.update',
        'uses' => 'App\\Http\\Controllers\\Admin\\HolidayController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\HolidayController@update',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'holidays.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/holidays/{holiday}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'as' => 'holidays.destroy',
        'uses' => 'App\\Http\\Controllers\\Admin\\HolidayController@destroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\HolidayController@destroy',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'departments.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/departments',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\DepartmentController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\DepartmentController@index',
        'namespace' => NULL,
        'prefix' => 'admin/departments',
        'where' => 
        array (
        ),
        'as' => 'departments.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'departments.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/departments/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\DepartmentController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\DepartmentController@store',
        'namespace' => NULL,
        'prefix' => 'admin/departments',
        'where' => 
        array (
        ),
        'as' => 'departments.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'departments.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/departments/update/{roleManager}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\DepartmentController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\DepartmentController@update',
        'namespace' => NULL,
        'prefix' => 'admin/departments',
        'where' => 
        array (
        ),
        'as' => 'departments.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'departments.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/departments/destroy/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\DepartmentController@destroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\DepartmentController@destroy',
        'namespace' => NULL,
        'prefix' => 'admin/departments',
        'where' => 
        array (
        ),
        'as' => 'departments.destroy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.departments.import.bulk' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/departments/import/bulk-data',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\DepartmentController@importBulk',
        'controller' => 'App\\Http\\Controllers\\Admin\\DepartmentController@importBulk',
        'namespace' => NULL,
        'prefix' => 'admin/departments',
        'where' => 
        array (
        ),
        'as' => 'admin.departments.import.bulk',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.administration.export.template' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/administration/export/template',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\UserController@exportUserTemplate',
        'controller' => 'App\\Http\\Controllers\\UserController@exportUserTemplate',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'admin.administration.export.template',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.administration.import.bulk' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/administration/import/bulk-data',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\UserController@importBulk',
        'controller' => 'App\\Http\\Controllers\\UserController@importBulk',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'admin.administration.import.bulk',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.employees.import.bulk' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/employees/import/bulk-data',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\EmployeeController@importBulk',
        'controller' => 'App\\Http\\Controllers\\Admin\\EmployeeController@importBulk',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'admin.employees.import.bulk',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'company-policy.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/company-policy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\CompanyPolicyController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\CompanyPolicyController@index',
        'namespace' => NULL,
        'prefix' => 'admin/company-policy',
        'where' => 
        array (
        ),
        'as' => 'company-policy.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'company-policy.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/company-policy/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\CompanyPolicyController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\CompanyPolicyController@update',
        'namespace' => NULL,
        'prefix' => 'admin/company-policy',
        'where' => 
        array (
        ),
        'as' => 'company-policy.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'company-policy.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/company-policy/edit/{companyPolicy}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\CompanyPolicyController@edit',
        'controller' => 'App\\Http\\Controllers\\Admin\\CompanyPolicyController@edit',
        'namespace' => NULL,
        'prefix' => 'admin/company-policy',
        'where' => 
        array (
        ),
        'as' => 'company-policy.edit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'company-policy.update.attendanceRule' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/company-policy/update/attendance-rule',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\CompanyPolicyController@updateAttendanceRule',
        'controller' => 'App\\Http\\Controllers\\Admin\\CompanyPolicyController@updateAttendanceRule',
        'namespace' => NULL,
        'prefix' => 'admin/company-policy',
        'where' => 
        array (
        ),
        'as' => 'company-policy.update.attendanceRule',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'company-policy.update.hdar' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/company-policy/update/hdar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\CompanyPolicyController@updateHalfDayAbsentRule',
        'controller' => 'App\\Http\\Controllers\\Admin\\CompanyPolicyController@updateHalfDayAbsentRule',
        'namespace' => NULL,
        'prefix' => 'admin/company-policy',
        'where' => 
        array (
        ),
        'as' => 'company-policy.update.hdar',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'company-details.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/company-details/update/{companyDetail}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\CompanyDetailController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\CompanyDetailController@update',
        'namespace' => NULL,
        'prefix' => 'admin/company-details',
        'where' => 
        array (
        ),
        'as' => 'company-details.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'administration.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/administration/users',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\UserController@index',
        'controller' => 'App\\Http\\Controllers\\UserController@index',
        'namespace' => NULL,
        'prefix' => 'admin/administration',
        'where' => 
        array (
        ),
        'as' => 'administration.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'administration.users.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/administration/users/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\UserController@create',
        'controller' => 'App\\Http\\Controllers\\UserController@create',
        'namespace' => NULL,
        'prefix' => 'admin/administration',
        'where' => 
        array (
        ),
        'as' => 'administration.users.create',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'administration.users.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/administration/users/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\UserController@store',
        'controller' => 'App\\Http\\Controllers\\UserController@store',
        'namespace' => NULL,
        'prefix' => 'admin/administration',
        'where' => 
        array (
        ),
        'as' => 'administration.users.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.administration.findLastUsername' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/administration/users/lastUserName',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\UserController@getUserName',
        'controller' => 'App\\Http\\Controllers\\UserController@getUserName',
        'namespace' => NULL,
        'prefix' => 'admin/administration',
        'where' => 
        array (
        ),
        'as' => 'admin.administration.findLastUsername',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'administration.users.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/administration/users/edit/{user}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\UserController@edit',
        'controller' => 'App\\Http\\Controllers\\UserController@edit',
        'namespace' => NULL,
        'prefix' => 'admin/administration',
        'where' => 
        array (
        ),
        'as' => 'administration.users.edit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'administration.users.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/administration/users/update/{user}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\UserController@update',
        'controller' => 'App\\Http\\Controllers\\UserController@update',
        'namespace' => NULL,
        'prefix' => 'admin/administration',
        'where' => 
        array (
        ),
        'as' => 'administration.users.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'roles.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/roles',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\RoleManagerController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\RoleManagerController@index',
        'namespace' => NULL,
        'prefix' => 'admin/roles',
        'where' => 
        array (
        ),
        'as' => 'roles.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'roles.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/roles/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\RoleManagerController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\RoleManagerController@store',
        'namespace' => NULL,
        'prefix' => 'admin/roles',
        'where' => 
        array (
        ),
        'as' => 'roles.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'roles.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/roles/update/{role}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\RoleManagerController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\RoleManagerController@update',
        'namespace' => NULL,
        'prefix' => 'admin/roles',
        'where' => 
        array (
        ),
        'as' => 'roles.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'roles.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/roles/destroy/{role}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\RoleManagerController@destroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\RoleManagerController@destroy',
        'namespace' => NULL,
        'prefix' => 'admin/roles',
        'where' => 
        array (
        ),
        'as' => 'roles.destroy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'permissions.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/permissions',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PermissionManagerController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\PermissionManagerController@index',
        'namespace' => NULL,
        'prefix' => 'admin/permissions',
        'where' => 
        array (
        ),
        'as' => 'permissions.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'permissions.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/permissions/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PermissionManagerController@create',
        'controller' => 'App\\Http\\Controllers\\Admin\\PermissionManagerController@create',
        'namespace' => NULL,
        'prefix' => 'admin/permissions',
        'where' => 
        array (
        ),
        'as' => 'permissions.create',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'permissions.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/permissions/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PermissionManagerController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\PermissionManagerController@store',
        'namespace' => NULL,
        'prefix' => 'admin/permissions',
        'where' => 
        array (
        ),
        'as' => 'permissions.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'permissions.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/permissions/update/{permission}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PermissionManagerController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\PermissionManagerController@update',
        'namespace' => NULL,
        'prefix' => 'admin/permissions',
        'where' => 
        array (
        ),
        'as' => 'permissions.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'permissions.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/permissions/destroy/{permission}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PermissionManagerController@destroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\PermissionManagerController@destroy',
        'namespace' => NULL,
        'prefix' => 'admin/permissions',
        'where' => 
        array (
        ),
        'as' => 'permissions.destroy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'permissions.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/permissions/show/{permission}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PermissionManagerController@show',
        'controller' => 'App\\Http\\Controllers\\Admin\\PermissionManagerController@show',
        'namespace' => NULL,
        'prefix' => 'admin/permissions',
        'where' => 
        array (
        ),
        'as' => 'permissions.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'permissions.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/permissions/edit/{permission}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PermissionManagerController@edit',
        'controller' => 'App\\Http\\Controllers\\Admin\\PermissionManagerController@edit',
        'namespace' => NULL,
        'prefix' => 'admin/permissions',
        'where' => 
        array (
        ),
        'as' => 'permissions.edit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'designations.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/designations',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\EmployeeRoleController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\EmployeeRoleController@index',
        'namespace' => NULL,
        'prefix' => 'admin/designations',
        'where' => 
        array (
        ),
        'as' => 'designations.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'designations.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/designations/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\EmployeeRoleController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\EmployeeRoleController@store',
        'namespace' => NULL,
        'prefix' => 'admin/designations',
        'where' => 
        array (
        ),
        'as' => 'designations.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'designations.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/designations/update/{employeeRole}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\EmployeeRoleController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\EmployeeRoleController@update',
        'namespace' => NULL,
        'prefix' => 'admin/designations',
        'where' => 
        array (
        ),
        'as' => 'designations.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'designations.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/designations/destroy/{employeeRole}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\EmployeeRoleController@destroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\EmployeeRoleController@destroy',
        'namespace' => NULL,
        'prefix' => 'admin/designations',
        'where' => 
        array (
        ),
        'as' => 'designations.destroy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.designations.import.bulk' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/designations/import/bulk-data',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\EmployeeRoleController@importBulk',
        'controller' => 'App\\Http\\Controllers\\Admin\\EmployeeRoleController@importBulk',
        'namespace' => NULL,
        'prefix' => 'admin/designations',
        'where' => 
        array (
        ),
        'as' => 'admin.designations.import.bulk',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.employees.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/employees',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\EmployeeController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\EmployeeController@index',
        'namespace' => NULL,
        'prefix' => 'admin/employees',
        'where' => 
        array (
        ),
        'as' => 'admin.employees.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.employees.grid-view' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/employees/grid-view',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\EmployeeController@gridView',
        'controller' => 'App\\Http\\Controllers\\Admin\\EmployeeController@gridView',
        'namespace' => NULL,
        'prefix' => 'admin/employees',
        'where' => 
        array (
        ),
        'as' => 'admin.employees.grid-view',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.employees.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/employees/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\EmployeeController@create',
        'controller' => 'App\\Http\\Controllers\\Admin\\EmployeeController@create',
        'namespace' => NULL,
        'prefix' => 'admin/employees',
        'where' => 
        array (
        ),
        'as' => 'admin.employees.create',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.employees.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/employees/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\EmployeeController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\EmployeeController@store',
        'namespace' => NULL,
        'prefix' => 'admin/employees',
        'where' => 
        array (
        ),
        'as' => 'admin.employees.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.employees.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/employees/show/{employee}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\EmployeeController@show',
        'controller' => 'App\\Http\\Controllers\\Admin\\EmployeeController@show',
        'namespace' => NULL,
        'prefix' => 'admin/employees',
        'where' => 
        array (
        ),
        'as' => 'admin.employees.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.employees.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/employees/edit/{employee}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\EmployeeController@edit',
        'controller' => 'App\\Http\\Controllers\\Admin\\EmployeeController@edit',
        'namespace' => NULL,
        'prefix' => 'admin/employees',
        'where' => 
        array (
        ),
        'as' => 'admin.employees.edit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.employees.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/employees/update/{employee}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\EmployeeController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\EmployeeController@update',
        'namespace' => NULL,
        'prefix' => 'admin/employees',
        'where' => 
        array (
        ),
        'as' => 'admin.employees.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.employees.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/employees/destroy/{employee}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\EmployeeController@destroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\EmployeeController@destroy',
        'namespace' => NULL,
        'prefix' => 'admin/employees',
        'where' => 
        array (
        ),
        'as' => 'admin.employees.destroy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.employees.filter.designation' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/employees/filter/by-designation',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\EmployeeController@filterDataByDesignation',
        'controller' => 'App\\Http\\Controllers\\Admin\\EmployeeController@filterDataByDesignation',
        'namespace' => NULL,
        'prefix' => 'admin/employees',
        'where' => 
        array (
        ),
        'as' => 'admin.employees.filter.designation',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.employees.filter.department' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/employees/filter/by-department',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\EmployeeController@filterDataByDepartment',
        'controller' => 'App\\Http\\Controllers\\Admin\\EmployeeController@filterDataByDepartment',
        'namespace' => NULL,
        'prefix' => 'admin/employees',
        'where' => 
        array (
        ),
        'as' => 'admin.employees.filter.department',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.employees.filter.employeeId' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/employees/filter/by-employeeId',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\EmployeeController@filterDataByEmpId',
        'controller' => 'App\\Http\\Controllers\\Admin\\EmployeeController@filterDataByEmpId',
        'namespace' => NULL,
        'prefix' => 'admin/employees',
        'where' => 
        array (
        ),
        'as' => 'admin.employees.filter.employeeId',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.employee.update.payrollaccount' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/employees/update/payroll/{employee_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\EmployeeController@updatePayrollAccount',
        'controller' => 'App\\Http\\Controllers\\Admin\\EmployeeController@updatePayrollAccount',
        'namespace' => NULL,
        'prefix' => 'admin/employees',
        'where' => 
        array (
        ),
        'as' => 'admin.employee.update.payrollaccount',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.attendance.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/attendance',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AttendanceController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\AttendanceController@index',
        'namespace' => NULL,
        'prefix' => 'admin/attendance',
        'where' => 
        array (
        ),
        'as' => 'admin.attendance.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.attendance.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/attendance/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AttendanceController@create',
        'controller' => 'App\\Http\\Controllers\\Admin\\AttendanceController@create',
        'namespace' => NULL,
        'prefix' => 'admin/attendance',
        'where' => 
        array (
        ),
        'as' => 'admin.attendance.create',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.attendance.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/attendance/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AttendanceController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\AttendanceController@store',
        'namespace' => NULL,
        'prefix' => 'admin/attendance',
        'where' => 
        array (
        ),
        'as' => 'admin.attendance.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.attendance.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/attendance/show/{attendance}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AttendanceController@show',
        'controller' => 'App\\Http\\Controllers\\Admin\\AttendanceController@show',
        'namespace' => NULL,
        'prefix' => 'admin/attendance',
        'where' => 
        array (
        ),
        'as' => 'admin.attendance.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.attendance.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/attendance/edit/{attendance}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AttendanceController@edit',
        'controller' => 'App\\Http\\Controllers\\Admin\\AttendanceController@edit',
        'namespace' => NULL,
        'prefix' => 'admin/attendance',
        'where' => 
        array (
        ),
        'as' => 'admin.attendance.edit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.attendance.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/attendance/update/{attendance}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AttendanceController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\AttendanceController@update',
        'namespace' => NULL,
        'prefix' => 'admin/attendance',
        'where' => 
        array (
        ),
        'as' => 'admin.attendance.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.attendance.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/attendance/destroy/{attendance}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AttendanceController@destroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\AttendanceController@destroy',
        'namespace' => NULL,
        'prefix' => 'admin/attendance',
        'where' => 
        array (
        ),
        'as' => 'admin.attendance.destroy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.attendance.export' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/attendance/export',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AttendanceController@exportFile',
        'controller' => 'App\\Http\\Controllers\\Admin\\AttendanceController@exportFile',
        'namespace' => NULL,
        'prefix' => 'admin/attendance',
        'where' => 
        array (
        ),
        'as' => 'admin.attendance.export',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.attendance.getDataForChart' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/attendance/getDataForChart',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AttendanceController@getDataForChart',
        'controller' => 'App\\Http\\Controllers\\Admin\\AttendanceController@getDataForChart',
        'namespace' => NULL,
        'prefix' => 'admin/attendance',
        'where' => 
        array (
        ),
        'as' => 'admin.attendance.getDataForChart',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.attendance.seedDatabase' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/attendance/seedDatabase',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AttendanceController@seedDatabase',
        'controller' => 'App\\Http\\Controllers\\Admin\\AttendanceController@seedDatabase',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'admin.attendance.seedDatabase',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.launch.seedDatabase' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/launch-sheet/seedDatabase',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\LaunchSheetController@seedDatabase',
        'controller' => 'App\\Http\\Controllers\\Admin\\LaunchSheetController@seedDatabase',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'admin.launch.seedDatabase',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.application.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/applications',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ApplicationController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\ApplicationController@index',
        'namespace' => NULL,
        'prefix' => 'admin/applications',
        'where' => 
        array (
        ),
        'as' => 'admin.application.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.application.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/applications/show/{application}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ApplicationController@show',
        'controller' => 'App\\Http\\Controllers\\Admin\\ApplicationController@show',
        'namespace' => NULL,
        'prefix' => 'admin/applications',
        'where' => 
        array (
        ),
        'as' => 'admin.application.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.application.update.manager' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/applications/update/{application_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ApplicationController@updateByManager',
        'controller' => 'App\\Http\\Controllers\\Admin\\ApplicationController@updateByManager',
        'namespace' => NULL,
        'prefix' => 'admin/applications',
        'where' => 
        array (
        ),
        'as' => 'admin.application.update.manager',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.application.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/applications/destroy/{application}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ApplicationController@destroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\ApplicationController@destroy',
        'namespace' => NULL,
        'prefix' => 'admin/applications',
        'where' => 
        array (
        ),
        'as' => 'admin.application.destroy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.application.exportPDF' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/applications/export/pdf/{application_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ApplicationController@createPdf',
        'controller' => 'App\\Http\\Controllers\\Admin\\ApplicationController@createPdf',
        'namespace' => NULL,
        'prefix' => 'admin/applications',
        'where' => 
        array (
        ),
        'as' => 'admin.application.exportPDF',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.reports.custom-daily-report.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/custom-reports/daily-sales',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\DailySaleController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\DailySaleController@index',
        'namespace' => NULL,
        'prefix' => 'admin/custom-reports/daily-sales',
        'where' => 
        array (
        ),
        'as' => 'admin.reports.custom-daily-report.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.reports.custom-daily-report.import' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/custom-reports/daily-sales/import',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\DailySaleController@importBulk',
        'controller' => 'App\\Http\\Controllers\\Admin\\DailySaleController@importBulk',
        'namespace' => NULL,
        'prefix' => 'admin/custom-reports/daily-sales',
        'where' => 
        array (
        ),
        'as' => 'admin.reports.custom-daily-report.import',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.reports.custom-daily-report.export' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/custom-reports/daily-sales/export',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\DailySaleController@export',
        'controller' => 'App\\Http\\Controllers\\Admin\\DailySaleController@export',
        'namespace' => NULL,
        'prefix' => 'admin/custom-reports/daily-sales',
        'where' => 
        array (
        ),
        'as' => 'admin.reports.custom-daily-report.export',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.reports.custom-daily-report.getDataForChart' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/custom-reports/daily-sales/get-data',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\DailySaleController@getDataForChart',
        'controller' => 'App\\Http\\Controllers\\Admin\\DailySaleController@getDataForChart',
        'namespace' => NULL,
        'prefix' => 'admin/custom-reports/daily-sales',
        'where' => 
        array (
        ),
        'as' => 'admin.reports.custom-daily-report.getDataForChart',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.reports.custom-weekly-report.generateReport' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/custom-reports/weekly-sales/generate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\WeeklyReportController@generate',
        'controller' => 'App\\Http\\Controllers\\Admin\\WeeklyReportController@generate',
        'namespace' => NULL,
        'prefix' => 'admin/custom-reports/weekly-sales',
        'where' => 
        array (
        ),
        'as' => 'admin.reports.custom-weekly-report.generateReport',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.reports.custom-weekly-report.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/custom-reports/weekly-sales/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\WeeklyReportController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\WeeklyReportController@store',
        'namespace' => NULL,
        'prefix' => 'admin/custom-reports/weekly-sales',
        'where' => 
        array (
        ),
        'as' => 'admin.reports.custom-weekly-report.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.reports.custom-weekly-report.download' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/custom-reports/weekly-sales/donwload',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\WeeklyReportController@download',
        'controller' => 'App\\Http\\Controllers\\Admin\\WeeklyReportController@download',
        'namespace' => NULL,
        'prefix' => 'admin/custom-reports/weekly-sales',
        'where' => 
        array (
        ),
        'as' => 'admin.reports.custom-weekly-report.download',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.reports.custom-weekly-report.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/custom-reports/weekly-sales/update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\WeeklyReportController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\WeeklyReportController@update',
        'namespace' => NULL,
        'prefix' => 'admin/custom-reports/weekly-sales',
        'where' => 
        array (
        ),
        'as' => 'admin.reports.custom-weekly-report.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.reports.custom-weekly-report.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/custom-reports/weekly-sales/destroy/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\WeeklyReportController@destroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\WeeklyReportController@destroy',
        'namespace' => NULL,
        'prefix' => 'admin/custom-reports/weekly-sales',
        'where' => 
        array (
        ),
        'as' => 'admin.reports.custom-weekly-report.destroy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.reports.custom-weekly-report.view.combined.pdf' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/custom-reports/weekly-sales/view/combined/pdf',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\WeeklyReportController@viewCombinedPdf',
        'controller' => 'App\\Http\\Controllers\\Admin\\WeeklyReportController@viewCombinedPdf',
        'namespace' => NULL,
        'prefix' => 'admin/custom-reports/weekly-sales',
        'where' => 
        array (
        ),
        'as' => 'admin.reports.custom-weekly-report.view.combined.pdf',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.reports.custom-weekly-report.download.pdf' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/custom-reports/weekly-sales/download/pdf/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\WeeklyReportController@downloadPdf',
        'controller' => 'App\\Http\\Controllers\\Admin\\WeeklyReportController@downloadPdf',
        'namespace' => NULL,
        'prefix' => 'admin/custom-reports/weekly-sales',
        'where' => 
        array (
        ),
        'as' => 'admin.reports.custom-weekly-report.download.pdf',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.reports.custom-weekly-report.generateAll' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/custom-reports/weekly-sales/generate/all',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\WeeklyReportController@generateAllReport',
        'controller' => 'App\\Http\\Controllers\\Admin\\WeeklyReportController@generateAllReport',
        'namespace' => NULL,
        'prefix' => 'admin/custom-reports/weekly-sales',
        'where' => 
        array (
        ),
        'as' => 'admin.reports.custom-weekly-report.generateAll',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.reports.custom-weekly-report.downloadPdfReport' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/custom-reports/weekly-sales/download/pdf-report/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\WeeklyReportController@downloadPdfReport',
        'controller' => 'App\\Http\\Controllers\\Admin\\WeeklyReportController@downloadPdfReport',
        'namespace' => NULL,
        'prefix' => 'admin/custom-reports/weekly-sales',
        'where' => 
        array (
        ),
        'as' => 'admin.reports.custom-weekly-report.downloadPdfReport',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.reports.custom-weekly-report.downloadCombinedReport' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/custom-reports/weekly-sales/download/all/combined',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\WeeklyReportController@downloadCombinedReport',
        'controller' => 'App\\Http\\Controllers\\Admin\\WeeklyReportController@downloadCombinedReport',
        'namespace' => NULL,
        'prefix' => 'admin/custom-reports/weekly-sales',
        'where' => 
        array (
        ),
        'as' => 'admin.reports.custom-weekly-report.downloadCombinedReport',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.reports.pdf.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/custom-reports/pdfs',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PdfReportController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\PdfReportController@index',
        'namespace' => NULL,
        'prefix' => 'admin/custom-reports/pdfs',
        'where' => 
        array (
        ),
        'as' => 'admin.reports.pdf.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.reports.pdf.download' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/custom-reports/pdfs/download',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PdfReportController@download',
        'controller' => 'App\\Http\\Controllers\\Admin\\PdfReportController@download',
        'namespace' => NULL,
        'prefix' => 'admin/custom-reports/pdfs',
        'where' => 
        array (
        ),
        'as' => 'admin.reports.pdf.download',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.reports.pdf.view' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/custom-reports/pdfs/view/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PdfReportController@view',
        'controller' => 'App\\Http\\Controllers\\Admin\\PdfReportController@view',
        'namespace' => NULL,
        'prefix' => 'admin/custom-reports/pdfs',
        'where' => 
        array (
        ),
        'as' => 'admin.reports.pdf.view',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.reports.pdf.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/custom-reports/pdfs/destroy/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PdfReportController@destroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\PdfReportController@destroy',
        'namespace' => NULL,
        'prefix' => 'admin/custom-reports/pdfs',
        'where' => 
        array (
        ),
        'as' => 'admin.reports.pdf.destroy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.reports.pdf.downloadAll' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/custom-reports/pdfs/download/all',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PdfReportController@downloadAll',
        'controller' => 'App\\Http\\Controllers\\Admin\\PdfReportController@downloadAll',
        'namespace' => NULL,
        'prefix' => 'admin/custom-reports/pdfs',
        'where' => 
        array (
        ),
        'as' => 'admin.reports.pdf.downloadAll',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.reports.pdf.destroy.allReport' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/custom-reports/pdfs/empty-database',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PdfReportController@deleteAllReport',
        'controller' => 'App\\Http\\Controllers\\Admin\\PdfReportController@deleteAllReport',
        'namespace' => NULL,
        'prefix' => 'admin/custom-reports/pdfs',
        'where' => 
        array (
        ),
        'as' => 'admin.reports.pdf.destroy.allReport',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.reports.custom-weekly-report.generate.blank' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/custom-reports/choose-template',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ClientWeeklyReportController@getReportTheme',
        'controller' => 'App\\Http\\Controllers\\Admin\\ClientWeeklyReportController@getReportTheme',
        'namespace' => NULL,
        'prefix' => 'admin/custom-reports',
        'where' => 
        array (
        ),
        'as' => 'admin.reports.custom-weekly-report.generate.blank',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.reports.custom-weekly-report.generate.single' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/custom-reports/generate/single-account',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ClientWeeklyReportController@generate',
        'controller' => 'App\\Http\\Controllers\\Admin\\ClientWeeklyReportController@generate',
        'namespace' => NULL,
        'prefix' => 'admin/custom-reports',
        'where' => 
        array (
        ),
        'as' => 'admin.reports.custom-weekly-report.generate.single',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.reports.custom-weekly-report.generate.multiple' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/custom-reports/generate/multiple-account',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ClientWeeklyReportController@generateMultiple',
        'controller' => 'App\\Http\\Controllers\\Admin\\ClientWeeklyReportController@generateMultiple',
        'namespace' => NULL,
        'prefix' => 'admin/custom-reports',
        'where' => 
        array (
        ),
        'as' => 'admin.reports.custom-weekly-report.generate.multiple',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.reports.custom-weekly-report.generate.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/custom-reports/generate/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ClientWeeklyReportController@generateStore',
        'controller' => 'App\\Http\\Controllers\\Admin\\ClientWeeklyReportController@generateStore',
        'namespace' => NULL,
        'prefix' => 'admin/custom-reports',
        'where' => 
        array (
        ),
        'as' => 'admin.reports.custom-weekly-report.generate.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.reports.custom-weekly-report.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/custom-reports/show/{report_number}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ClientWeeklyReportController@show',
        'controller' => 'App\\Http\\Controllers\\Admin\\ClientWeeklyReportController@show',
        'namespace' => NULL,
        'prefix' => 'admin/custom-reports',
        'where' => 
        array (
        ),
        'as' => 'admin.reports.custom-weekly-report.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.reports.custom-weekly-report.update.location' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/custom-reports/update/location',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ClientWeeklyReportController@updateLocation',
        'controller' => 'App\\Http\\Controllers\\Admin\\ClientWeeklyReportController@updateLocation',
        'namespace' => NULL,
        'prefix' => 'admin/custom-reports',
        'where' => 
        array (
        ),
        'as' => 'admin.reports.custom-weekly-report.update.location',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.reports.custom-weekly-report.update.amazon-us-sales' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/custom-reports/update/amazon-us-sales/{report_number}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ClientWeeklyReportController@updateAmzUsSales',
        'controller' => 'App\\Http\\Controllers\\Admin\\ClientWeeklyReportController@updateAmzUsSales',
        'namespace' => NULL,
        'prefix' => 'admin/custom-reports',
        'where' => 
        array (
        ),
        'as' => 'admin.reports.custom-weekly-report.update.amazon-us-sales',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.reports.custom-weekly-report.update.amazon-uk-sales' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/custom-reports/update/amazon-ca-sales/{report_number}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ClientWeeklyReportController@updateAmzCaSales',
        'controller' => 'App\\Http\\Controllers\\Admin\\ClientWeeklyReportController@updateAmzCaSales',
        'namespace' => NULL,
        'prefix' => 'admin/custom-reports',
        'where' => 
        array (
        ),
        'as' => 'admin.reports.custom-weekly-report.update.amazon-uk-sales',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.reports.custom-weekly-report.update.walmart-sales' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/custom-reports/update/walmart-sales/{report_number}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ClientWeeklyReportController@updateWalmartSales',
        'controller' => 'App\\Http\\Controllers\\Admin\\ClientWeeklyReportController@updateWalmartSales',
        'namespace' => NULL,
        'prefix' => 'admin/custom-reports',
        'where' => 
        array (
        ),
        'as' => 'admin.reports.custom-weekly-report.update.walmart-sales',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.reports.custom-weekly-report.edit.meeting-notes' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/custom-reports/edit/meeting-notes/{report_number}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ClientWeeklyReportController@editMeetingNotes',
        'controller' => 'App\\Http\\Controllers\\Admin\\ClientWeeklyReportController@editMeetingNotes',
        'namespace' => NULL,
        'prefix' => 'admin/custom-reports',
        'where' => 
        array (
        ),
        'as' => 'admin.reports.custom-weekly-report.edit.meeting-notes',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.reports.custom-weekly-report.update.meeting-notes' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/custom-reports/update/meeting-notes/{report_number}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ClientWeeklyReportController@updateMeetingNotes',
        'controller' => 'App\\Http\\Controllers\\Admin\\ClientWeeklyReportController@updateMeetingNotes',
        'namespace' => NULL,
        'prefix' => 'admin/custom-reports',
        'where' => 
        array (
        ),
        'as' => 'admin.reports.custom-weekly-report.update.meeting-notes',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.reports.custom-weekly-report.edit.weekly-tasks' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/custom-reports/edit/weekly-tasks/{report_number}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ClientWeeklyReportController@editWeeklyReportTasks',
        'controller' => 'App\\Http\\Controllers\\Admin\\ClientWeeklyReportController@editWeeklyReportTasks',
        'namespace' => NULL,
        'prefix' => 'admin/custom-reports',
        'where' => 
        array (
        ),
        'as' => 'admin.reports.custom-weekly-report.edit.weekly-tasks',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.reports.custom-weekly-report.update.weekly-tasks' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/custom-reports/update/weekly-tasks/{report_number}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ClientWeeklyReportController@updateWeeklyReportTasks',
        'controller' => 'App\\Http\\Controllers\\Admin\\ClientWeeklyReportController@updateWeeklyReportTasks',
        'namespace' => NULL,
        'prefix' => 'admin/custom-reports',
        'where' => 
        array (
        ),
        'as' => 'admin.reports.custom-weekly-report.update.weekly-tasks',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.reports.custom-weekly-report.export.pdf' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/custom-reports/export/pdf/{report_number}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ClientWeeklyReportController@exportPdf',
        'controller' => 'App\\Http\\Controllers\\Admin\\ClientWeeklyReportController@exportPdf',
        'namespace' => NULL,
        'prefix' => 'admin/custom-reports',
        'where' => 
        array (
        ),
        'as' => 'admin.reports.custom-weekly-report.export.pdf',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.reports.custom-weekly-report.graphdata' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/custom-reports/graph-data/{market}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ClientWeeklyReportController@graphData',
        'controller' => 'App\\Http\\Controllers\\Admin\\ClientWeeklyReportController@graphData',
        'namespace' => NULL,
        'prefix' => 'admin/custom-reports',
        'where' => 
        array (
        ),
        'as' => 'admin.reports.custom-weekly-report.graphdata',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.reports.custom-weekly-report.reset' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/custom-reports/reset/report-form',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ClientWeeklyReportController@resetForm',
        'controller' => 'App\\Http\\Controllers\\Admin\\ClientWeeklyReportController@resetForm',
        'namespace' => NULL,
        'prefix' => 'admin/custom-reports',
        'where' => 
        array (
        ),
        'as' => 'admin.reports.custom-weekly-report.reset',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.reports.custom-monthly-report.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/custom-reports/monthly',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ClientWeeklyReportController@viewMonthlySales',
        'controller' => 'App\\Http\\Controllers\\Admin\\ClientWeeklyReportController@viewMonthlySales',
        'namespace' => NULL,
        'prefix' => 'admin/custom-reports',
        'where' => 
        array (
        ),
        'as' => 'admin.reports.custom-monthly-report.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.tasks.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/tasks',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\TaskSubmissionController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\TaskSubmissionController@index',
        'namespace' => NULL,
        'prefix' => 'admin/tasks',
        'where' => 
        array (
        ),
        'as' => 'admin.tasks.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.tasks.submissions.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/tasks/show/{taskSubmissionDate}/{employeeId}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\TaskSubmissionController@show',
        'controller' => 'App\\Http\\Controllers\\Admin\\TaskSubmissionController@show',
        'namespace' => NULL,
        'prefix' => 'admin/tasks',
        'where' => 
        array (
        ),
        'as' => 'admin.tasks.submissions.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.tasks.getbydesignation' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/tasks/getbydesignation/{designation}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\TaskSubmissionController@getByDesignation',
        'controller' => 'App\\Http\\Controllers\\Admin\\TaskSubmissionController@getByDesignation',
        'namespace' => NULL,
        'prefix' => 'admin/tasks',
        'where' => 
        array (
        ),
        'as' => 'admin.tasks.getbydesignation',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.tasks.getbydate' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/tasks/getbydate/{date}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\TaskSubmissionController@getByDate',
        'controller' => 'App\\Http\\Controllers\\Admin\\TaskSubmissionController@getByDate',
        'namespace' => NULL,
        'prefix' => 'admin/tasks',
        'where' => 
        array (
        ),
        'as' => 'admin.tasks.getbydate',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.tasks.forms.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/tasks/forms',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\TaskFormController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\TaskFormController@index',
        'namespace' => NULL,
        'prefix' => 'admin/tasks',
        'where' => 
        array (
        ),
        'as' => 'admin.tasks.forms.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.tasks.forms.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/tasks/forms/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\TaskFormController@create',
        'controller' => 'App\\Http\\Controllers\\Admin\\TaskFormController@create',
        'namespace' => NULL,
        'prefix' => 'admin/tasks',
        'where' => 
        array (
        ),
        'as' => 'admin.tasks.forms.create',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.tasks.forms.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/tasks/forms/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\TaskFormController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\TaskFormController@store',
        'namespace' => NULL,
        'prefix' => 'admin/tasks',
        'where' => 
        array (
        ),
        'as' => 'admin.tasks.forms.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.tasks.forms.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/tasks/forms/show/{taskForm}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\TaskFormController@show',
        'controller' => 'App\\Http\\Controllers\\Admin\\TaskFormController@show',
        'namespace' => NULL,
        'prefix' => 'admin/tasks',
        'where' => 
        array (
        ),
        'as' => 'admin.tasks.forms.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.tasks.forms.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/tasks/forms/edit/{taskForm}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\TaskFormController@edit',
        'controller' => 'App\\Http\\Controllers\\Admin\\TaskFormController@edit',
        'namespace' => NULL,
        'prefix' => 'admin/tasks',
        'where' => 
        array (
        ),
        'as' => 'admin.tasks.forms.edit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.tasks.forms.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/tasks/forms/update/{taskForm}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\TaskFormController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\TaskFormController@update',
        'namespace' => NULL,
        'prefix' => 'admin/tasks',
        'where' => 
        array (
        ),
        'as' => 'admin.tasks.forms.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.tasks.forms.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/tasks/forms/destroy/{taskForm}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\TaskFormController@destroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\TaskFormController@destroy',
        'namespace' => NULL,
        'prefix' => 'admin/tasks',
        'where' => 
        array (
        ),
        'as' => 'admin.tasks.forms.destroy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.client-accounts.assign' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/client-accounts/assign',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ClientAccountController@assignAccountManager',
        'controller' => 'App\\Http\\Controllers\\Admin\\ClientAccountController@assignAccountManager',
        'namespace' => NULL,
        'prefix' => 'admin/client-accounts',
        'where' => 
        array (
        ),
        'as' => 'admin.client-accounts.assign',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.client-accounts.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/client-accounts',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ClientAccountController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\ClientAccountController@index',
        'namespace' => NULL,
        'prefix' => 'admin/client-accounts',
        'where' => 
        array (
        ),
        'as' => 'admin.client-accounts.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.client-accounts.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/client-accounts/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ClientAccountController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\ClientAccountController@store',
        'namespace' => NULL,
        'prefix' => 'admin/client-accounts',
        'where' => 
        array (
        ),
        'as' => 'admin.client-accounts.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.client-accounts.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/client-accounts/update/{clientAccount}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ClientAccountController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\ClientAccountController@update',
        'namespace' => NULL,
        'prefix' => 'admin/client-accounts',
        'where' => 
        array (
        ),
        'as' => 'admin.client-accounts.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.client-accounts.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/client-accounts/destroy/{clientAccount}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ClientAccountController@destroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\ClientAccountController@destroy',
        'namespace' => NULL,
        'prefix' => 'admin/client-accounts',
        'where' => 
        array (
        ),
        'as' => 'admin.client-accounts.destroy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.client-accounts.import.bulk-accounts' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/client-accounts/import/bulk-accounts',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ClientAccountController@importBulkAccounts',
        'controller' => 'App\\Http\\Controllers\\Admin\\ClientAccountController@importBulkAccounts',
        'namespace' => NULL,
        'prefix' => 'admin/client-accounts',
        'where' => 
        array (
        ),
        'as' => 'admin.client-accounts.import.bulk-accounts',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.client-accounts.export.bulk-accounts-template' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/client-accounts/export/bulk-accounts-template',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ClientAccountController@exportBulkAccountsTemplate',
        'controller' => 'App\\Http\\Controllers\\Admin\\ClientAccountController@exportBulkAccountsTemplate',
        'namespace' => NULL,
        'prefix' => 'admin/client-accounts',
        'where' => 
        array (
        ),
        'as' => 'admin.client-accounts.export.bulk-accounts-template',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.payroll.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/payroll',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PayrollAccountController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\PayrollAccountController@index',
        'namespace' => NULL,
        'prefix' => 'admin/payroll',
        'where' => 
        array (
        ),
        'as' => 'admin.payroll.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.payroll.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/payroll/show/{payroll}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PayrollAccountController@show',
        'controller' => 'App\\Http\\Controllers\\Admin\\PayrollAccountController@show',
        'namespace' => NULL,
        'prefix' => 'admin/payroll',
        'where' => 
        array (
        ),
        'as' => 'admin.payroll.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.payroll.generate' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/payroll/generate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PayrollAccountController@generatePayroll',
        'controller' => 'App\\Http\\Controllers\\Admin\\PayrollAccountController@generatePayroll',
        'namespace' => NULL,
        'prefix' => 'admin/payroll',
        'where' => 
        array (
        ),
        'as' => 'admin.payroll.generate',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.payroll.downloadPdf' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/payroll/download/pdf',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PayrollAccountController@downloadPayrollPdf',
        'controller' => 'App\\Http\\Controllers\\Admin\\PayrollAccountController@downloadPayrollPdf',
        'namespace' => NULL,
        'prefix' => 'admin/payroll',
        'where' => 
        array (
        ),
        'as' => 'admin.payroll.downloadPdf',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.payroll.downloadExcel' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/payroll/download/excel',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\PayrollAccountController@downloadPayrollExcel',
        'controller' => 'App\\Http\\Controllers\\Admin\\PayrollAccountController@downloadPayrollExcel',
        'namespace' => NULL,
        'prefix' => 'admin/payroll',
        'where' => 
        array (
        ),
        'as' => 'admin.payroll.downloadExcel',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.invoice-management.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/invoice-management',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\InvoiceController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\InvoiceController@index',
        'namespace' => NULL,
        'prefix' => 'admin/invoice-management',
        'where' => 
        array (
        ),
        'as' => 'admin.invoice-management.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.invoice-management.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/invoice-management/show/{invoice}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\InvoiceController@show',
        'controller' => 'App\\Http\\Controllers\\Admin\\InvoiceController@show',
        'namespace' => NULL,
        'prefix' => 'admin/invoice-management',
        'where' => 
        array (
        ),
        'as' => 'admin.invoice-management.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.invoice-management.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/invoice-management/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\InvoiceController@create',
        'controller' => 'App\\Http\\Controllers\\Admin\\InvoiceController@create',
        'namespace' => NULL,
        'prefix' => 'admin/invoice-management',
        'where' => 
        array (
        ),
        'as' => 'admin.invoice-management.create',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.invoice-management.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/invoice-management/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\InvoiceController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\InvoiceController@store',
        'namespace' => NULL,
        'prefix' => 'admin/invoice-management',
        'where' => 
        array (
        ),
        'as' => 'admin.invoice-management.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.invoice-management.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/invoice-management/edit/{invoice}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\InvoiceController@edit',
        'controller' => 'App\\Http\\Controllers\\Admin\\InvoiceController@edit',
        'namespace' => NULL,
        'prefix' => 'admin/invoice-management',
        'where' => 
        array (
        ),
        'as' => 'admin.invoice-management.edit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.invoice-management.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/invoice-management/update/{invoice}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\InvoiceController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\InvoiceController@update',
        'namespace' => NULL,
        'prefix' => 'admin/invoice-management',
        'where' => 
        array (
        ),
        'as' => 'admin.invoice-management.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.invoice-management.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/invoice-management/destroy/{invoice}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\InvoiceController@destroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\InvoiceController@destroy',
        'namespace' => NULL,
        'prefix' => 'admin/invoice-management',
        'where' => 
        array (
        ),
        'as' => 'admin.invoice-management.destroy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.invoice-management.downloadPdf' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/invoice-management/download/pdf/{invoice}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\InvoiceController@downloadInvoicePdf',
        'controller' => 'App\\Http\\Controllers\\Admin\\InvoiceController@downloadInvoicePdf',
        'namespace' => NULL,
        'prefix' => 'admin/invoice-management',
        'where' => 
        array (
        ),
        'as' => 'admin.invoice-management.downloadPdf',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'employee.dashboard' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'employee/dashboard',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\PageController@empDashboard',
        'controller' => 'App\\Http\\Controllers\\PageController@empDashboard',
        'namespace' => NULL,
        'prefix' => '/employee',
        'where' => 
        array (
        ),
        'as' => 'employee.dashboard',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'employee.profile' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'employee/profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\PageController@empProfile',
        'controller' => 'App\\Http\\Controllers\\PageController@empProfile',
        'namespace' => NULL,
        'prefix' => '/employee',
        'where' => 
        array (
        ),
        'as' => 'employee.profile',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'employee.profile.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'employee/profile/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\PageController@empProfileUpdate',
        'controller' => 'App\\Http\\Controllers\\PageController@empProfileUpdate',
        'namespace' => NULL,
        'prefix' => '/employee',
        'where' => 
        array (
        ),
        'as' => 'employee.profile.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'employee.computer-configurations.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'employee/computer-configurations',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Employee\\PcConfigurationController@index',
        'controller' => 'App\\Http\\Controllers\\Employee\\PcConfigurationController@index',
        'namespace' => NULL,
        'prefix' => 'employee/computer-configurations',
        'where' => 
        array (
        ),
        'as' => 'employee.computer-configurations.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'employee.computer-configurations.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'employee/computer-configurations/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Employee\\PcConfigurationController@create',
        'controller' => 'App\\Http\\Controllers\\Employee\\PcConfigurationController@create',
        'namespace' => NULL,
        'prefix' => 'employee/computer-configurations',
        'where' => 
        array (
        ),
        'as' => 'employee.computer-configurations.create',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'employee.computer-configurations.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'employee/computer-configurations/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Employee\\PcConfigurationController@store',
        'controller' => 'App\\Http\\Controllers\\Employee\\PcConfigurationController@store',
        'namespace' => NULL,
        'prefix' => 'employee/computer-configurations',
        'where' => 
        array (
        ),
        'as' => 'employee.computer-configurations.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'employee.computer-configurations.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'employee/computer-configurations/edit/{pcConfiguration}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Employee\\PcConfigurationController@edit',
        'controller' => 'App\\Http\\Controllers\\Employee\\PcConfigurationController@edit',
        'namespace' => NULL,
        'prefix' => 'employee/computer-configurations',
        'where' => 
        array (
        ),
        'as' => 'employee.computer-configurations.edit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'employee.computer-configurations.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'employee/computer-configurations/update/{pcConfiguration}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Employee\\PcConfigurationController@update',
        'controller' => 'App\\Http\\Controllers\\Employee\\PcConfigurationController@update',
        'namespace' => NULL,
        'prefix' => 'employee/computer-configurations',
        'where' => 
        array (
        ),
        'as' => 'employee.computer-configurations.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'employee.computer-configurations.request-accessories' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'employee/computer-configurations/request/accessories',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Employee\\PcConfigurationController@requestAccessories',
        'controller' => 'App\\Http\\Controllers\\Employee\\PcConfigurationController@requestAccessories',
        'namespace' => NULL,
        'prefix' => 'employee/computer-configurations',
        'where' => 
        array (
        ),
        'as' => 'employee.computer-configurations.request-accessories',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'employee.computer-configurations.request-accessories.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'employee/computer-configurations/request/accessories/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Employee\\PcConfigurationController@requestAccessoriesStore',
        'controller' => 'App\\Http\\Controllers\\Employee\\PcConfigurationController@requestAccessoriesStore',
        'namespace' => NULL,
        'prefix' => 'employee/computer-configurations',
        'where' => 
        array (
        ),
        'as' => 'employee.computer-configurations.request-accessories.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'employee.attendance' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'employee/attendance',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Employee\\AttendanceController@empAttendance',
        'controller' => 'App\\Http\\Controllers\\Employee\\AttendanceController@empAttendance',
        'namespace' => NULL,
        'prefix' => 'employee/attendance',
        'where' => 
        array (
        ),
        'as' => 'employee.attendance',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'employee.attendance.filterData' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'employee/attendance/filterData',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Employee\\AttendanceController@filterAttendanceData',
        'controller' => 'App\\Http\\Controllers\\Employee\\AttendanceController@filterAttendanceData',
        'namespace' => NULL,
        'prefix' => 'employee/attendance',
        'where' => 
        array (
        ),
        'as' => 'employee.attendance.filterData',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'employee.attendance.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'employee/attendance/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Employee\\AttendanceController@empAttendanceStore',
        'controller' => 'App\\Http\\Controllers\\Employee\\AttendanceController@empAttendanceStore',
        'namespace' => NULL,
        'prefix' => 'employee/attendance',
        'where' => 
        array (
        ),
        'as' => 'employee.attendance.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'employee.attendance.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'employee/attendance/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Employee\\AttendanceController@empAttendanceUpdate',
        'controller' => 'App\\Http\\Controllers\\Employee\\AttendanceController@empAttendanceUpdate',
        'namespace' => NULL,
        'prefix' => 'employee/attendance',
        'where' => 
        array (
        ),
        'as' => 'employee.attendance.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'employee.attendance.getall' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'employee/attendance/getall/{attendance}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Employee\\AttendanceController@empAttendanceGetAll',
        'controller' => 'App\\Http\\Controllers\\Employee\\AttendanceController@empAttendanceGetAll',
        'namespace' => NULL,
        'prefix' => 'employee/attendance',
        'where' => 
        array (
        ),
        'as' => 'employee.attendance.getall',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'employee.attendance.bystatus' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'employee/attendance/status/{status}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Employee\\AttendanceController@empAttendanceGetByStatus',
        'controller' => 'App\\Http\\Controllers\\Employee\\AttendanceController@empAttendanceGetByStatus',
        'namespace' => NULL,
        'prefix' => 'employee/attendance',
        'where' => 
        array (
        ),
        'as' => 'employee.attendance.bystatus',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'employee.attendance.bymonth' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'employee/attendance/getByMonth/{month}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Employee\\AttendanceController@empAttendanceGetByMonth',
        'controller' => 'App\\Http\\Controllers\\Employee\\AttendanceController@empAttendanceGetByMonth',
        'namespace' => NULL,
        'prefix' => 'employee/attendance',
        'where' => 
        array (
        ),
        'as' => 'employee.attendance.bymonth',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'employee.attendance.getlaunchsheet' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'employee/attendance/getlaunchsheet/{attendance}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Employee\\AttendanceController@empAttendanceGetLaunchSheet',
        'controller' => 'App\\Http\\Controllers\\Employee\\AttendanceController@empAttendanceGetLaunchSheet',
        'namespace' => NULL,
        'prefix' => 'employee/attendance',
        'where' => 
        array (
        ),
        'as' => 'employee.attendance.getlaunchsheet',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'employee.attendance.break.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'employee/attendance/break/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Employee\\AttendanceController@empAttendanceBreakStore',
        'controller' => 'App\\Http\\Controllers\\Employee\\AttendanceController@empAttendanceBreakStore',
        'namespace' => NULL,
        'prefix' => 'employee/attendance',
        'where' => 
        array (
        ),
        'as' => 'employee.attendance.break.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'employee.attendance.break.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'employee/attendance/break/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Employee\\AttendanceController@empAttendanceBreakUpdate',
        'controller' => 'App\\Http\\Controllers\\Employee\\AttendanceController@empAttendanceBreakUpdate',
        'namespace' => NULL,
        'prefix' => 'employee/attendance',
        'where' => 
        array (
        ),
        'as' => 'employee.attendance.break.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'employee.launch-sheet.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'employee/launch-management',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Employee\\LaunchManagementController@empLaunchManagement',
        'controller' => 'App\\Http\\Controllers\\Employee\\LaunchManagementController@empLaunchManagement',
        'namespace' => NULL,
        'prefix' => 'employee/launch-management',
        'where' => 
        array (
        ),
        'as' => 'employee.launch-sheet.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'employee.launch-management.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'employee/launch-management/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Employee\\LaunchManagementController@empLaunchManagementStore',
        'controller' => 'App\\Http\\Controllers\\Employee\\LaunchManagementController@empLaunchManagementStore',
        'namespace' => NULL,
        'prefix' => '/employee',
        'where' => 
        array (
        ),
        'as' => 'employee.launch-management.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'employee.applications' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'employee/applications',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Employee\\ApplicationController@index',
        'controller' => 'App\\Http\\Controllers\\Employee\\ApplicationController@index',
        'namespace' => NULL,
        'prefix' => 'employee/applications',
        'where' => 
        array (
        ),
        'as' => 'employee.applications',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'employee.applications.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'employee/applications/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Employee\\ApplicationController@create',
        'controller' => 'App\\Http\\Controllers\\Employee\\ApplicationController@create',
        'namespace' => NULL,
        'prefix' => 'employee/applications',
        'where' => 
        array (
        ),
        'as' => 'employee.applications.create',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'employee.applications.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'employee/applications/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Employee\\ApplicationController@store',
        'controller' => 'App\\Http\\Controllers\\Employee\\ApplicationController@store',
        'namespace' => NULL,
        'prefix' => 'employee/applications',
        'where' => 
        array (
        ),
        'as' => 'employee.applications.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'employee.applications.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'employee/applications/edit/{application}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Employee\\ApplicationController@edit',
        'controller' => 'App\\Http\\Controllers\\Employee\\ApplicationController@edit',
        'namespace' => NULL,
        'prefix' => 'employee/applications',
        'where' => 
        array (
        ),
        'as' => 'employee.applications.edit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'employee.applications.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'employee/applications/update/{application}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Employee\\ApplicationController@update',
        'controller' => 'App\\Http\\Controllers\\Employee\\ApplicationController@update',
        'namespace' => NULL,
        'prefix' => 'employee/applications',
        'where' => 
        array (
        ),
        'as' => 'employee.applications.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'employee.applications.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'employee/applications/destroy/{application}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Employee\\ApplicationController@destroy',
        'controller' => 'App\\Http\\Controllers\\Employee\\ApplicationController@destroy',
        'namespace' => NULL,
        'prefix' => 'employee/applications',
        'where' => 
        array (
        ),
        'as' => 'employee.applications.destroy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'employee.applications.getbytype' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'employee/applications/getByType/{type}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Employee\\LeaveManagementController@empLeaveGetByType',
        'controller' => 'App\\Http\\Controllers\\Employee\\LeaveManagementController@empLeaveGetByType',
        'namespace' => NULL,
        'prefix' => 'employee/applications',
        'where' => 
        array (
        ),
        'as' => 'employee.applications.getbytype',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'employee.applications.downloadPdf' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'employee/applications/download/pdf/{leave}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Employee\\ApplicationController@downloadPdf',
        'controller' => 'App\\Http\\Controllers\\Employee\\ApplicationController@downloadPdf',
        'namespace' => NULL,
        'prefix' => 'employee/applications',
        'where' => 
        array (
        ),
        'as' => 'employee.applications.downloadPdf',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'employee.applications.leave-applicaitons' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'employee/applications/leave-applications',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Employee\\ApplicationController@getLeaveApplications',
        'controller' => 'App\\Http\\Controllers\\Employee\\ApplicationController@getLeaveApplications',
        'namespace' => NULL,
        'prefix' => 'employee/applications',
        'where' => 
        array (
        ),
        'as' => 'employee.applications.leave-applicaitons',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'employee.applications.others-applicaitons' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'employee/applications/other-applications',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Employee\\ApplicationController@otherApplications',
        'controller' => 'App\\Http\\Controllers\\Employee\\ApplicationController@otherApplications',
        'namespace' => NULL,
        'prefix' => 'employee/applications',
        'where' => 
        array (
        ),
        'as' => 'employee.applications.others-applicaitons',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'employee.task-management' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'employee/task-board',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Employee\\TaskBoardController@index',
        'controller' => 'App\\Http\\Controllers\\Employee\\TaskBoardController@index',
        'namespace' => NULL,
        'prefix' => 'employee/task-board',
        'where' => 
        array (
        ),
        'as' => 'employee.task-management',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'employee.task-management.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'employee/task-board/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Employee\\TaskBoardController@store',
        'controller' => 'App\\Http\\Controllers\\Employee\\TaskBoardController@store',
        'namespace' => NULL,
        'prefix' => 'employee/task-board',
        'where' => 
        array (
        ),
        'as' => 'employee.task-management.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'employee.task-management.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'employee/task-board/update/{task}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Employee\\TaskBoardController@update',
        'controller' => 'App\\Http\\Controllers\\Employee\\TaskBoardController@update',
        'namespace' => NULL,
        'prefix' => 'employee/task-board',
        'where' => 
        array (
        ),
        'as' => 'employee.task-management.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'employee.task-management.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'employee/task-board/destroy/{task}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Employee\\TaskBoardController@destroy',
        'controller' => 'App\\Http\\Controllers\\Employee\\TaskBoardController@destroy',
        'namespace' => NULL,
        'prefix' => 'employee/task-board',
        'where' => 
        array (
        ),
        'as' => 'employee.task-management.destroy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'employee.task-management.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'employee/task-board/show/{task}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Employee\\TaskBoardController@show',
        'controller' => 'App\\Http\\Controllers\\Employee\\TaskBoardController@show',
        'namespace' => NULL,
        'prefix' => 'employee/task-board',
        'where' => 
        array (
        ),
        'as' => 'employee.task-management.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'employee.task-management.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'employee/task-board/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Employee\\TaskBoardController@create',
        'controller' => 'App\\Http\\Controllers\\Employee\\TaskBoardController@create',
        'namespace' => NULL,
        'prefix' => 'employee/task-board',
        'where' => 
        array (
        ),
        'as' => 'employee.task-management.create',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'employee.task-management.filterData' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'employee/task-board/filterData',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Employee\\TaskBoardController@filterData',
        'controller' => 'App\\Http\\Controllers\\Employee\\TaskBoardController@filterData',
        'namespace' => NULL,
        'prefix' => 'employee/task-board',
        'where' => 
        array (
        ),
        'as' => 'employee.task-management.filterData',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'employee.task-comment.getbytask' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'employee/task-board/task-comments/{task_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Employee\\TaskCommentController@getByTask',
        'controller' => 'App\\Http\\Controllers\\Employee\\TaskCommentController@getByTask',
        'namespace' => NULL,
        'prefix' => 'employee/task-board',
        'where' => 
        array (
        ),
        'as' => 'employee.task-comment.getbytask',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'employee.task-comment.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'employee/task-board/task-comments/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Employee\\TaskCommentController@store',
        'controller' => 'App\\Http\\Controllers\\Employee\\TaskCommentController@store',
        'namespace' => NULL,
        'prefix' => 'employee/task-board',
        'where' => 
        array (
        ),
        'as' => 'employee.task-comment.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'employee.meeting-notes' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'employee/meeting-notes',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Employee\\MeetingNoteController@index',
        'controller' => 'App\\Http\\Controllers\\Employee\\MeetingNoteController@index',
        'namespace' => NULL,
        'prefix' => 'employee/meeting-notes',
        'where' => 
        array (
        ),
        'as' => 'employee.meeting-notes',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'employee.meeting-notes.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'employee/meeting-notes/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Employee\\MeetingNoteController@store',
        'controller' => 'App\\Http\\Controllers\\Employee\\MeetingNoteController@store',
        'namespace' => NULL,
        'prefix' => 'employee/meeting-notes',
        'where' => 
        array (
        ),
        'as' => 'employee.meeting-notes.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'employee.meeting-notes.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'employee/meeting-notes/update/{meeting}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Employee\\MeetingNoteController@update',
        'controller' => 'App\\Http\\Controllers\\Employee\\MeetingNoteController@update',
        'namespace' => NULL,
        'prefix' => 'employee/meeting-notes',
        'where' => 
        array (
        ),
        'as' => 'employee.meeting-notes.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'employee.meeting-notes.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'employee/meeting-notes/destroy/{meeting}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Employee\\MeetingNoteController@destroy',
        'controller' => 'App\\Http\\Controllers\\Employee\\MeetingNoteController@destroy',
        'namespace' => NULL,
        'prefix' => 'employee/meeting-notes',
        'where' => 
        array (
        ),
        'as' => 'employee.meeting-notes.destroy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'employee.meeting-notes.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'employee/meeting-notes/show/{meeting}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Employee\\MeetingNoteController@show',
        'controller' => 'App\\Http\\Controllers\\Employee\\MeetingNoteController@show',
        'namespace' => NULL,
        'prefix' => 'employee/meeting-notes',
        'where' => 
        array (
        ),
        'as' => 'employee.meeting-notes.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'employee.meeting-notes.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'employee/meeting-notes/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Employee\\MeetingNoteController@create',
        'controller' => 'App\\Http\\Controllers\\Employee\\MeetingNoteController@create',
        'namespace' => NULL,
        'prefix' => 'employee/meeting-notes',
        'where' => 
        array (
        ),
        'as' => 'employee.meeting-notes.create',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'employee.meeting-notes.filterData' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'employee/meeting-notes/filterData',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Employee\\MeetingNoteController@filterData',
        'controller' => 'App\\Http\\Controllers\\Employee\\MeetingNoteController@filterData',
        'namespace' => NULL,
        'prefix' => 'employee/meeting-notes',
        'where' => 
        array (
        ),
        'as' => 'employee.meeting-notes.filterData',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'employee.launch-sheet.calculateTotalLaunch' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'employee/launch-management/calculate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Employee\\LaunchManagementController@calculateTotalLaunch',
        'controller' => 'App\\Http\\Controllers\\Employee\\LaunchManagementController@calculateTotalLaunch',
        'namespace' => NULL,
        'prefix' => 'employee/launch-management',
        'where' => 
        array (
        ),
        'as' => 'employee.launch-sheet.calculateTotalLaunch',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'employee.launch-sheet.getbymonth' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'employee/launch-management/getByMonth/{month}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Employee\\LaunchManagementController@empLaunchManagementGetByMonth',
        'controller' => 'App\\Http\\Controllers\\Employee\\LaunchManagementController@empLaunchManagementGetByMonth',
        'namespace' => NULL,
        'prefix' => 'employee/launch-management',
        'where' => 
        array (
        ),
        'as' => 'employee.launch-sheet.getbymonth',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'employee.launch-sheet.invoices' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'employee/launch-management/invoices',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Employee\\LaunchManagementController@empLaunchManagementInvoices',
        'controller' => 'App\\Http\\Controllers\\Employee\\LaunchManagementController@empLaunchManagementInvoices',
        'namespace' => NULL,
        'prefix' => 'employee/launch-management',
        'where' => 
        array (
        ),
        'as' => 'employee.launch-sheet.invoices',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'employee.launch-sheet.createInvoice' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'employee/launch-management/invoices/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Employee\\LaunchManagementController@createInvoice',
        'controller' => 'App\\Http\\Controllers\\Employee\\LaunchManagementController@createInvoice',
        'namespace' => NULL,
        'prefix' => 'employee/launch-management',
        'where' => 
        array (
        ),
        'as' => 'employee.launch-sheet.createInvoice',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'employee.launch-sheet.exportPDF' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'employee/launch-management/invoices/export/pdf/{invoice_number}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Employee\\LaunchManagementController@createInvoicePdf',
        'controller' => 'App\\Http\\Controllers\\Employee\\LaunchManagementController@createInvoicePdf',
        'namespace' => NULL,
        'prefix' => 'employee/launch-management',
        'where' => 
        array (
        ),
        'as' => 'employee.launch-sheet.exportPDF',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'employee.launch-sheet.exportExcel' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'employee/launch-management/invoices/export/excel',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Employee\\LaunchManagementController@exportExcel',
        'controller' => 'App\\Http\\Controllers\\Employee\\LaunchManagementController@exportExcel',
        'namespace' => NULL,
        'prefix' => 'employee/launch-management',
        'where' => 
        array (
        ),
        'as' => 'employee.launch-sheet.exportExcel',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'employee.launch-sheet.showInvoice' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'employee/launch-management/invoices/show/{invoice_number}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Employee\\LaunchManagementController@showInvoice',
        'controller' => 'App\\Http\\Controllers\\Employee\\LaunchManagementController@showInvoice',
        'namespace' => NULL,
        'prefix' => 'employee/launch-management',
        'where' => 
        array (
        ),
        'as' => 'employee.launch-sheet.showInvoice',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'employee.launch-sheet.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'employee/launch-management/update/{employeeId}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Employee\\LaunchManagementController@empLaunchManagementUpdate',
        'controller' => 'App\\Http\\Controllers\\Employee\\LaunchManagementController@empLaunchManagementUpdate',
        'namespace' => NULL,
        'prefix' => 'employee/launch-management',
        'where' => 
        array (
        ),
        'as' => 'employee.launch-sheet.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'employee.reports.generate' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'employee/reports/generate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Employee\\ReportController@index',
        'controller' => 'App\\Http\\Controllers\\Employee\\ReportController@index',
        'namespace' => NULL,
        'prefix' => 'employee/reports',
        'where' => 
        array (
        ),
        'as' => 'employee.reports.generate',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'employee.reports.dailySalesReports' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'employee/reports/daily-sales-reports',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Employee\\ReportController@dailySalesReports',
        'controller' => 'App\\Http\\Controllers\\Employee\\ReportController@dailySalesReports',
        'namespace' => NULL,
        'prefix' => 'employee/reports',
        'where' => 
        array (
        ),
        'as' => 'employee.reports.dailySalesReports',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'employee.performance-tracker.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'employee/performance-tracker',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'PerformanceTrackerController@index',
        'controller' => 'PerformanceTrackerController@index',
        'namespace' => NULL,
        'prefix' => 'employee/performance-tracker',
        'where' => 
        array (
        ),
        'as' => 'employee.performance-tracker.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'employee.performance-tracker.filterData' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'employee/performance-tracker/filterData',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'PerformanceTrackerController@filterData',
        'controller' => 'PerformanceTrackerController@filterData',
        'namespace' => NULL,
        'prefix' => 'employee/performance-tracker',
        'where' => 
        array (
        ),
        'as' => 'employee.performance-tracker.filterData',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'employee.performance-tracker.getByMonth' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'employee/performance-tracker/getByMonth/{month}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'PerformanceTrackerController@getByMonth',
        'controller' => 'PerformanceTrackerController@getByMonth',
        'namespace' => NULL,
        'prefix' => 'employee/performance-tracker',
        'where' => 
        array (
        ),
        'as' => 'employee.performance-tracker.getByMonth',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
  ),
)
);
