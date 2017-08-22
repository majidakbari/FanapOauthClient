<?php
namespace makbari\fanapOauthClient;

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
     * @throws UnAuthorizedException
     */
    public function getOrUpdateToken(string $token)
    {
        try{
            $token = $this->tokenRepository->findByToken($token);
            if ($token->getExpiresAt() > time()){
                return $token;
            }
            else{
                return $this->renewToken($token);
            }
        }
        catch (\Exception $e){
            throw new UnAuthorizedException();
        }
    }

    /**
     * @param iToken $token
     * @return array|mixed
     */
    public function renewToken(iToken $token)
    {
        $newToken = $this->getTokenByRefreshToken($token->getRefreshToken());

        return $this->tokenRepository->updateToken($newToken);
    }

    /**
     * @param string $code
     * @param string $clientId
     * @param string $clientSecret
     * @param string $grantType
     * @param string $redirectUri
     * @return iToken
     */
    public function getTokenByCode(string $code, string $clientId, string $clientSecret, string $grantType, string $redirectUri) :iToken
    {
        return parent::getTokenByCode($code, $clientId, $clientSecret, $grantType, $redirectUri); // TODO: Change the autogenerated stub
    }
}
