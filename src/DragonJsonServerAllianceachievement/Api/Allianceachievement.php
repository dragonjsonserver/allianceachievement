<?php
/**
 * @link http://dragonjsonserver.de/
 * @copyright Copyright (c) 2012-2013 DragonProjects (http://dragonprojects.de/)
 * @license http://license.dragonprojects.de/dragonjsonserver.txt New BSD License
 * @author Christoph Herrmann <developer@dragonprojects.de>
 * @package DragonJsonServerAllianceachievement
 */

namespace DragonJsonServerAllianceachievement\Api;

/**
 * API Klasse zur Verwaltung von Allianzherausforderungen
 */
class Allianceachievement
{
	use \DragonJsonServer\ServiceManagerTrait;

	/**
	 * Gibt die Allianceherausforderungen der aktuellen Allianz zurück
	 * @return array
	 * @DragonJsonServerAccount\Annotation\Session
	 * @DragonJsonServerAvatar\Annotation\Avatar
	 * @DragonJsonServerAlliance\Annotation\Alliance
	 */
	public function getAllianceachievements()
	{
		$serviceManager = $this->getServiceManager();

		$allianceavatar = $serviceManager->get('\DragonJsonServerAlliance\Service\Allianceavatar')->getAllianceavatar();
		$allianceachievements = $serviceManager->get('\DragonJsonServerAllianceachievement\Service\Allianceachievement')->getAllianceachievementsByAllianceId($allianceavatar->getAllianceId()); 
		return $serviceManager->get('\DragonJsonServerDoctrine\Service\Doctrine')->toArray($allianceachievements);
	}
}
