<?php declare(strict_types=1);
namespace Dsa;

use PHPUnit\Framework\TestCase;

final class CountApplesAndOrangesTest extends TestCase
{
    /**
     * @dataProvider provide
     */
    public function testSample(array $data, array $expected): void
    {
        $count = CountApplesAndOranges::solve(...$data);
        $this->assertSame($expected, $count);
    }

    public function provide(): array {
        return [
            [
                [
                    "startOfHouse" => 7, 
                    "endOfHouse" => 11, 
                    "locOfAppleTree" => 5, 
                    "locOfOrangeTree" => 15, 
                    "locOfFallenApples" => [-2, 2, 1], 
                    "locOfFallenOranges" => [5, -6]
                ],
                [
                    "appleCount" => 1,
                    "orangeCount" => 1,
                ]
            ]
        ];
    }
}