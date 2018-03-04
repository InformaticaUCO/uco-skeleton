<?php

/*
 * This file is part of the 'cha' project.
 *
 * (c) Sergio Gómez <sergio@uco.es>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Ramsey\Uuid\Uuid;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\Column(type="guid")
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(name="ssp_id", type="string", length=50, unique=true, nullable=true)
     */
    protected $ssp_id;

    /**
     * @var string
     */
    protected $sspAccessToken;

    public function __construct($id = null)
    {
        $this->id = null === $id ? Uuid::uuid4()->toString() : $id;

        parent::__construct();
    }

    /**
     * @param $username
     *
     * @return $this
     */
    public function setUsername($username)
    {
        $this->username = $username;
        $this->ssp_id = $username;

        return $this;
    }

    /**
     * @return string
     */
    public function getSspId()
    {
        return $this->ssp_id;
    }

    /**
     * @param string $ssp_id
     *
     * @return User
     */
    public function setSspId($ssp_id)
    {
        $this->ssp_id = $ssp_id;
        $this->username = $ssp_id;

        return $this;
    }

    /**
     * @return string
     */
    public function getSspAccessToken()
    {
        return $this->sspAccessToken;
    }

    /**
     * @param string $sspAccessToken
     *
     * @return User
     */
    public function setSspAccessToken($sspAccessToken)
    {
        $this->sspAccessToken = $sspAccessToken;

        return $this;
    }
}
