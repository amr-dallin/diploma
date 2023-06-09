<!DOCTYPE html>
<html lang="en">
    <head>
        <?= $this->Html->charset() ?>
        <!-- base css -->
        <style type="text/css">
            .new-page {
                page-break-before: always;
            }

            html,
            body {
                margin: 0;
                padding: 0;
                text-rendering: optimizeLegibility;
                font-family: Akademitscheskaya;
            }

            @font-face {
                font-family: Akademitscheskaya;
                src: url(<?= WWW_ROOT ?>font/Akademitscheskaya.ttf);
            }

            table {border: none;}
        </style>
    </head>
    <body>
        <?= $this->fetch('content') ?>
    </body>
</html>