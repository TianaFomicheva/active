<?php
namespace Children\ChildBundle\Entity;
 
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
 
/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User implements UserInterface
{
     /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     * @var integer $id
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string username
     */
    protected $username;
 
    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string password
     */
    protected $password;
 
    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string salt
     */
    protected $salt;
 
    /**
     * @ORM\ManyToMany(targetEntity="Role")
     * @ORM\JoinTable(name="role",
     *     joinColumns={@ORM\JoinColumn(name="id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="name", referencedColumnName="id")}
     * )
     *
     * @var ArrayCollection $userRoles
     */
    protected $userRoles;
 
         public function getId()
    {
        return $this->id;
    }
 
    /**
     * Геттер для имени пользователя.
     *
     * @return string The username.
     */
    public function getUsername()
    {
        return $this->username;
    }
 
    /**
     * Сеттер для имени пользователя.
     *
     * @param string $value The username.
     */
    public function setUsername($value)
    {
        $this->username = $value;
    }
 
    /**
     * Геттер для пароля.
     *
     * @return string The password.
     */
    public function getPassword()
    {
        return $this->password;
    }
 
    /**
     * Сеттер для пароля.
     *
     * @param string $value The password.
     */
    public function setPassword($value)
    {
        $this->password = $value;
    }
 
    /**
     * Геттер для соли к паролю.
     *
     * @return string The salt.
     */
    public function getSalt()
    {
        return $this->salt;
    }
 
    /**
     * Сеттер для соли к паролю.
     *
     * @param string $value The salt.
     */
    public function setSalt($value)
    {
        $this->salt = $value;
    }
 
    /**
     * Геттер для ролей пользователя.
     *
     * @return ArrayCollection A Doctrine ArrayCollection
     */
    public function getUserRoles()
    {
        return $this->userRoles;
    }
 
    /**
     * Конструктор класса User
     */
    public function __construct()
    {

        $this->userRoles = new ArrayCollection();
        $this->createdAt = new \DateTime();
    }
 
    /**
     * Сброс прав пользователя.
     */
    public function eraseCredentials()
    {
 
    }
 
    /**
     * Геттер для массива ролей.
     * 
     * @return array An array of Role objects
     */
    public function getRoles()
    {
        return $this->getUserRoles()->toArray();
    }
 
    /**
     * Сравнивает пользователя с другим пользователем и определяет
     * один и тот же ли это человек.
     * 
     * @param UserInterface $user The user
     * @return boolean True if equal, false othwerwise.
     */
    public function equals(UserInterface $user)
    {
        return md5($this->getUsername()) == md5($user->getUsername());
    }
 
    // ...
 
}
