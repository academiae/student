<?php

/**
 * The MIT License
 *
 * Copyright (c) 2016, Coding Matters, Inc. (Gab Amba <gamba@gabbydgab.com>)
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

declare(strict_types = 1);

namespace AcademiaeTest\Student;

use Academiae\Student\Service\StudentRecord;
use Academiae\Student\Repository\MasterList;
use Academiae\Student\Entity\Student;
use PHPUnit\Framework\TestCase;

class StudentRecordTest extends TestCase
{
    public function testAppendStudent()
    {
        $student        = $this->getMockStudent();
        $studentList    = $this->getMockStudentList();

        $studentRecord = new StudentRecord($studentList->reveal());
        $result = $studentRecord->append($student);

        $this->assertNull($result);
    }

    /**
     * @expectedException Academiae\Student\Exception\RecordExists
     */
    public function testCannotAppendDuplicateStudentRecord()
    {
        $student        = $this->getMockStudent();
        $studentList    = $this->getMockStudentList();

        $studentList->hasStudent($student)
            ->willReturn(true);

        $studentRecord = new StudentRecord($studentList->reveal());
        $result = $studentRecord->append($student);

        $this->assertNull($result);
    }

    private function getMockStudent()
    {
        $student = $this->prophesize(Student::class);
        return $student->reveal();
    }

    private function getMockStudentList()
    {
        return $this->prophesize(MasterList::class);
    }
}
