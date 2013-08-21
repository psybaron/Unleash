<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title><?=config_item('appName')?></title>
        <!-- Styles -->
        <?=$this->assets->loadCss('public')?>
        <link rel="icon" href="/favicon.ico" type="image/x-icon">
    </head>
    <body>
        <div class="container">
            <?=$yield?>
        </div>
        <!-- JavaScript -->
        <?=$this->assets->loadJs('public')?>
    </body>
</html>