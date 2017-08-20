<?php

namespace makbari\fanapOauthClient\interfaces\entity;


interface iUser
{
    /**
     * @return string
     */
    function getName();

    /**
     * @return string
     */
    function getNickName();

    /**
     * @return int
     */
    function getBirthDate();

    /**
     * @return int
     */
    function getScore();

    /**
     * @return int
     */
    function getFollowingsCount();

    /**
     * @return int
     */
    function getJoinDate();

    /**
     * @return string
     */
    function getCellPhoneNumber();

    /**
     * @return int
     */
    function getUserId();

    /**
     * @return bool
     */
    function getGuest();

    /**
     * @return bool
     */
    function getChatSendEnable();

    /**
     * @return bool
     */
    function getChatReceiveEnable();


}