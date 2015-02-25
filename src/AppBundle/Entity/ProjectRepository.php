<?php

namespace AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * ProjectRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProjectRepository extends EntityRepository {

	public function findProjectsEager() {
		$query = $this->createQueryBuilder('p')
				->leftJoin('p.categories', 'c')
				->addSelect('c')
				->leftJoin('p.stages', 's')
				->addSelect('s')
				->leftJoin('p.userProjects', 'up')
				->addSelect('up')
				->leftJoin('p.leader', 'l')
				->addSelect('l');

		return $query->getQuery()->getResult();
	}
	
	public function findProjectEager($id) {
		$query = $this->createQueryBuilder('p')
				->leftJoin('p.categories', 'c')
				->addSelect('c')
				->leftJoin('p.stages', 's')
				->addSelect('s')
				->leftJoin('p.userProjects', 'up')
				->addSelect('up')
				->leftJoin('up.user', 'u')
				->addSelect('u')
				->leftJoin('p.leader', 'l')
				->addSelect('l')
				->where('p.id = :id')
				->setParameter('id', $id);

		return $query->getQuery()->getOneOrNullResult();
	}

	public function getProjectsStatusPositive() {
		$query = $this->createQueryBuilder('p')
				->leftjoin('p.categories', 'c')
				->addSelect('c')
				->where('p.status >= 0')
				->orderBy('p.creationDate', 'DESC');
		return $query->getQuery()->getResult();
	}
}
