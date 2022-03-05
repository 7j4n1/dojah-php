<?php

    require dirname(__FILE__,2) . "\/vendor\/autoload.php";

    use DojahCore\Http\HttpClient;

    class HTTPClientTest extends PHPUnit_Framework_TestCase
    {

        public function testGetFailure()
        {
            $client = new HttpClient();
            $client->get("get-some-content");
        }

        public function testPostFailure()
        {
            $client = new HttpClient();
            $client->post("postwithnonexist-url");
        }

        public function testPutFailure()
        {
            $client = new HttpClient();
            $client->put("putwithnonexist-url");
        }

        public function testGetResponse()
        {
            $client = $this->getMock('HTTPClient', array('get'));

            $client->expects($this->once())
                    ->method('get')
                    ->with($this->equalTo('https://dojah.io'))
                    ->will($this->returnValue(true));
            
            $this->assertTrue($client->get('https://dojah.io'));
        }

        public function testPostResponse()
        {
            $client = $this->getMock('HTTPClient', array('post'));

            $client->expects($this->once())
                    ->method('post')
                    ->with($this->equalTo('https://dojah.io'))
                    ->will($this->returnValue(true));
            
            $this->assertTrue($client->post('https://dojah.io'));
        }

        public function testPutResponse()
        {
            $client = $this->getMock('HTTPClient', array('put'));

            $client->expects($this->once())
                    ->method('put')
                    ->with($this->equalTo('https://dojah.io'))
                    ->will($this->returnValue(true));
            
            $this->assertTrue($client->put('https://dojah.io'));
        }
    }