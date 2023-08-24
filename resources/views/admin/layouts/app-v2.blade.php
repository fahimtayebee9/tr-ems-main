<!DOCTYPE html>
<html lang="en" data-sidebar="light">
    <head>
        @include("admin.includes.header")
        @include("admin.includes.css")
    </head>

    <body>
        <!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<!-- Header -->
            @include("admin.includes.topbar")
			<!-- /Header -->
			
			<!-- Sidebar -->
            @include("admin.includes.sidebar")
			<!-- /Sidebar -->
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
			
				<!-- Page Content -->
                <div class="content container-fluid">
				    
                    @yield('body')
				
				</div>
				<!-- /Page Content -->

            </div>
			<!-- /Page Wrapper -->
			
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        @include('admin.includes.scripts')

    </body>
</html>