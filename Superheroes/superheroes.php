<?php

$superheroes = [
    [
        "id" => 1,
        "name" => "Steve Rogers",
        "alias" => "Captain America",
        "biography" => "Recipient of the Super-Soldier serum, World War II hero Steve Rogers fights for American ideals as one of the world’s mightiest heroes and the leader of the Avengers.",
    ],
    [
        "id" => 2,
        "name" => "Tony Stark",
        "alias" => "Ironman",
        "biography" => "Genius. Billionaire. Playboy. Philanthropist. Tony Stark's confidence is only matched by his high-flying abilities as the hero called Iron Man.",
    ],
    [
        "id" => 3,
        "name" => "Peter Parker",
        "alias" => "Spiderman",
        "biography" => "Bitten by a radioactive spider, Peter Parker’s arachnid abilities give him amazing powers he uses to help others, while his personal life continues to offer plenty of obstacles.",
    ],
    [
        "id" => 4,
        "name" => "Carol Danvers",
        "alias" => "Captain Marvel",
        "biography" => "Carol Danvers becomes one of the universe's most powerful heroes when Earth is caught in the middle of a galactic war between two alien races.",
    ],
    [
        "id" => 5,
        "name" => "Natasha Romanov",
        "alias" => "Black Widow",
        "biography" => "Despite super spy Natasha Romanoff’s checkered past, she’s become one of S.H.I.E.L.D.’s most deadly assassins and a frequent member of the Avengers.",
    ],
    [
        "id" => 6,
        "name" => "Bruce Banner",
        "alias" => "Hulk",
        "biography" => "Dr. Bruce Banner lives a life caught between the soft-spoken scientist he’s always been and the uncontrollable green monster powered by his rage.",
    ],
    [
        "id" => 7,
        "name" => "Clint Barton",
        "alias" => "Hawkeye",
        "biography" => "A master marksman and longtime friend of Black Widow, Clint Barton serves as the Avengers’ amazing archer.",
    ],
    [
        "id" => 8,
        "name" => "T'challa",
        "alias" => "Black Panther",
        "biography" => "T’Challa is the king of the secretive and highly advanced African nation of Wakanda - as well as the powerful warrior known as the Black Panther.",
    ],
    [
        "id" => 9,
        "name" => "Thor Odinson",
        "alias" => "Thor",
        "biography" => "The son of Odin uses his mighty abilities as the God of Thunder to protect his home Asgard and planet Earth alike.",
    ],
    [
        "id" => 10,
        "name" => "Wanda Maximoff",
        "alias" => "Scarlett Witch",
        "biography" => "Notably powerful, Wanda Maximoff has fought both against and with the Avengers, attempting to hone her abilities and do what she believes is right to help the world.",
    ], 
];

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $searchVal = trim(filter_input(INPUT_POST, "superName", FILTER_SANITIZE_STRING));

    if (!empty($searchVal)) {
        // Flag to track if superhero is found
        $found = false;

        // Loop through superheroes and look for matches
        foreach ($superheroes as $superhero) {
            if (stripos($superhero['name'], $searchVal) !== false || stripos($superhero['alias'], $searchVal) !== false) {
                // Output the matching superhero
                echo "<h3>" . htmlspecialchars($superhero['alias']) . "</h3>";
                echo "<h4>A.K.A " . htmlspecialchars($superhero['name']) . "</h4>";
                echo "<p>" . htmlspecialchars($superhero['biography']) . "</p>";
                $found = true;
                break; // Exit loop once a match is found
            }
        }

        // If no match was found
        if (!$found) {
            echo "<p style='color: red;'>Superhero not found. Please try again!</p>";
        }
    } else {
        // If the search field is empty, display all superheroes
        echo "<ul>";
        foreach ($superheroes as $superhero) {
            echo "<li>" . htmlspecialchars($superhero['alias']) . "</li>";
        }
        echo "</ul>";
    }
} else {
    // If the form is not submitted, display all superheroes
    echo "<ul>";
    foreach ($superheroes as $superhero) {
        echo "<li>" . htmlspecialchars($superhero['alias']) . "</li>";
    }
    echo "</ul>";
}
?>


