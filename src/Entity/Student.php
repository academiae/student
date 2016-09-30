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

namespace Academiae\Student\Entity;

class Student
{
    private $first_name;
    private $last_name;
    private $middle_name;

    public function __construct(string $first_name, string $middle_name, string $last_name)
    {
        $this->first_name   = $first_name;
        $this->middle_name  = $middle_name;
        $this->last_name    = $last_name;
    }

    public function firstName()
    {
        return $this->first_name;
    }

    public function middleName()
    {
        return $this->middle_name;
    }

    public function lastName()
    {
        return $this->last_name;
    }

    public function toArray()
    {
        return [
            'first_name'    => $this->firstName(),
            'middle_name'   => $this->middleName(),
            'last_name'     => $this->lastName()
        ];
    }
}
