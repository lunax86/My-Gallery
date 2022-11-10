<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>

    <link rel="stylesheet" href="style.css">

    <!-- jQuery -->
    <script  type="text/javascript"  src="node_modules/jquery/dist/jquery.min.js"></script>

    <!-- nanogallery2 -->
    <link    href="node_modules/nanogallery2/dist/css/nanogallery2.min.css" rel="stylesheet" type="text/css">
    <script  type="text/javascript" src="node_modules/nanogallery2/dist/jquery.nanogallery2.js"></script>
</head>
<body id="css-override">
    
    <h1>Gallery</h1>

    <div id="nanogallery2" data-nanogallery2 = '{
                "thumbnailWidth":   "300",
                "thumbnailHeight":  "auto"
            }' >
        <?php foreach (array_diff(scandir(__DIR__.'/albums/'), ['.', '..']) as $albumIndex => $album ): ?>
            <?php if (is_dir(__DIR__.'/albums/'.$album)): ?>
                <?php
                $album2 = str_replace ("_"," ",$album);
                ?>
                <a href="" data-ngkind="album" data-ngid="<?= $albumIndex ?>" data-ngthumb="<?= '/albums/'.$album.'.jpg' ?>" ><?= $album2 ?></a>

                <?php foreach (preg_grep('~\.(jpeg|jpg|png)$~', scandir(__DIR__.'/albums/'.$album))  as $imageIndex => $image): ?>
                    <a href="<?= '/albums/'.$album.'/'.$image ?>"
                    data-ngid="<?= $albumIndex.$imageIndex ?>"
                    data-ngalbumid="<?= $albumIndex ?>"
                    data-ngthumb="<?= '/albums/'.$album.'/thumbs/'.'thumb-'.$image ?>" >
                        <?= str_replace ("_"," ",pathinfo($image, PATHINFO_FILENAME)); ?>
                    </a>
                <?php endforeach; ?>

            <?php endif; ?>
        <?php endforeach; ?>
    </div>

</body>
</html>