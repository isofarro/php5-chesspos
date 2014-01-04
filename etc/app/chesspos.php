<?php
require_once BASE_DIR . '/vendor/autoload.php';

use ChessPos\FenBoard;
use ChessPos\BoardImage;

Flight::route('/', function() {
    echo "<h1>ChessPos</h1>";
});

Flight::route('/board/@position:[1-8kqrbnpKQRBNP-]+\.gif', function($posImage) {
    list($position, $imageType) = explode('.', $posImage);

    $fen        = new FenBoard($position);
    $boardImage = new BoardImage($fen);

    // Return dynamic image
    $boardImage->outputImage();
 
    // And cache it on the filesystem
    $filePath = DOC_ROOT . "/board/{$posImage}";
    $boardImage->saveImage($filePath);
});


Flight::start();

?>
