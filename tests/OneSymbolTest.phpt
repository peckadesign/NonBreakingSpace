<?php declare(strict_types = 1);

namespace PdTests\NonBreakingSpace;

require __DIR__ . '/bootstrap.php';


class OneSymbolTest extends \Tester\TestCase
{

	public function testOneSymbol()
	{
		$filter = new \Pd\NonBreakingSpace\Filter();

		foreach (str_split('ksvzouiKSVZOUIA') as $oneSymbol) {
			$output = $filter->__invoke('slovo ' . $oneSymbol . ' slovo');

			\Tester\Assert::equal("slovo " . $oneSymbol . "\xc2\xa0slovo", $output);
		}
	}
}


(new OneSymbolTest())->run();
