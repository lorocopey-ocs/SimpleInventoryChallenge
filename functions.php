<?php
// Function to read data from file
function readFromFile($filename) {
    $lines = [];
    if (file_exists($filename)) {
        $file = fopen($filename, 'r');
        while (!feof($file)) {
            $lines[] = trim(fgets($file));
        }
        fclose($file);
    }
    return $lines;
}

// Function to write data to file
function writeToFile($filename, $data) {
    $file = fopen($filename, 'w');
    if (is_array($data)) {
        fwrite($file, implode("\n", $data)); // Convert array to string with implode()
    } else {
        fwrite($file, $data);
    }
    fclose($file);
}

// Function to append data to file
function appendToFile($filename, $data) {
    $file = fopen($filename, 'a');
    fwrite($file, $data . "\n");
    fclose($file);
}
?>
