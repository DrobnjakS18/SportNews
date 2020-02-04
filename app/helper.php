<?php

if(! function_exists('extract_id_from_slug')) {
    function extract_id_from_slug($slug) {
        $slugExploded = explode('-', $slug);

        return end($slugExploded);
    }
}
