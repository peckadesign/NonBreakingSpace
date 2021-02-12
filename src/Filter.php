<?php declare(strict_types = 1);

namespace Pd\NonBreakingSpace;

class Filter
{

	private const CHAR = 'A-Za-z\x{C0}-\x{2FF}\x{370}-\x{1EFF}';


	/**
	 * @throws \Nette\Utils\RegexpException
	 */
	public function __invoke(string $string, string $chars = 'ksvzouiKSVZOUIA'): string
	{
		return \Nette\Utils\Strings::replace(
			$string,
			'#(?<=^|[^0-9' . self::CHAR . '])([\x17-\x1F]*[' . $chars . '][\x17-\x1F]*)\s++(?=[\x17-\x1F]*[0-9' . self::CHAR . '])#mus',
			"\$1\xc2\xa0"
		);
	}

}
