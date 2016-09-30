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

namespace AcademiaeTest\Student\Entity;

use Faker\Factory as FakerFactory;
use Faker\Provider\en_US\Person;
use PHPUnit\Framework\TestCase;
use Academiae\Student\Entity\Student;

class StudentTest extends TestCase
{
    private $person;

    public function setUp()
    {
        parent::setUp();
        $this->person = new Person(FakerFactory::create());
    }

    public function testStudentInformation()
    {
        $first_name     = $this->person->firstName();
        $middle_name    = $this->person->lastName();
        $last_name      = $this->person->lastName();

        $student = new Student($first_name, $middle_name, $last_name);

        $this->assertEquals($first_name, $student->firstName());
        $this->assertEquals($middle_name, $student->middleName());
        $this->assertEquals($last_name, $student->lastName());
        $this->assertEquals(
            [
                'first_name'    => $first_name,
                'middle_name'   => $middle_name,
                'last_name'     => $last_name
            ],
            $student->toArray()
        );
    }
}
