<?php

namespace makbari\fanapOauthClient\entity;


use makbari\fanapOauthClient\interfaces\entity\iUser;

class User implements iUser
{

    /**
     * User constructor.
     * @param $name
     * @param $nickName
     * @param $birthDate
     * @param $score
     * @param $followingsCount
     * @param $joinDate
     * @param $cellPhoneNumber
     * @param $userId
     * @param $guest
     * @param $chatSendEnable
     * @param $chatReceiveEnable
     */
    public function __construct($name, $nickName, $birthDate, $score, $followingsCount,
                                $joinDate, $cellPhoneNumber, $userId, $guest, $chatSendEnable, $chatReceiveEnable)
    {
        $this->name = $name;
        $this->nickName = $nickName;
        $this->birthDate = $birthDate;
        $this->score = $score;
        $this->followingsCount = $followingsCount;
        $this->joinDate = $joinDate;
        $this->cellPhoneNumber = $cellPhoneNumber;
        $this->userId = $userId;
        $this->guest = $guest;
        $this->chatSendEnable = $chatSendEnable;
        $this->chatReceiveEnable = $chatReceiveEnable;
    }


    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $nickName;

    /**
     * @var int
     */
    private $birthDate;

    /**
     * @var int
     */
    private $score;

    /**
     * @var int
     */
    private $followingsCount;

    /**
     * @var int
     */
    private $joinDate;

    /**
     * @var string
     */
    private $cellPhoneNumber;

    /**
     * @var int
     */
    private $userId;

    /**
     * @var bool
     */
    private $guest;

    /**
     * @var bool
     */
    private $chatSendEnable;

    /**
     * @var bool
     */
    private $chatReceiveEnable;


    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getNickName(): string
    {
        return $this->nickName;
    }

    /**
     * @param string $nickName
     * @return $this
     */
    public function setNickName(string $nickName)
    {
        $this->nickName = $nickName;

        return $this;
    }

    /**
     * @return int
     */
    public function getBirthDate(): int
    {
        return $this->birthDate;
    }

    /**
     * @param int $birthDate
     * @return $this
     */
    public function setBirthDate(int $birthDate)
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    /**
     * @return int
     */
    public function getScore(): int
    {
        return $this->score;
    }

    /**
     * @param int $score
     * @return $this
     */
    public function setScore(int $score)
    {
        $this->score = $score;

        return $this;
    }

    /**
     * @return int
     */
    public function getFollowingsCount(): int
    {
        return $this->followingsCount;
    }

    /**
     * @param int $followingsCount
     * @return $this
     */
    public function setFollowingsCount(int $followingsCount)
    {
        $this->followingsCount = $followingsCount;

        return $this;
    }

    /**
     * @return int
     */
    public function getJoinDate(): int
    {
        return $this->joinDate;
    }

    /**
     * @param int $joinDate
     * @return $this
     */
    public function setJoinDate(int $joinDate)
    {
        $this->joinDate = $joinDate;

        return $this;
    }

    /**
     * @return string
     */
    public function getCellPhoneNumber(): string
    {
        return $this->cellPhoneNumber;
    }

    /**
     * @param $cellPhoneNumber
     * @return $this
     */
    public function setCellPhoneNumber($cellPhoneNumber)
    {
        $this->cellPhoneNumber = $cellPhoneNumber;

        return $this;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     * @return $this
     */
    public function setUserId(int $userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * @return bool
     */
    public function getGuest(): bool
    {
        return $this->guest;
    }

    /**
     * @param $guest
     * @return $this
     */
    public function setGuest($guest)
    {
        $this->guest = $guest;

        return $this;
    }


    /**
     * @return bool
     */
    public function getChatSendEnable(): bool
    {
        return $this->chatReceiveEnable;
    }

    /**
     * @param bool $chatSendEnable
     * @return $this
     */
    public function setChatSendEnable(bool $chatSendEnable)
    {
        $this->chatSendEnable = $chatSendEnable;

        return $this;
    }

    /**
     * @return bool
     */
    public function getChatReceiveEnable(): bool
    {
        return $this->chatReceiveEnable;
    }

    /**
     * @param bool $chatReceiveEnable
     * @return $this
     */
    public function setChatReceiveEnable(bool $chatReceiveEnable)
    {
        $this->chatReceiveEnable = $chatReceiveEnable;

        return $this;
    }

    /**
     * @param array $data
     * @return static
     */
    public static function fromArray(array $data)
    {

        return new static ($data['name'], $data['nickName'], $data['birthDate'], $data['score'],
                           $data['followingCount'], $data['joinDate'], $data['cellphoneNumber'],
                           $data['userId'], $data['guest'], $data['chatSendEnable'], $data['chatReceiveEnable']);
    }

    /**
     * @return array
     */
    public function preview()
    {
        return [
            'name' => $this->getName(),
            'nickName' => $this->getNickName(),
            'birthDate' => $this->getBirthDate(),
            'score' => $this->getScore(),
            'followingsCount' => $this->getFollowingsCount(),
            'joinDate' => $this->getJoinDate(),
            'cellphoneNumber' => $this->getCellPhoneNumber(),
            'userId' => $this->getUserId(),
            'guest' => $this->getGuest(),
            'chatSendEnable' => $this->getChatSendEnable(),
            'chatReceiveEnable' => $this->getChatReceiveEnable(),
        ];
    }


}