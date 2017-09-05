<?php
namespace makbari\fanapOauthClient;

use makbari\fanapOauthClient\entity\Token;
use makbari\fanapOauthClient\entity\User;
use makbari\fanapOauthClient\interfaces\entity\iToken;
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
        $result = $this->handler->getUserByToken($token);

        return User::fromArray($result['result']);
    }

    /**
     * @param string $clientId
     * @param string $clientSecret
     * @param string $grantType
     * @param string $refreshToken
     * @param string $redirectUri
     * @return iToken
     */
    public function getTokenByRefreshToken(string $clientId, string $clientSecret, string $grantType, string $refreshToken, string $redirectUri): iToken
    {
        $result = $this->handler->getTokenByRefreshToken( $clientId,  $clientSecret,  $grantType,  $refreshToken,  $redirectUri);

        return Token::fromArray($result);
    }

    /**
     * @param string $code
     * @param string $clientId
     * @param string $clientSecret
     * @param string $grantType
     * @param string $redirectUri
     * @return iToken
     */
    public function getTokenByCode(string $code, string $clientId, string $clientSecret, string $grantType, string $redirectUri): iToken
    {
       $result = $this->handler->getTokenByCode($code, $clientId, $clientSecret, $grantType, $redirectUri);

       return Token::fromArray($result);
    }
}
