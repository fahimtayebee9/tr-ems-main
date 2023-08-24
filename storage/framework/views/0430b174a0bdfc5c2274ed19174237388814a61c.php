<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $__env->make('employee.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('employee.includes.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</head>


<body class="fixed-left">
    <!-- Begin page -->
    <div id="wrapper">

        <!-- ========== Left Sidebar Start ========== -->
        <?php echo $__env->make('employee.includes.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Left Sidebar End -->

        <!-- Start right Content here -->

        <div class="content-page">
            <!-- Start content -->
            <div class="content">

                <!-- Top Bar Start -->
                <?php echo $__env->make('employee.includes.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <!-- Top Bar End -->

                <div class="page-content-wrapper">

                    <div class="container-fluid">

                        <?php echo $__env->make('employee.includes.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <!-- end page title end breadcrumb -->

                        <?php echo $__env->yieldContent('content'); ?>
                        
                    </div><!-- container -->

                </div> <!-- Page content Wrapper -->

            </div> <!-- content -->


            <?php echo $__env->make('employee.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        </div>
        <!-- End Right content here -->

    </div>
    <!-- END wrapper -->


    <?php echo $__env->make('employee.includes.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>

</html><?php /**PATH C:\xampp\htdocs\00_PROJECTS\tr-ems\resources\views/employee/layouts/app.blade.php ENDPATH**/ ?>