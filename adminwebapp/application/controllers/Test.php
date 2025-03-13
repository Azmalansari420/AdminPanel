<?php

function calculateSums($game_data, $game_type, $numbers) {
    // Initialize sums array with 0 for all numbers
    $sums = array_fill_keys($numbers, 0);

    // Sum amounts for the specified game type
    foreach ($game_data as $data) {
        if ($data['game_type'] == $game_type && isset($sums[$data['number']])) {
            $sums[$data['number']] += $data['amount'];
        }
    }

    return $sums;
}

// Calculate sums for both game types
$game_type_1_sums = calculateSums($game_data, 1, $game_type_1_numbers);
$game_type_2_sums = calculateSums($game_data, 2, $game_type_2_numbers);

// Display results
echo "<h2>Game type 1 data</h2>";
foreach ($game_type_1_sums as $number => $sum) {
    echo "<h2>$number: $sum</h2>";
}

echo "<h2>Game type 2 data</h2>";
foreach ($game_type_2_sums as $number => $sum) {
    echo "<h2>$number: $sum</h2>";
}
