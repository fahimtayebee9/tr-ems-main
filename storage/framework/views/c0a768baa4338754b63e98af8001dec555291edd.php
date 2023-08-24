<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Application-<?php echo e($application->application_id); ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <style>
        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        a {
            color: #0087C3;
            text-decoration: none;
        }

        body {
            position: relative;
            width: 21cm;
            height: 29.7cm;
            margin: 0 auto;
            color: #555555;
            background: #FFFFFF;
            font-family: Arial, sans-serif;
            font-size: 14px;
            font-family: SourceSansPro;
        }

        .table {
            width: 100%;
            max-width: 100%;
            margin-top: 80px;
        }

        header {
            padding: 10px 0;
            margin-bottom: 20px;
        }
        header p{
            font-family: 'Arial', sans-serif;
            font-size: 14px;
        }

        main p{
            font-family: 'Arial', sans-serif;
            font-size: 14px;
        }
        table .notice{
            font-family: 'Arial', sans-serif;
            font-size: 12px;
            font-weight: 700;
        }
    </style>
</head>

<body style="width: 100%!important;">
    <header class="clearfix">
        <p>
            <?php echo e(\Carbon\Carbon::parse($application->created_at)->format('d M, Y')); ?>

        </p>
        <p>
            To,
            <br>
            <?php if($application->apply_to == 1): ?>
            <?php echo e("HR Manager"); ?>

            <?php elseif($application->apply_to == 2): ?>
            <?php echo e("CEO"); ?>

            <?php endif; ?>
            <br>
            <?php echo e($companyDetails->company_name); ?>

            <br>
            <?php echo e($companyDetails->company_address); ?>

        </p>
        <p>
            <b>Subject:</b> <?php echo e($application->subject); ?>

        </p>
    </header>
    <main style="width: 100%!important; overflow:hidden;">
        <p>
            Dear 
            
        </p>
        <p>
            <?php echo $application->description; ?>

        </p>
        <p>
            Yours Sincerely,
            <br>
            <?php echo e($application->employee->user->first_name); ?> <?php echo e($application->employee->user->last_name); ?>

            <br>
            <?php echo e($application->employee->designation->name); ?> [<?php echo e($application->employee->department->name); ?>]
            <br>
            <?php echo e($companyDetails->company_name); ?>

            <br>
            <?php echo e($companyDetails->company_address); ?>

        </p>
        <div class="">
            <table class="table">
                <tr>
                    <td style="text-align: center;">
                        <div id="notices">
                            <div style="margin-bottom: 15px;">
                                <?php if($application && $application->status_by_astmanager == 2): ?>
                                <img src="<?php echo e(public_path('storage/uploads/signatures/assistant-manager-approved-digital-signature.png')); ?>" alt="Approved" width="100px">
                                <?php endif; ?>
                                <div style="margin-top: 15px; border-bottom: 1px dashed #000; width: 75%; margin: 0 auto;"></div>
                            </div>
                            <div class="notice">
                                Authorized Signature
                            </div>
                        </div>
                    </td>
                    <td style="text-align: center;">
                        <div id="notices">
                            <div style="margin-bottom: 15px;">
                                <?php if($application && $application->status_by_hr == 2): ?>
                                <img src="<?php echo e(public_path('storage/uploads/signatures/assistant-manager-approved-digital-signature.png')); ?>" alt="Approved" width="240px">
                                <?php endif; ?>

                                <div style="margin-top: 15px; border-bottom: 1px dashed #000; width: 75%; margin: 0 auto;"></div>
                            </div>
                            <div class="notice">
                                Authorized Signature
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </main>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\00_PROJECTS\tr-ems\resources\views/admin/pdfs/leave-application-view.blade.php ENDPATH**/ ?>