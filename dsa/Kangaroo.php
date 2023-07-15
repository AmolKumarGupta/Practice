<?php

namespace Dsa;

class Kangaroo
{
    public static function solve(
        int $firstKangaroo,
        int $firstKangarooSpeed,
        int $secondKangaroo,
        int $secondKangarooSpeed
    ): bool
    {
        if($firstKangaroo == $secondKangaroo) {
            return true;
        }

        if ($firstKangarooSpeed == $secondKangarooSpeed) {
            return false;
        }

        $rem = ($secondKangaroo - $firstKangaroo) % ($firstKangarooSpeed - $secondKangarooSpeed);
        $ab = ($secondKangaroo - $firstKangaroo) / ($firstKangarooSpeed - $secondKangarooSpeed);
        
        if ($rem == 0 && $ab > 0) {
            return true;
        }else {
            return false;
        }
    }

}
