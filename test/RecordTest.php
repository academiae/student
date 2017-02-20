<?php

declare(strict_types = 1);

/**
 * All rights reserved.
 * @copyright Copyright (c) 2017 Gab Amba
 * @license https://github.com/gabbydgab/LicenseAgreement MIT License
 */

namespace AcademaieTest\Student;

use PHPUnit\Framework\TestCase;
use Academaie\Student\Record;
use Academaie\Student\Profile;

final class RecordTest extends TestCase
{
    private $record;

    public function setUp()
    {
        $this->record = new Record();
    }

    /**
     * EmptyArchive
     */
    public function testEmptyArchive()
    {
        $this->recordCountShouldBe(0);
    }

    /**
     * New Student Record
     */
    public function testNewStudentRecord()
    {
        $student = $this->createMock(Profile::class);

        $this->record->append($student);

        $this->recordCountShouldBe(1);
    }

    /**
     * Add Multiple Student Records
     */
    public function testAddMultipleStudentRecords()
    {
        $student  = $this->createMock(Profile::class);
        $student2 = $this->createMock(Profile::class);

        $this->record->append($student);
        $this->record->append($student2);

        $this->recordCountShouldBe(2);
    }

    /**
     * Assert record count should be equal with given number
     *
     * @param int $count
     */
    private function recordCountShouldBe(int $count)
    {
        $this->assertEquals($count, $this->record->count());
    }
}
