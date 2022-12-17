<?php 
namespace Http;

class Request {


    protected $originalGet; 
    
    protected $originalPost;
    
    protected $originalServer;

    protected $path;
    
    protected $method;
    
    public function __construct($get, $post, $server)
    {
        $this->originalGet = $get;
        $this->originalPost = $post;
        $this->originalServer = $server;


        $this->method = $this->originalServer['REQUEST_METHOD'];
        $this->path = isset($this->originalServer['PATH_INFO']) ? 
            $this->originalServer['PATH_INFO'] : "/";
    }


    public function getMethod() {
        return $this->method;
    }


    public function getPath() {
        return $this->path;
    }

    public function getQueryParameters() {
        return $this->originalGet;
    }

    public function getQueryParameter($name) {
        return isset($this->originalGet[$name]) ? 
                $this->originalGet[$name] : null;
    }


    public static function createFromGlobals() {
        return new self($_GET, $_POST, $_SERVER);
    }



}