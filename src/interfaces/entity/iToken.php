<?php
namespace makbari\fanapOauthClient\interfaces\entity;

/**
 * Interface iToken
 * @package makbari\fanapOauthClient\interfaces\entity
 */
interface iToken
{
    /**
     * @return string
     */
    function getAccessToken();

    /**
     * @return int|string
     */
    function getExpiresIn();

    /**
     * @return int
     */
    function getExpiresAt();

    /**
     * @return string
     */
    function getIdToken();

    /**
     * @return string
     */
    function getRefreshToken();

    /**
     * @return string
     */
    function getScope();


    /**
     * @return string
     */
    function getTokenType();


    /**
     * @return iUser
     */
    function getUser();

    /**
     * @return mixed
     */
    function __toString();

}
