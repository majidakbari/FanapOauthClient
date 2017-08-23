<?php
namespace makbari\fanapOauthClient\interfaces\repository;

use makbari\fanapOauthClient\exceptions\ModelNotFoundException;
use makbari\fanapOauthClient\interfaces\entity\iToken;

/**
 * Interface iTokenRepository
 * @package makbari\fanapOauthClient\interfaces\repository
 */
interface iTokenRepository
{

    /**
     * @param string $token
     * @return iToken
     */
    function findByToken($token) :iToken;

    /**
     * @param iToken $token
     * @return iToken
     */
    function updateToken(iToken $token) :iToken;

    /**
     * @param iToken $token
     * @return iToken
     */
    function writeOrUpdate(iToken $token) :iToken ;

}
