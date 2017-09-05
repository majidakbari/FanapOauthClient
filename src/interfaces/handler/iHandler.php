<?php
namespace makbari\fanapOauthClient\interfaces\handler;



/**
 * Interface iHandler
 * @package mhndev\oauthClient\interfaces\handler
 */
interface iHandler
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
     * @return array
     */
    function getTokenByRefreshToken(string $clientId, string $clientSecret, string $grantType, string $refreshToken, string $redirectUri) :array;

    /**
     * @param string $code
     * @param string $clientId
     * @param string $clientSecret
     * @param string $grantType
     * @param string $redirectUri
     * @return array
     */
    function getTokenByCode(string $code, string $clientId, string $clientSecret, string $grantType, string $redirectUri) :array ;

}
