<?php
namespace makbari\fanapOauthClient\interfaces;

use makbari\fanapOauthClient\entity\Token;
use makbari\fanapOauthClient\interfaces\entity\iToken;

/**
 * Interface iClient
 * @package mhndev\oauthClient\interfaces
 */
interface iOAuthClient
{
    /**
     * @param string $token
     * @return mixed
     */
    function getUserByToken(string $token);

    /**
     * @param string $clientId
     * @param string $clientSecret
     * @param string $grantType
     * @param string $refreshToken
     * @param string $redirectUri
     * @return iToken
     */
    function getTokenByRefreshToken(string $clientId, string $clientSecret, string $grantType, string $refreshToken, string $redirectUri) :iToken;

    /**
     * @param string $code
     * @param string $clientId
     * @param string $clientSecret
     * @param string $grantType
     * @param string $redirectUri
     * @return iToken
     */
    function getTokenByCode(string $code, string $clientId, string $clientSecret, string $grantType, string $redirectUri) :iToken ;
}
