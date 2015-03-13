<?php

namespace AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * UserRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserSkillRepository extends EntityRepository
{
	
   public function getUserSkillBySkillAndUser($skillId, $userId){
		$query = $this->createQueryBuilder('us')
				->andWhere('us.skill=:skillId')
                ->setParameter('skillId', $skillId)
				->andWhere('us.user=:userId')
				->setParameter('userId', $userId);
		return $query->getQuery()->getOneOrNullResult();
	}
}