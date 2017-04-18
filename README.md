# Non Breaking Space

Filtr, který nahradí mezery za nevhodnými slovy na konci řádku za nezalomitelné mezery.


## Instalace

1. Stáhnout přes composer.

```
composer require pd/non-breaking-space
```

2. Zapnout v aplikaci.

```
extensions:
	nonBreakingSpace: Pd\NonBreakingSpace\DI\Extension
```

3. Zapnout filtr.

```
services:
	latte.latteFactory:
		setup:
			- addFilter('nonbrspace', @Pd\NonBreakingSpace\Filter)
```

