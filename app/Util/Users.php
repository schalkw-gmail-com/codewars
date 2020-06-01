<?php
namespace App\Util;

use GuzzleHttp\Client;

class Users
{
    protected $client;
    protected $uri = '/api/v1/users/';

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function all()
    {
        return $this->endpointRequest('/dummy/posts');
    }

    public function findById($id)
    {
        return $this->endpointRequest($id);
    }

    public function endpointRequest($id)
    {
        $url = $this->uri.$id;
        try {
            $response = $this->client->request('GET', $url);
        } catch (\Exception $e) {
            return [];
        }

        return $this->response_handler($response->getBody()->getContents());
    }

    public function response_handler($response)
    {
        if ($response) {
            return json_decode($response);
        }

        return [];
    }
}
