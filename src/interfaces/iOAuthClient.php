<?php
namespace makbari\fanapOauthClient\interfaces;

use makbari\fanapOauthClient\entity\Token;

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
     * @param string $refreshToken
     * @return mixed
     */
    function getTokenByRefreshToken(string $refreshToken) :array;

    /**
     * @param string $code
     * @param string $clientId
     * @param string $clientSecret
     * @param string $grantType
     * @param string $redirectUri
     * @return Token
     */
    function getTokenByCode(string $code, string $clientId, string $clientSecret, string $grantType, string $redirectUri) :Token ;
}
