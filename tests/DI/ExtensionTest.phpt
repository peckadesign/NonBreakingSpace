<?php declare(strict_types = 1);

namespace PdTests\NonBreakingSpace\DI;

require __DIR__ . '/../bootstrap.php';


class ExtensionTest extends \Tester\TestCase
{

	public function testExtension()
	{
		$configurator = new \Nette\Configurator();
		$configurator->addConfig(__DIR__ . '/extension.neon');
		$configurator->setTempDirectory(__DIR__);
		$container = $configurator->createContainer();

		$service = $container->getByType(\Pd\NonBreakingSpace\Filter::class);

		\Tester\Assert::equal(\Pd\NonBreakingSpace\Filter::class, get_class($service));
	}
}


(new ExtensionTest())->run();
