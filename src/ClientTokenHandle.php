<?php
namespace makbari\fanapOauthClient;

use makbari\fanapOauthClient\exceptions\ExpiredTokenException;
use makbari\fanapOauthClient\exceptions\UnAuthorizedException;
use makbari\fanapOauthClient\interfaces\entity\iToken;
use makbari\fanapOauthClient\interfaces\handler\iHandler;
use makbari\fanapOauthClient\interfaces\iOAuthClient;
use makbari\fanapOauthClient\interfaces\repository\iTokenRepository;


/**
 * This Client class handles token
 * for himself to it persist tokens for future requests
 *
 *
 * Class ClientTokenHandle
 * @package makbari\fanapOauthClient
 */
class ClientTokenHandle extends Client implements iOAuthClient
{

    /**
     * @var iTokenRepository
     */
    protected $tokenRepository;


    /**
     * ClientTokenHandle constructor.
     *
     * @param iHandler $handler
     * @param iTokenRepository $tokenRepository
     */
    public function __construct(iHandler $handler, iTokenRepository $tokenRepository)
    {
        parent::__construct($handler);

        $this->tokenRepository = $tokenRepository;
    }

    /**
     * @param string $token
     * @return iToken
     * @throws ExpiredTokenException
     * @throws UnAuthorizedException
     */
    public function getTokenInfo(string $token)
    {
        try{
            $token = $this->tokenRepository->findByToken($token);
        }
        catch (\Exception $e){
            throw new UnAuthorizedException();
        }

        return $token;
    }

    /**
     * @param string $clientId
     * @param string $clientSecret
     * @param string $grantType
     * @param iToken $refreshToken
     * @param string $redirectUri
     * @return array|mixed
     * @internal param iToken $token
     */
    public function renewToken(string $clientId, string $clientSecret, string $grantType, iToken $refreshToken, string $redirectUri)
    {
        $newToken = $this->getTokenByRefreshToken($clientId, $clientSecret, $grantType, $refreshToken->getRefreshToken(), $redirectUri);
        $user = $this->getUserByToken($newToken->getAccessToken());
        $newToken->setUser($user);
        $newToken->setIdentifier($refreshToken->getIdentifier());

        return $this->tokenRepository->update($newToken);
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
        $token =  parent::getTokenByCode($code, $clientId, $clientSecret, $grantType, $redirectUri);
        $user = parent::getUserByToken($token->getAccessToken());
        $token->setUser($user);

        return $this->tokenRepository->writeOrUpdate($token);
    }

}
