<?php

namespace Magyp\RendicionDeCajaBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * EventoComprobanteRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class EventoComprobanteRepository extends EntityRepository
{
	public function comprobantesBorrados($idrendicion){
		
		$qb = $this->createQueryBuilder('EC')
				->select('EC', 'comp')
				->join("EC.comprobante", "comp")
				->join("EC.rendicion", "ren")
				->where("ren.id = :id")
				->setParameter("id", $idrendicion)
				->andWhere("comp.borrado = 1")
				//->groupBy('comp')
				->orderBy('EC.fecha','ASC');
		return $qb->getQuery()->getResult();
		;
	}
	public function eventosBorrados($idrendicion){
		
		$qb = $this->createQueryBuilder('EC')
				->select('EC', 'comp')
				->join("EC.comprobante", "comp")
				->join("EC.rendicion", "ren")
				->where("ren.id = :id")
				->setParameter("id", $idrendicion)
				->andWhere("comp.borrado = 1")
				
				->orderBy('EC.fecha','DESC');
				
		return $qb->getQuery()->getResult();
		;
	}	
}