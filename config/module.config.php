<?php
/**
 * @link http://dragonjsonserver.de/
 * @copyright Copyright (c) 2012-2013 DragonProjects (http://dragonprojects.de/)
 * @license http://license.dragonprojects.de/dragonjsonserver.txt New BSD License
 * @author Christoph Herrmann <developer@dragonprojects.de>
 * @package DragonJsonServerAllianceachievement
 */

/**
 * @return array
 */
return [
	'dragonjsonserverallianceachievement' => [
		'achievements' => [],
	],
	'dragonjsonserver' => [
	    'apiclasses' => [
	        '\DragonJsonServerAllianceachievement\Api\Allianceachievement' => 'Allianceachievement',
	    ],
	],
	'service_manager' => [
		'invokables' => [
            '\DragonJsonServerAllianceachievement\Service\Allianceachievement' => '\DragonJsonServerAllianceachievement\Service\Allianceachievement',
		],
	],
	'doctrine' => [
		'driver' => [
			'DragonJsonServerAllianceachievement_driver' => [
				'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
				'cache' => 'array',
				'paths' => [
					__DIR__ . '/../src/DragonJsonServerAllianceachievement/Entity'
				],
			],
			'orm_default' => [
				'drivers' => [
					'DragonJsonServerAllianceachievement\Entity' => 'DragonJsonServerAllianceachievement_driver'
				],
			],
		],
	],
];
