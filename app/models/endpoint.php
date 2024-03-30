<?php

namespace App\Models;

class Endpoint {

    public static function get($endpoint, ...$args) {
        $endpoint = file_get_contents(ENDPOINT.$endpoint.'/get-all?key='.$_ENV['APIKEY']);
        $data = json_decode($endpoint, true);
        
        if ($data === null) {
            // JSON decoding failed
            echo 'Error decoding JSON';
            return [];
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

    public static function getById($endpoint, $id) {
        $endpoint = file_get_contents(ENDPOINT.$endpoint.'/get-by-id?key='.$_ENV['APIKEY'].'&id='.$id);
        $data = json_decode($endpoint, true);

        if (!isset($data['error'])) {
            $entry = [];
            foreach ($data[0] as $key => $value) {
                $entry[$key] = $value;
            }
            return $entry;
        } else {
            echo 'Post not found';
        }

    }
}

?>