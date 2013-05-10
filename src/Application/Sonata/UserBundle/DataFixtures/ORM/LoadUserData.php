<?php

namespace Application\Sonata\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Application\Sonata\UserBundle\Entity\User;

class LoadUserData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $admin = new User();
        $admin->setUsername('admin');
        $admin->setEmail('admin@test.com');
        $admin->setEnabled(true);
        $admin->setRoles(array('ROLE_SUPER_ADMIN'));
        $admin->setPlainPassword('password');
        $manager->persist($admin);

        $user = new User();
        $user->setUsername('user');
        $user->setEmail('user@test.com');
        $user->setEnabled(true);
        $user->setPlainPassword('password');
        $manager->persist($user);

        $manager->flush();
    }
}