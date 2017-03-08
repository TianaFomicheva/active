<?php
namespace Children\ChildBundle\DataFixtures\ORM;
 
use Doctrine\Common\DataFixtures\FixtureInterface;
use Children\ChildBundle\Entity\User;
use Children\ChildBundle\Entity\Role;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;
 
class FixtureLoader implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // СЃРѕР·РґР°РЅРёРµ СЂРѕР»Рё ROLE_ADMIN
       $role = new Role();
       $role->setName('ROLE_ADMIN');
 
        $manager->persist($role);
        // СЃРѕР·РґР°РЅРёРµ РїРѕР»СЊР·РѕРІР°С‚РµР»СЏ
        $user = new User();
        $user->setFirstName('John');
        $user->setLastName('Doe');
        $user->setEmail('john@example.com');
        $user->setUsername('john.doe');
        $user->setPassword('admin');     
        $user->setSalt(md5(time()));
 
        // С€РёС„СЂСѓРµС‚ Рё СѓСЃС‚Р°РЅР°РІР»РёРІР°РµС‚ РїР°СЂРѕР»СЊ РґР»СЏ РїРѕР»СЊР·РѕРІР°С‚РµР»СЏ,
        // СЌС‚Рё РЅР°СЃС‚СЂРѕР№РєРё СЃРѕРІРїР°РґР°СЋС‚ СЃ РєРѕРЅС„РёРіСѓСЂР°С†РёРѕРЅРЅС‹РјРё С„Р°Р№Р»Р°РјРё
        $encoder = new MessageDigestPasswordEncoder('sha512', true, 10);
        $password = $encoder->encodePassword('admin', $user->getSalt());
        $user->setPassword($password);
 
 //       $user->getUserRoles()->add($role);
 
        $manager->persist($user);

 
 
        // ...
    }
}
