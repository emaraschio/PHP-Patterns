<?php

interface ServiceClient {
    function getData();
}

class MyWebServiceClient implements ServiceClient {
	
    private $data;
    
    public function MyWebServiceClient() {
        $client = new SoapClient("some.wsdl");
        $this->data = $client->getDataFunction();
    }
    
    public function getData() {
        return $this->data;
    }
}

abstract class ServiceClientDecorator implements ServiceClient {
	
    protected $serviceClient;
    
    public function __construct(ServiceClient $serviceClient) {
        $this->serviceClient = $serviceClient;
    }
}

class HtmlEntitiesDecorator extends ServiceClientDecorator {
	
    public function getData() {
        return htmlentities($this->serviceClient->getData());
    }
}

class ParagraphDecorator extends ServiceClientDecorator {
	
    public function getData() {
        return '<p>'.$this->serviceClient->getData().'</p>';
    }
}

class DateDecorator extends ServiceClientDecorator {

	public function getData() {
		return 'Date:' . now() . $this->serviceClient->getData();	
	}
}

$client = new MyWebServiceClient();

$client = new HtmlEntititesDecorator($client);
$client = new ParagraphDecorator($client);
$client = new DateDecorator($client);

echo $client->getData();
