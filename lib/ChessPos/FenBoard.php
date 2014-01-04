<?php
namespace ChessPos;

class FenBoard {
    protected $fen;
    protected $board;

    public function __construct($fen) {
        $this->fen   = $fen;
        $this->board = NULL;
    }


    public function getBoard() {
        return $this->_createBoardFromFen();
    }



    protected function _createBoardFromFen() {
        if (empty($this->board)) {
            $rows = explode('-', $this->fen);

            $this->board = $this->_getEmptyBoard();

            for($rank = 0; $rank < 8; $rank++) {
                $square = $rank * 8;
                $pieces = $rows[$rank];
                $pieceLen = strlen($pieces);

                for($file = 0; $file < $pieceLen; $file++) {
                    $piece = substr($pieces, $file, 1);
                    $newPiece = '';

                    switch($piece) {
                        case '1':
                        case '2':
                        case '3':
                        case '4':
                        case '5':
                        case '6':
                        case '7':
                        case '8':
                            $square += $piece;
                            break;

                        case 'k': $newPiece = 'bk'; break;
                        case 'q': $newPiece = 'bq'; break;
                        case 'r': $newPiece = 'br'; break;
                        case 'b': $newPiece = 'bb'; break;
                        case 'n': $newPiece = 'bn'; break;
                        case 'p': $newPiece = 'bp'; break;
                        case 'K': $newPiece = 'wk'; break;
                        case 'Q': $newPiece = 'wq'; break;
                        case 'R': $newPiece = 'wr'; break;
                        case 'B': $newPiece = 'wb'; break;
                        case 'N': $newPiece = 'wn'; break;
                        case 'P': $newPiece = 'wp'; break;
                    }

                    if ($newPiece) {
                        $this->board[$square] .= $newPiece;
                        $square++;
                    }
                }

            }
        }
        
        return $this->board;
    }


    protected function _getEmptyBoard() {
        return str_split('wbwbwbwbbwbwbwbwwbwbwbwbbwbwbwbwwbwbwbwbbwbwbwbwwbwbwbwbbwbwbwbw');
    }
    
}

?>
