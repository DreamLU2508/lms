<?php

namespace Tests;
use PHPUnit\Framework\TestCase;

class LoginTest extends TestCase
{
    public function testLogin()
    {
        // Contains the url to post data
        // this is my local server url
        // demo is the folder name and
        // demo1.php is other file
        $url_path = 'http://localhost/lms/Source/librarian/api/login.php';

        // Data is an array of key value pairs
        // to be reflected on the site
        $data = array('username' => 'duc123', 'password' => '123456');

        // Method specified whether to GET or
        // POST data with the content specified
        // by $data variable. 'http' is used
        // even in case of 'https'

        $options = array(
            'http' => array(
                'method' => 'POST',
                'header'  => 'Content-Type: application/x-www-form-urlencoded',
                'content' => http_build_query($data)
            )
        );

        // Create a context stream with
        // the specified options
        $stream = stream_context_create($options);

        // The data is stored in the 
        // result variable
        $result = file_get_contents(
            $url_path,
            false,
            $stream
        );

        $json_array = json_decode($result, true);
        $this->assertTrue($json_array[0]["username"] != null);
    }
}
