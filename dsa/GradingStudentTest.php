<?php declare(strict_types=1);
namespace Dsa;

use PHPUnit\Framework\TestCase;

final class GradingStudentTest extends TestCase
{
    /**
     * @dataProvider provide
     */
    public function testSample(Array $grades, Array $expected): void
    {
        $output = GradingStudent::run($grades);
        $this->assertSame($expected, $output);
    }

    public function provide(): Array {
        return [
            [[73, 67, 38, 33], [75, 67, 40, 33]],
            [[100, 0, 37, 39], [100, 0, 37, 40]]
        ];
    }
}