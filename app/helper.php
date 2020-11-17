<?php

if(! function_exists('extract_id_from_slug')) {
    function extract_id_from_slug($slug) {
        $slugExploded = explode('-', $slug);

        return end($slugExploded);
    }
}

if(! function_exists('extract_last_from_url')) {
    function extract_last_from_url($url, $pos = null) {
        $urlArray = explode('/',$url);

        if($pos == 'prev') {
            end($urlArray);
            return prev($urlArray);
        } else {
            return end($urlArray);
        }

    }
}



if (! function_exists('set_ajax_reponse_object')) {
    function set_ajax_reponse_object($status = null, $code = null, $url = null, $message = null) {
        return (object) set_ajax_reponse_array($status, $code, $url, $message);
    }
}

if (! function_exists('set_ajax_reponse_array')) {
    function set_ajax_reponse_array($status = null, $code = null, $url = null, $message = null) {
        $ajaxResponse = [];

        if (isset($status)) $ajaxResponse['status'] = $status;
        if (isset($code)) $ajaxResponse['code'] = $code;
        if (isset($url)) $ajaxResponse['url'] = $url;
        if (isset($message)) $ajaxResponse['message'] = $message;

        return $ajaxResponse;
    }
}


