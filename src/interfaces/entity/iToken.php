<?php
namespace makbari\fanapOauthClient\interfaces\entity;

/**
 * Interface iToken
 * @package makbari\fanapOauthClient\interfaces\entity
 */
interface iToken
{
    /**
     * @returnYT mixed
     */
    function getId();

    /**
     * @param $id
     * @return mixed
     */
    function setId($id);

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


    function setUser(iUser $user);

    /**
     * @return mixed
     */
    function __toString();

}
