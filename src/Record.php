<?php

declare(strict_types = 1);

/**
 * All rights reserved.
 * @copyright Copyright (c) 2017 Gab Amba
 * @license https://github.com/gabbydgab/LicenseAgreement MIT License
 */

namespace Academaie\Student;

use Academaie\Student\Profile;

final class Record
{
    private $students = [];

    public function append(Profile $profile)
    {
        $this->students [] = $profile;
    }

    public function count() : int
    {
        return \count($this->students);
    }
}
