<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="author" content="Anwar Jahid">

    <style>
        * {
            font-family: Arial;
            font-size: 12pt;
        }

        a.NoteRef {
            text-decoration: none;
        }

        hr {
            height: 1px;
            padding: 0;
            margin: 1em 0;
            border: 0;
            border-top: 1px solid #CCC;
        }

        table {
            border: 1px solid black;
            border-spacing: 0px;
            width: 100%;
        }

        td {
            border: 1px solid black;
        }

        .Normal (Web) {
            font-family: 'Times New Roman';
        }

        .Balloon Text {
            font-family: 'Times New Roman';
            font-size: 9pt;
        }

        .Balloon Text Char {
            font-family: 'Times New Roman';
            font-size: 9pt;
        }
    </style>

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="<?php echo e(mix('css/app.css')); ?>">

    <!-- Scripts -->
    <?php echo app('Tightenco\Ziggy\BladeRouteGenerator')->generate(); ?>
    <script src="<?php echo e(mix('js/app.js')); ?>" defer></script>
    <script type="text/javascript" src="/js/ckfinder/ckfinder.js"></script>
    <script>
        CKFinder.config({
            connectorPath: route('ckfinder_connector')
        });
    </script>
</head>

<body class="font-sans antialiased">
    <?php echo $__env->make('ckfinder::setup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div id="app" data-page="<?php echo e(json_encode($page)); ?>"></div>

    <?php if(app()->environment('local')): ?>
    <script src="http://localhost:3000/browser-sync/browser-sync-client.js"></script>
    <?php endif; ?>
</body>

</html><?php /**PATH /opt/laravel-inertia-boilerplate/resources/views/app.blade.php ENDPATH**/ ?>