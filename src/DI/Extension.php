<?php declare(strict_types = 1);

namespace Pd\NonBreakingSpace\DI;

class Extension extends \Nette\DI\CompilerExtension
{

	public function loadConfiguration()
	{
		parent::loadConfiguration();

		$builder = $this->getContainerBuilder();

		$builder
			->addDefinition($this->prefix('oneSymbolFilter'))
			->setFactory(\Pd\NonBreakingSpace\Filter::class)
		;

	}

}
