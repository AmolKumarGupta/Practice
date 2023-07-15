<?php

namespace Dsa;

class CountApplesAndOranges
{
    /**
     * @param array<array-key,int> $locOfFallenApples
     * relative location of fallen fruit from their corresponding tree
     * 
     * @param array<array-key,int> $locOfFallenOranges
     * relative location of fallen fruit from their corresponding tree
     */

    public static function solve(
        int $startOfHouse, 
        int $endOfHouse, 
        int $locOfAppleTree, 
        int $locOfOrangeTree, 
        array $locOfFallenApples, 
        array $locOfFallenOranges
    ): array
    {
        $appleCount = 0;
        $orangeCount = 0;

        foreach ($locOfFallenApples as $apple) {
            $exactLoc = $locOfAppleTree + $apple;
            if ($exactLoc >= $startOfHouse && $endOfHouse >= $exactLoc) {
                $appleCount++;
            }
        }

        foreach ($locOfFallenOranges as $orange) {
            $exactLoc = $locOfOrangeTree + $orange;
            if ($exactLoc >= $startOfHouse && $endOfHouse >= $exactLoc) {
                $orangeCount++;
            }
        }

        return compact('appleCount', 'orangeCount');
    }

}
