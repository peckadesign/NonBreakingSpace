<?php declare(strict_types = 1);

namespace PdTests\NonBreakingSpace;

require __DIR__ . '/bootstrap.php';


/**
 * @testCase
 */
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


	public function testHtmlTags()
	{
		$filter = new \Pd\NonBreakingSpace\Filter();

		$tags = [
			'<a>',
			'<a href="">',
			//'<b>',
			//'<b class="">',
			//'<i>',
			//'<i class="">',
		];
		foreach ($tags as $tag) {
			$translated = $filter->__invoke($tag);
			\Tester\Assert::equal(
				sprintf('%s (%s)', $tag, \ParagonIE\ConstantTime\Encoding::hexEncodeUpper($tag)),
				sprintf('%s (%s)', $translated, \ParagonIE\ConstantTime\Encoding::hexEncodeUpper($translated))
			);
		}
	}

}


(new OneSymbolTest())->run();
