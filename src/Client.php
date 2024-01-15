<?php

namespace PikaSdk;

use GuzzleHttp\Client as HttpClient;

class Client
{
    private $apiKey;

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    private function getBaseUrl(string $version="v1") {
        $baseUrl = "https://api.pika.style";
        return $baseUrl . '/' . $version;
    }

    public function generateImageFromTemplate(string $templateId, array $modifications, string $responseFormat = 'base64') {
        $client = new HttpClient();

        $data = [
            'response_format' => $responseFormat,
            'modifications' => $modifications,
        ];

        $headers = [
            'Authorization' => 'Bearer ' . $this->apiKey,
            'Content-Type' => 'application/json',
        ];

        $endpoint = $this->getBaseUrl() . '/templates/' . $templateId . '/images';
        
        $response = $client->post($endpoint, [
            'json' => $data,
            'headers' => $headers,
        ]);

        if ($responseFormat == 'base64') {
            $responseBody = $response->getBody();

            $jsonResponse = json_decode($responseBody, true);

            return $jsonResponse;
        } else {
            return $response->getBody()->getContents();
        }
    }
}
