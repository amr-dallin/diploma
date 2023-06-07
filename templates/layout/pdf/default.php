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
            }
            table {border: none;}
        </style>
    </head>
    <body>
        <?= $this->fetch('content') ?>
    </body>
</html>