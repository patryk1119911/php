<?php
	class Thesaurus {
    private $thesaurusData;

    public function __construct($thesaurusData) {
        $this->thesaurusData = $thesaurusData;
    }

    public function getSynonyms($word) {
        $word = strtolower($word);
        if (isset($this->thesaurusData[$word])) {
            $synonyms = $this->thesaurusData[$word];
        } else {
            $synonyms = [];
        }

        $result = array(
            'word' => $word,
            'synonyms' => $synonyms
        );

        return json_encode($result);
    }
}

	// Przykładowe dane dla tezaurusa
	$thesaurusData = array(
		"market" => array("trade"),
		"small" => array("little", "compact")
	);

	// Tworzymy obiekt tezaurusa
	$thesaurus = new Thesaurus($thesaurusData);

	// Wywołanie funkcji getSynonyms dla słowa "small"
	echo $thesaurus->getSynonyms("small"); // Zwróci: '{"word":"small","synonyms":["little","compact"]}'

	// Wywołanie funkcji getSynonyms dla słowa "asleast"
	echo $thesaurus->getSynonyms("asleast"); // Zwróci: '{"word":"asleast","synonyms":[]}'
?>