ChessPos
--------

A small app to dynamically create images for chess positions using [Forsythe-Edwards Notation (FEN)](http://en.wikipedia.org/wiki/Forsyth%E2%80%93Edwards_Notation) as the filename.

It supports FEN notation, but uses `-` instead of `/` as the rank separation character.

## Usage

When installed, the application listens for routes that match `/board/{FEN}.gif`, for example:

    http://chess.appio.info/board/r5k1-1pq2pp1-5n2-1QN5-6b1-2n1rNP1-3RPP2-2R3KB.gif

Returns:

![Reti-Alekhine, Baden-Baden 1925, after 28... Nxc3!](http://chess.appio.info/board/r5k1-1pq2pp1-5n2-1QN5-6b1-2n1rNP1-3RPP2-2R3KB.gif)

If an image doesn't exist, then the app dynamically creates the image of this board position, returns it and saves it at that URL, so the next time the static image is returned.


## Requires:

* PHP 5.3+
* GD



