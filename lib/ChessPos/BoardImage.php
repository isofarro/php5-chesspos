<?php
namespace ChessPos;


class BoardImage {
    protected $board;
    protected $image;
    protected $pieceDir  = '/share/pieces/default/32/';
    protected $pieceSize = 32;

    public function __construct($board) {
        $this->board = $board;
    }

    public function outputImage() {
        $image = $this->generate();

        header('Content-Type: image/gif');
        imagegif($image);
    }

    public function saveImage($filePath) {
        $image = $this->generate();
        imagegif($image, $filePath);
    }
    
    public function generate() {
        if (empty($this->image)) {
            $this->image = $this->_generateImage();
        }

        return $this->image;
    }


    protected function _generateImage() {
        $boardImage = \imagecreate(256, 256)
                    or die("Cannot Instantiate new GD image stream");

        $background = \imagecolorallocate($boardImage, 0, 0, 0);
        $board = $this->board->getBoard();

        for ($square=0; $square < 64; $square++) {
            $piece      = $board[$square];
            $pieceImage = $this->_getPieceImage($piece);
            $offsetX    = ($square % 8) * $this->pieceSize; 
            $offsetY    = floor($square / 8) * $this->pieceSize;

            \imagecopy($boardImage, $pieceImage, $offsetX, $offsetY, 0, 0, $this->pieceSize, $this->pieceSize);
        }

        return $boardImage;
    }

    protected function _getPieceImage($piece) {
        if (empty($this->imageCache[$piece])) {
            $pieceImage = BASE_DIR . "{$this->pieceDir}{$piece}.gif";
            $image = \imagecreatefromgif($pieceImage);
            $this->imageCache[$piece] = $image;
        }

        return $this->imageCache[$piece];
    }
}

?>
