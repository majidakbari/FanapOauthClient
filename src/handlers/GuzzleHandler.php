<?php

namespace makbari\fanapOauthClient\handlers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use makbari\fanapOauthClient\exceptions\UnAuthorizedException;
use makbari\fanapOauthClient\interfaces\handler\iHandler;
use Psr\Http\Message\ResponseInterface;

class GuzzleHandler implements iHandler
{


    /**
     * @var Client
     */
    protected $httpClient;


    /**
     * @var string
     */
    protected $serverUrl;


    /**
     * GuzzleHandler constructor.
     *
     * @param Client $client
     * @param $serverUrl
     */
    public function __construct(Client $client, $serverUrl)
    {
        $this->httpClient = $client;
        $this->serverUrl = $serverUrl;
    }


    /**
     * @param string $token
     * @return mixed
     * @throws UnAuthorizedException
     */
    function getUserByToken(string $token)
    {
        try {
            $response = $this->httpClient->get($this->endpoint(__FUNCTION__), [
                'query' => [
                    '_token_' => $token,
                    '_token_issuer_' => 1
                ]
            ]);
        } catch (ClientException $e) {
            if ($e->getResponse()->getStatusCode() == 400){
                throw new UnAuthorizedException();
            }
        }

        return $this->getResult($response);
    }

    /**
     * @param string $refreshToken
     * @return mixed
     */
    function getTokenByRefreshToken(string $refreshToken): array
    {
        // TODO: Implement getTokenByRefreshToken() method.
    }

    /**
     * @param string $code
     * @param string $clientId
     * @param string $clientSecret
     * @param string $grantType
     * @param string $redirectUri
     * @throws UnAuthorizedException
     * @return array
     */
    public function getTokenByCode(string $code, string $clientId, string $clientSecret, string $grantType, string $redirectUri): array
    {
        try {
            $response = $this->httpClient->post($this->endpoint(__FUNCTION__), [
                'form_params' => [
                        'code' => $code,
                        'client_id' => $clientId,
                        'client_secret' => $clientSecret,
                        'grant_type' => $grantType,
                        'redirect_uri' => $redirectUri
                ]
            ]);
        } catch (ClientException $e) {
            if ($e->getResponse()->getStatusCode() == 400){
                throw new UnAuthorizedException();
            }
        }

        return $this->getResult($response);
    }


    /**
     * @param ResponseInterface $response
     * @param bool $assos
     * @return mixed
     */
    protected function getResult(ResponseInterface $response, $assos = true)
    {
        return json_decode($response->getBody()->getContents(), $assos);
    }


    /**
     * @param $method
     * @return string
     */
    protected function endpoint($method)
    {
        switch ($method) {

            case 'getTokenByCode':
                return $this->serverUrl . '/oauth2/token/';
                break;
            case 'getUserByToken':
                return $this->serverUrl . ':8081/nzh/getUserProfile/';
                break;
        }
    }

}
