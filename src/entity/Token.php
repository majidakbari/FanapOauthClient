<?php
namespace makbari\fanapOauthClient\entity;

use makbari\fanapOauthClient\interfaces\entity\iToken;

/**
 * Class Token
 * @package mhndev\digipeyk\services\oauth2\entity\common
 */
class Token implements iToken
{

    /**
     * @var string
     */
    private $access_token;

    /**
     * @var string
     */
    private $expires_in;

    /**
     * @var string
     */
    private $expires_at;

    /**
     * @var string
     */
    private $id_token;

    /**
     * @var string
     */
    private $refresh_token;

    /**
     * @var string
     */
    private $scope;

    /**
     * @var string
     */
    private $token_type;

    /**
     * Token constructor.
     * @param string $access_token
     * @param string $expires_in
     * @param string $id_token
     * @param string $refresh_token
     * @param string $scope
     * @param string $token_type
     */
    public function __construct(
        $access_token,
        $expires_in,
        $id_token,
        $refresh_token,
        $scope,
        $token_type
    )
    {
        $this->access_token  = $access_token;
        $this->expires_in    = $expires_in;
        $this->id_token      = $id_token;
        $this->refresh_token = $refresh_token;
        $this->scope         = $scope;
        $this->token_type    = $token_type;
        $this->expires_at    = (int)$this->expires_in + time();
    }


    /**
     * @param array $token
     * @return static
     */
    public static function fromArray(array $token)
    {
        return new static(
            $token['access_token'],
            $token['expires_in'],
            $token['id_token'],
            $token['refresh_token'],
            $token['scope'],
            $token['token_type']
        );
    }

    /**
     * @return string
     */
    public function getAccessToken() :string
    {
        return $this->access_token;
    }

    /**
     * @param $access_token
     * @return $this
     */
    public function setAccessToken(string $access_token)
    {
        $this->access_token = $access_token;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getExpiresIn() :string
    {
        return $this->expires_in;
    }

    /**
     * @param $expires_in
     * @return $this
     */
    public function setExpiresIn(string $expires_in)
    {
        $this->expires_in = $expires_in;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getExpiresAt() :int
    {
        return $this->expires_at;
    }

    /**
     * @return string
     */
    public function getIdToken() :string
    {
        return $this->id_token;
    }

    /**
     * @param $id_token
     * @return $this
     */
    public function setIdToken(string $id_token)
    {
        $this->id_token = $id_token;

        return $this;
    }

    /**
     * @return string
     */
    public function getRefreshToken() :string
    {
       return $this->refresh_token;
    }

    /**
     * @param $refresh_token
     * @return $this
     */
    public function setRefreshToken(string $refresh_token)
    {
        $this->refresh_token = $refresh_token;

        return $this;
    }

    /**
     * @return string
     */
    public function getScope() : string
    {
        return $this->getScope();
    }

    /**
     * @param string $scope
     * @return $this
     */
    public function setScopeString(string $scope)
    {
        $this->scope = $scope;

        return $this;
    }

    /**
     * @return array
     */
    public function getScopes() : array
    {
        return explode($this->getScope(), ' ');
    }


    /**
     * @return string
     */
    public function getTokenType() :string
    {
        return $this->token_type;
    }

    /**
     * @param $token_type
     * @return $this
     */
    public function setTokenType(string $token_type)
    {
        $this->token_type = $token_type;

        return $this;
    }

    /**
     * @return string
     */
    function __toString() :string
    {
        return $this->token_type.' '. $this->access_token;
    }

}
