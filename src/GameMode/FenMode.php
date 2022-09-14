<?php

namespace ChessServer\GameMode;

use Chess\Game;
use Chess\Heuristics;
use Chess\FEN\StrToBoard;
use ChessServer\Command\HeuristicsCommand;

class FenMode extends AbstractMode
{
    const NAME = Game::MODE_FEN;

    protected $fen;

    public function __construct(Game $game, array $resourceIds, string $fen = '')
    {
        parent::__construct($game, $resourceIds);

        $this->fen = $fen;
    }

    public function getFen()
    {
        return $this->fen;
    }

    public function res($argv, $cmd)
    {
        try {
            switch (get_class($cmd)) {
                case HeuristicsCommand::class:
                    $movetext = $this->game->getBoard()->getMovetext();
                    if ($this->fen) {
                        $board = (new StrToBoard($this->fen))->create();
                        $balance = (new Heuristics($movetext, $board))->getBalance();
                    } else {
                        $balance = (new Heuristics($movetext))->getBalance();
                    }
                    return [
                        $cmd->name => [
                            'dimensions' => (new Heuristics())->getDimsNames(),
                            'balance' => $balance,
                        ],
                    ];
                default:
                    return parent::res($argv, $cmd);
            }
        } catch (\Exception $e) {
            return [
                'error' => $e->getMessage(),
            ];
        }
    }
}
