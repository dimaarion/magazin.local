    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php foreach ($x as $key => $value) : ?>
        <link rel="stylesheet" href="/adminpanel/css/<?php echo $value; ?>" />
    <?php endforeach; ?>

    <script src="/adminpanel/jquery/jquery.js"></script>

    <?php foreach ($x2 as $key => $value) : ?>
        <script src="/adminpanel/js/<?php echo $value; ?>"></script>
    <?php endforeach; ?>
    <script src="/adminpanel/bs-custom-file-input/bs-custom-file-input.js"></script>
    <title><?php echo $arr ?></title>
    <style>
        @import url(https://fonts.googleapis.com/css2?family=Commissioner:wght@100;200;300;400;500;600;900&family=Krona+One&family=Montserrat:wght@100&family=Open+Sans:wght@300&family=Roboto:wght@100&display=swap);
    </style>
    <?php
    foreach ($controller->dirFileName($controller->dirExt('./static/css')) as $key => $value):?>
    <link href="/adminpanel/static/css/<?php echo $value ?>" rel="stylesheet">
    <?php endforeach; ?>