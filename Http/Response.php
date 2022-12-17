<?php 

namespace Http;

class Response {

    protected $content = '';
    
    protected $statusCode = '200';

    protected $statusText = 'OK';
    

    public function __construct($content = '', $statusCode = '200', $statusText = 'OK')
    {
        $this->content = $content;
        $this->statusCode = $statusCode;
        $this->statusText = $statusText;
    }

    public function send() {

        header(sprintf('HTTP/1.1 %s %s', $this->statusCode, $this->statusText));
        header('content-type: text/html');
        
        if ($this->statusCode === '301') {
            header(sprintf('Location: %s', $this->content));
        }

        echo $this->content;
    }

}