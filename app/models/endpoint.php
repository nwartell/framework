<?php

class Endpoint {
    public static function get($endpoint, ...$args) {
        
        //echo "Endpoint: $endpoint\n";
        //echo "Arguments:\n";
        /*foreach ($args as $index => $arg) {
            echo "Arg[$index]: $arg\n";
        }*/
        
        $endpoint = file_get_contents(ENDPOINT.$endpoint.'?key='.$_ENV['APIKEY'].'&order=ASC'); // Need to fix order
        $data = json_decode($endpoint, true);
        if ($data === null) {
            // JSON decoding failed
            echo 'Error decoding JSON';
        } else {
            $rows = [];

            // Iterate through each item in the array
            foreach ($data as $item) {
                // Construct each entry using values from $args
                $entry = [];
                foreach ($args as $arg) {
                    // Use $arg to dynamically form the key and obtain corresponding value from $item
                    $entry[$arg] = $item[$arg];
                }
                // Append each entry to the $rows array
                $rows[] = $entry;
            }
        }
        return $rows;
    }
}

?>