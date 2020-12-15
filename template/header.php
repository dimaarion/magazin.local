        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="<?php echo 'https://' . $_SERVER['HTTP_HOST']; ?>/favicon.ico" type="image/x-icon">
        <?php
        foreach ($x as $key => $value) :
        ?>
                <link rel="stylesheet" href="../css/<?php echo $value; ?>" />
        <?php
        endforeach;
        ?>
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.css" />
        <script src="../jquery/jquery.js">
        </script>
        <?php
        foreach ($x2 as $key => $value) :
        ?>
                <script src="../js/<?php echo $value; ?>">
                </script>
        <?php
        endforeach;
        if ($controller->id > 1) {
                $page = ' страница ' . $controller->id;
        }
        ?>

        <meta name="keywords" content="<?php
                                        echo $controller->ifElseContent(
                                                $arr['keywords'],
                                                $row['art_keyword']
                                        );
                                        ?>">
        <meta name="description" content="<?php
                                                echo $controller->ifElseContent(
                                                        $arr['descriptions'],
                                                        $row['art_description']
                                                );
                                                ?>">

        <title><?php
                echo $controller->ifElseContent(
                        $arr['title'],
                        $row['art_title']
                ) . $page;
                ?>

        </title>
       