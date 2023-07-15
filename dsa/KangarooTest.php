<?php declare(strict_types=1);
namespace Dsa;

use PHPUnit\Framework\TestCase;

final class KangarooTest extends TestCase
{
    /**
     * @dataProvider provide
     */
    public function testSample(array $data, bool $expected): void
    {
        $count = Kangaroo::solve(...$data);
        $this->assertSame($expected, $count);
    }

    public function provide(): array {
        return [
            [
                [
                    "firstKangaroo" => 7, 
                    "firstKangarooSpeed" => 11, 
                    "secondKangaroo" => 5, 
                    "secondKangarooSpeed" => 15, 
                ],
                false
            ],
            [
                [
                    "firstKangaroo" => 0, 
                    "firstKangarooSpeed" => 3, 
                    "secondKangaroo" => 4, 
                    "secondKangarooSpeed" => 2, 
                ],
                true
            ]
        ];
    }
}