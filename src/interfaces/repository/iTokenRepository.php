<?php
namespace makbari\fanapOauthClient\interfaces\repository;

use makbari\fanapOauthClient\interfaces\entity\iToken;

/**
 * Interface iTokenRepository
 * @package makbari\fanapOauthClient\interfaces\repository
 */
interface iTokenRepository
{

    /**
     * @param string $refresh_token
     * @return iToken
     */
    function findByRefreshToken($refresh_token) :iToken;

}
