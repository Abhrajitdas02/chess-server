## PHP Chess Server

PHP Ratchet WebSocket server using [PHP Chess](https://github.com/chesslablab/php-chess). The chess server is intended to connect to a [Redux Chess](https://github.com/chesslablab/redux-chess) app.

### Setup

Clone the `chesslablab/chess-server` repo into your projects folder as it is described in the following example:

    $ git clone git@github.com:chesslablab/chess-server.git

Then `cd` the `chess-server` directory and install the Composer dependencies:

    $ composer install

Create an `.env` file:

    $ cp .env.example .env

### WebSocket Server

Start the server:

```
$ php cli/ws-server.php
Welcome to PHP Chess Server
Commands available:
/accept {"id":"id"} Accepts a friend request to play a game.
/ascii Prints the ASCII representation of the game.
/castling Gets the castling status.
/captures Gets the pieces captured by both players.
/fen Prints the FEN string representation of the game.
/heuristicpicture Takes a balanced heuristic picture of the current game.
/history The current game's history.
/ischeck Finds out if the game is in check.
/ismate Finds out if the game is over.
/piece {"position":"string"} Gets a piece by its position on the board.
/pieces {"color":["w","b"]} Gets the pieces on the board by color.
/playfen {"fen":"string"} Plays a chess move in shortened FEN format.
/quit Quits a game.
/start {"mode":["analysis","loadfen","playfriend"],"fen":"string","color":["w","b"],"min":"int"} Starts a new game.
/status The current game status.

Listening to commands...
```


Open a console in your favorite browser and run commands:

    const ws = new WebSocket('ws://127.0.0.1:8080');
    ws.onmessage = (res) => { console.log(res.data) };
    ws.send('/start analysis');

### Secure WebSocket Server

> Before starting the secure WebSocket server for the first time, make sure to copy the `certificate.crt` and `private.key` files into the `ssl` folder as explained in [A Simple Example of SSL/TLS WebSocket With ReactPHP and Ratchet](https://medium.com/geekculture/a-simple-example-of-ssl-tls-websocket-with-reactphp-and-ratchet-e03be973f521).

Start the server:

	$ php cli/wss-server.php

Open a console in your favorite browser and run commands:

    const ws = new WebSocket('wss://pchess.net:8443');
    ws.onmessage = (res) => { console.log(res.data) };
    ws.send('/start analysis');

### Documentation

For further information you're all invited to read my learning journey:

- [Demystifying AI Through a Human-Like Chess Engine](https://medium.com/geekculture/demystifying-ai-through-a-human-like-chess-engine-5f71e3896cc9)
- [Two Things That My AI Project Required](https://medium.com/geekculture/two-things-that-my-ai-project-required-50000297053b)
- [What Are Some Healthy Tips to Reduce Cognitive Load?](https://medium.com/geekculture/what-are-some-healthy-tips-to-reduce-cognitive-load-4f91b695a3cb)
- [How to Take Normalized Heuristic Pictures](https://medium.com/geekculture/how-to-take-normalized-heuristic-pictures-79ca0df4cdec)
- [Equilibrium, Yin-Yang Chess](https://medium.com/geekculture/equilibrium-yin-yang-chess-292e044be46b)
- [Adding Classes to a SOLID Codebase Without Breaking Anything Else](https://medium.com/geekculture/adding-classes-to-a-solid-codebase-without-breaking-anything-else-99e6c5a5f3e4)
- [Preparing a Dataset for Machine Learning With PHP](https://ai.plainenglish.io/preparing-a-dataset-for-machine-learning-with-php-fd68dd85187e)
- [Converting a FEN Chess Position Into a PGN Move](https://medium.com/geekculture/converting-a-fen-chess-position-into-a-pgn-move-4a278d81b21f)
- [A React Chessboard with Redux and Hooks in Few Lines](https://medium.com/geekculture/a-react-chessboard-with-redux-and-hooks-in-few-lines-6009cb724bb)
- [How to Test a Local React NPM Package With Ease](https://javascript.plainenglish.io/testing-a-local-react-npm-package-with-ease-7d0668676ddb)
- [TDDing a React App With Jest the Easy Way](https://medium.com/geekculture/tdding-a-react-app-with-jest-the-easy-way-8ddb64aeaba6)
- [How to Test React Components With Joy](https://javascript.plainenglish.io/looking-forward-to-testing-react-components-with-joy-5bb3f86c21d7)
- [My First Integration Test in a Redux Hooked App](https://javascript.plainenglish.io/my-first-integration-test-in-a-redux-hooked-app-3b189addd46e)
- [Creating a Local WebSocket Server With TLS/SSL Is Easy as Pie](https://medium.com/geekculture/creating-a-local-websocket-server-with-tls-ssl-is-easy-as-pie-de1a2ef058e0)
- [A Simple Example of SSL/TLS WebSocket With ReactPHP and Ratchet](https://medium.com/geekculture/a-simple-example-of-ssl-tls-websocket-with-reactphp-and-ratchet-e03be973f521)
- [Newbie Tutorial on How to Rate-Limit a WebSocket Server](https://medium.com/geekculture/newbie-tutorial-on-how-to-rate-limit-a-websocket-server-8e28642ad5ff)
- [Visualizing Chess Openings Before MLP Classification](https://medium.com/geekculture/visualizing-chess-openings-before-mlp-classification-fd2a3e8c266)

### License

The MIT License.

### Contributions

- [How to Contribute to ChesslabLab](https://medium.com/geekculture/how-to-contribute-to-chesslab-cca73fefaf70)

Happy learning and coding!

Thank you, and keep it up.
