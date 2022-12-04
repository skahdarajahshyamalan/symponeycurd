<?php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Product")
 */
class User 
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string",length=100)
     */
    private $name;

    /**
      * @ORM\Column(type="text")
      */
    private $email;

    /**
      * @ORM\Column(type="text")
     */
    private $discription;

   

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set discription
     *
     * @param string $discription
     *
     * @return User
     */
    public function setDiscription($discription)
    {
        $this->discription = $discription;

        return $this;
    }

    /**
     * Get discription
     *
     * @return string
     */
    public function getDiscription()
    {
        return $this->discription;
    }
}
