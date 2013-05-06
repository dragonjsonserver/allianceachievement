<?php
/**
 * @link http://dragonjsonserver.de/
 * @copyright Copyright (c) 2012-2013 DragonProjects (http://dragonprojects.de/)
 * @license http://license.dragonprojects.de/dragonjsonserver.txt New BSD License
 * @author Christoph Herrmann <developer@dragonprojects.de>
 * @package DragonJsonServerAllianceachievement
 */

namespace DragonJsonServerAllianceachievement\Entity;

/**
 * Entityklasse einer Allianzherausforderung
 * @Doctrine\ORM\Mapping\Entity
 * @Doctrine\ORM\Mapping\Table(name="allianceachievements")
 */
class Allianceachievement extends \DragonJsonServerAchievement\Entity\AbstractAchievement
	implements \DragonJsonServerAchievement\Entity\LevelInterface
{
	use \DragonJsonServerAlliance\Entity\AllianceIdTrait;
	use \DragonJsonServerAchievement\Entity\LevelTrait;
	
	/**
	 * @Doctrine\ORM\Mapping\Id 
	 * @Doctrine\ORM\Mapping\Column(type="integer")
	 * @Doctrine\ORM\Mapping\GeneratedValue
	 **/
	protected $allianceachievement_id;
	
	/**
	 * Gibt die ID der Allianzherausforderung zurück
	 * @return integer
	 */
	public function getAllianceachievementId()
	{
		return $this->allianceachievement_id;
	}
	
	/**
	 * Gibt die Attribute der Allianzherausforderung als Array zurück
	 * @return array
	 */
	public function toArray()
	{
		return parent::toArray() + [
			'allianceachievement_id' => $this->getAllianceachievementId(),
			'alliance_id' => $this->getAllianceId(),
		];
	}
}
