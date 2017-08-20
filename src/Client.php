<?php
namespace fanap\fanapOauthClient;

use makbari\fanapOauthClient\entity\Token;
use makbari\fanapOauthClient\interfaces\handler\iHandler;
use makbari\fanapOauthClient\interfaces\iOAuthClient;

/**
 * Class Client
 * @package mhndev\digipeyk\services\oauth2
 */
class Client implements iOAuthClient
{

    /**
     * @var iHandler
     */
    protected $handler;

    /**
     * Client constructor.
     * @param iHandler $handler
     */
    public function __construct(iHandler $handler)
    {
        $this->handler = $handler;
    }

    /**
     * @param string $token
     * @return mixed
     */
    public function getUserByToken(string $token)
    {
        // TODO: Implement getUserByToken() method.
    }

    /**
     * @param string $refreshToken
     * @return mixed
     */
    public function getTokenByRefreshToken(string $refreshToken): array
    {
        // TODO: Implement getTokenByRefreshToken() method.
    }

    /**
     * @param string $code
     * @param string $clientId
     * @param string $clientSecret
     * @param string $grantType
     * @param string $redirectUri
     * @return Token
     */
    public function getTokenByCode(string $code, string $clientId, string $clientSecret, string $grantType, string $redirectUri): Token
    {
       $result = $this->handler->getTokenByCode($code, $clientId, $clientSecret, $grantType, $redirectUri);

       return Token::fromArray($result);
    }
}
