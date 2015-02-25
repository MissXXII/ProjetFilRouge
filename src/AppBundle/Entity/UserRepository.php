<?php

namespace AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * UserRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserRepository extends EntityRepository
{
	
	public function getUsersWithProject() {
		$query = $this->createQueryBuilder('u')
				->leftjoin('u.userProjects', 'up')
				->addSelect('up')
				->leftJoin('u.leadProjects', 'l')
				->addSelect('l')
				->orderBy('u.lastname', 'DESC');
		return $query->getQuery()->getResult();
	}
	
}
