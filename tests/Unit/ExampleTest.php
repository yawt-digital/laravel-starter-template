<?php

use function PHPUnit\Framework\assertTrue;

test('true is not false', fn () => assertTrue(true != false));
