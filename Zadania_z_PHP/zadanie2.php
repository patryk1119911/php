<?php
	class TextInput {
    protected $value = '';

    public function add($text) {
        $this->value .= $text;
    }

    public function getValue() {
        return $this->value;
    }
	}

	class NumericInput extends TextInput {
		public function add($text) {
			// Sprawdzamy, czy podany tekst zawiera tylko cyfry (0-9).
			// Jeśli tak, dodajemy go do wartości.
			if (ctype_digit($text)) {
				$this->value .= $text;
			}
		}
	}

	// Przykład użycia:
	$input1 = new TextInput();
	$input1->add('Hello');
	$input1->add(' 123');
	echo $input1->getValue(); // Wyświetli: Hello 123

	$input2 = new NumericInput();
	$input2->add('456');
	$input2->add(' World');
	$input2->add(' 789');
	echo $input2->getValue(); // Wyświetli: 456 789
?>