<?php
	class RankingTable {
		private $players = array();

		public function __construct($playerNames) {
			foreach ($playerNames as $playerName) {
				$this->players[$playerName] = array('score' => 0, 'gamesPlayed' => 0);
			}
		}

		public function recordResult($playerName, $score) {
			if (isset($this->players[$playerName])) {
				$this->players[$playerName]['score'] += $score;
				$this->players[$playerName]['gamesPlayed'] += 1;
			}
		}

		public function playerRank($rank) {
			// Sortuj graczy według logiki rankingu
			uasort($this->players, function($a, $b) {
				if ($a['score'] !== $b['score']) {
					return $b['score'] - $a['score'];
				} elseif ($a['gamesPlayed'] !== $b['gamesPlayed']) {
					return $a['gamesPlayed'] - $b['gamesPlayed'];
				} else {
					// Jeśli mamy ten sam wynik i tę samą liczbę gier, to gracz, który był pierwszy na liście graczy, jest sklasyfikowany wyżej.
					return 1;
				}
			});

			// Pobierz gracza o podanym rankingu
			$rankedPlayers = array_keys($this->players);
			if ($rank <= count($rankedPlayers)) {
				return $rankedPlayers[$rank - 1];
			}

			return null;
		}
	}

	$table = new RankingTable(array('Jan', 'Maks', 'Monika'));
	$table->recordResult('Jan', 2);
	$table->recordResult('Maks', 3);
	$table->recordResult('Monika', 5);
	echo $table->playerRank(1); // Powinno zwrócić "Monika"
?>