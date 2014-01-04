ChessPos
--------

A small app to dynamically create images for chess positions using [Forsythe-Edwards Notation (FEN)](http://en.wikipedia.org/wiki/Forsyth%E2%80%93Edwards_Notation) as the filename.

It supports FEN notation, but uses `-` instead of `/` as the rank separation character.

## Usage

When installed, the application listens for routes that match `/board/{FEN}.gif`, for example:

    http://example.com/board/6k1-4R3-1p1r1pp1-p2p4-P2P2P1-2P5-1P6-6K1.gif

If an image doesn't exist, then the app dynamically creates the image of this board position, returns it and saves it at that URL, so the next time the static image is returned.


## Requires:

* PHP 5.3+
* GD



