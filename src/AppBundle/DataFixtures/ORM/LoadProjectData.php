<?php

namespace AppBundle\DataFixtures\ORM;

use BlogBundle\Entity\Project;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadProjectData extends AbstractFixture implements OrderedFixtureInterface {

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager) {
	$smallDesc = "Class aptent taciti sociosqu ad litora torquent per conubia "
		. "nostra, per inceptos himenaeos volutpat.";
	$longDesc = "Aenean vitae hendrerit orci, fringilla vestibulum nulla. Ut iaculis diam a enim porttitor, nec sagittis est blandit. Etiam vestibulum vel ex nec bibendum. Vivamus dignissim pellentesque sem id sagittis. Nam lobortis rhoncus ante, et luctus sapien scelerisque a. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla faucibus diam sem, id malesuada augue eleifend id. Donec sit amet eleifend lorem. Aenean suscipit tellus elementum lacus fermentum, ut faucibus turpis commodo. Mauris viverra ante in lobortis hendrerit. Integer facilisis elit fermentum turpis egestas ullamcorper. Sed sagittis dolor ut velit facilisis euismod. Suspendisse potenti. Vestibulum eget pharetra augue, id molestie eros. Donec aliquet efficitur quam vitae ullamcorper.";

	$project1 = new Project();
	$project1->setTitle('Liste de contacts en PHP')
		->setSmallDescription($smallDesc)
		->setLongDescription($longDesc)
		->setStartDate(new \DateTime())
		->setEndDate(new \DateTime())
		->setCreationDate(new \DateTime())
		->setMaxMembers(5)
		->setStatus(-1)
		->addCategory($this->getReference('category1'))
		->setLeader($this->getReference('User1'));

	$project2 = new Project();
	$project2->setTitle('Liste de contacts en Javascript')
		->setSmallDescription($smallDesc)
		->setLongDescription($longDesc)
		->setStartDate(new \DateTime())
		->setEndDate(new \DateTime())
		->setCreationDate(new \DateTime())
		->setMaxMembers(10)
		->setStatus(0)
		->addCategory($this->getReference('category2'))
		->setLeader($this->getReference('User2'));

	$project3 = new Project();
	$project3->setTitle('Liste de contacts en HTML-CSS')
		->setSmallDescription($smallDesc)
		->setLongDescription($longDesc)
		->setStartDate(new \DateTime())
		->setEndDate(new \DateTime())
		->setCreationDate(new \DateTime())
		->setMaxMembers(3)
		->setStatus(1)
		->addCategory($this->getReference('category3'))
		->setLeader($this->getReference('User1'))
		->addMember($this->getReference('User2'));

	$project4 = new Project();
	$project4->setTitle('Liste de contacts en Java J2EE')
		->setSmallDescription($smallDesc)
		->setLongDescription($longDesc)
		->setStartDate(new \DateTime())
		->setEndDate(new \DateTime())
		->setCreationDate(new \DateTime())
		->setMaxMembers(7)
		->setStatus(2)
		->addCategory($this->getReference('category4'))
		->setLeader($this->getReference('User3'))
		->addMember($this->getReference('User4'))
		->addMember($this->getReference('User1'));

	$project5 = new Project();
	$project5->setTitle('Liste de contacts C++')
		->setSmallDescription($smallDesc)
		->setLongDescription($longDesc)
		->setStartDate(new \DateTime())
		->setEndDate(new \DateTime())
		->setCreationDate(new \DateTime())
		->setMaxMembers(13)
		->setStatus(3)
		->addCategory($this->getReference('category5'))
		->setLeader($this->getReference('User5'))
		->addMember($this->getReference('User2'))
		->addMember($this->getReference('User3'));

	$project6 = new Project();
	$project6->setTitle('Liste de contacts en PHP et HTML-CSS')
		->setSmallDescription($smallDesc)
		->setLongDescription($longDesc)
		->setStartDate(new \DateTime())
		->setEndDate(new \DateTime())
		->setCreationDate(new \DateTime())
		->setMaxMembers(3)
		->setStatus(4)
		->addCategory($this->getReference('category1'))
		->addCategory($this->getReference('category3'))
		->setLeader($this->getReference('User2'))
		->addMember($this->getReference('User5'))
		->addMember($this->getReference('User3'));

	$project7 = new Project();
	$project7->setTitle('Liste de contacts en Javascript et HTML')
		->setSmallDescription($smallDesc)
		->setLongDescription($longDesc)
		->setStartDate(new \DateTime())
		->setEndDate(new \DateTime())
		->setCreationDate(new \DateTime())
		->setMaxMembers(8)
		->setStatus(5)
		->addCategory($this->getReference('category2'))
		->addCategory($this->getReference('category3'))
		->setLeader($this->getReference('User1'))
		->addMember($this->getReference('User4'))
		->addMember($this->getReference('User3'))
		->addMember($this->getReference('User2'));
	
	$project8 = new Project();
	$project8->setTitle('Liste de contacts en JAVA et PHP')
		->setSmallDescription($smallDesc)
		->setLongDescription($longDesc)
		->setStartDate(new \DateTime())
		->setEndDate(new \DateTime())
		->setCreationDate(new \DateTime())
		->setMaxMembers(12)
		->setStatus(6)
		->addCategory($this->getReference('category4'))
		->addCategory($this->getReference('category1'))
		->setLeader($this->getReference('User4'))
		->addMember($this->getReference('User5'))
		->addMember($this->getReference('User1'))
		->addMember($this->getReference('User3'));
	
	$project9 = new Project();
	$project9->setTitle('Liste de contacts en C++ et JAVA')
		->setSmallDescription($smallDesc)
		->setLongDescription($longDesc)
		->setStartDate(new \DateTime())
		->setEndDate(new \DateTime())
		->setCreationDate(new \DateTime())
		->setMaxMembers(6)
		->setStatus(7)
		->addCategory($this->getReference('category5'))
		->addCategory($this->getReference('category4'))
		->setLeader($this->getReference('User3'))
		->addMember($this->getReference('User1'))
		->addMember($this->getReference('User5'))
		->addMember($this->getReference('User4'));

	$manager->persist($project1);
	$manager->persist($project2);
	$manager->persist($project3);
	$manager->persist($project4);
	$manager->persist($project5);
	$manager->persist($project6);
	$manager->persist($project7);
	$manager->persist($project8);
	$manager->persist($project9);
	
	$manager->flush();

	$this->addReference('project1', $project1);
	$this->addReference('project2', $project2);
	$this->addReference('project3', $project3);
	$this->addReference('project4', $project4);
	$this->addReference('project5', $project5);
	$this->addReference('project6', $project6);
	$this->addReference('project7', $project7);
	$this->addReference('project8', $project8);
	$this->addReference('project9', $project9);
	
    }

    public function getOrder() {
	return 7;
    }

}