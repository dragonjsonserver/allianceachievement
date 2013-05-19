<?php
/**
 * @link http://dragonjsonserver.de/
 * @copyright Copyright (c) 2012-2013 DragonProjects (http://dragonprojects.de/)
 * @license http://license.dragonprojects.de/dragonjsonserver.txt New BSD License
 * @author Christoph Herrmann <developer@dragonprojects.de>
 * @package DragonJsonServerAllianceachievement
 */

namespace DragonJsonServerAllianceachievement\Service;

/**
 * Serviceklasse zur Verwaltung von Allianzherausforderungen
 */
class Allianceachievement
{
	use \DragonJsonServer\ServiceManagerTrait;
	use \DragonJsonServer\EventManagerTrait;
	use \DragonJsonServerDoctrine\EntityManagerTrait;

	/**
	 * Entfernt alle Allianzherausforderungen mit der AllianceID
	 * @param integer $alliance_id
	 * @return Allianceachievement
	 */
	public function removeAllianceachievementsByAllianceId($alliance_id)
	{
		$entityManager = $this->getEntityManager();
		
		$entityManager
			->createQuery('
				DELETE FROM \DragonJsonServerAllianceachievement\Entity\Allianceachievement allianceachievement
				WHERE allianceachievement.alliance_id = :alliance_id
			')
			->execute(['alliance_id' => $alliance_id]);
	}
	
	/**
	 * Gibt die Aallianzherausforderung mit der AllianceID und dem Gamedesign Identifier zurück
	 * @param integer $alliance_id
	 * @param string $gamedesign_identifier
	 * @return \DragonJsonServerAllianceachievement\Entity\Allianceachievement
	 * @throws \DragonJsonServer\Exception
	 */
	public function getAllianceachievementByAllianceIdAndGamedesignIdentifier($alliance_id, $gamedesign_identifier)
	{
		$entityManager = $this->getEntityManager();
	
		$allianceachievement = $entityManager
			->getRepository('\DragonJsonServerAllianceachievement\Entity\Allianceachievement')
		    ->findOneBy(['alliance_id' => $alliance_id, 'gamedesign_identifier' => $gamedesign_identifier]);
		if (null === $allianceachievement) {
			$achievements = $this->getServiceManager()->get('Config')['dragonjsonserverallianceachievement']['achievements'];
			if (!in_array($gamedesign_identifier, $achievements)) {
				throw new \DragonJsonServer\Exception('invalid gamedesign_identifier', ['gamedesign_identifier' => $gamedesign_identifier]);
			}
			$allianceachievement = (new \DragonJsonServerAllianceachievement\Entity\Allianceachievement())
				->setAllianceId($alliance_id)
				->setGamedesignIdentifier($gamedesign_identifier);
		}
		return $allianceachievement;
	}

	/**
	 * Gibt die Allianzherausforderungen mit der AllianceID zurück
	 * @param integer $alliance_id
	 * @return array
	 */
	public function getAllianceachievementsByAllianceId($alliance_id)
	{
		$entityManager = $this->getEntityManager();
	
		return $entityManager
			->getRepository('\DragonJsonServerAllianceachievement\Entity\Allianceachievement')
		    ->findBy(['alliance_id' => $alliance_id]);
	}
	
	/**
	 * Aktualisiert die Allianzherausforderung mit den übergebenen Daten
	 * @param integer $alliance_id
	 * @param string $gamedesign_identifier
	 * @param mixed $data
	 * @return \DragonJsonServerAllianceachievement\Entity\Allianceachievement
	 */
	public function changeAllianceachievement($alliance_id, $gamedesign_identifier, $data)
	{
		$allianceachievement = $this->getAllianceachievementByAllianceIdAndGamedesignIdentifier($alliance_id, $gamedesign_identifier);
		$this->getServiceManager()->get('\DragonJsonServerAchievement\Service\Achievement')->changeAchievement($allianceachievement, $data);
		return $allianceachievement;
	}
}
