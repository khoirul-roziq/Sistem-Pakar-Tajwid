<?php

namespace App\Algorithms;

class DLD
{
    // Damerau–Levenshtein Distance
    public function dldSimilarity($str1, $str2)
    {
        $len1 = strlen($str1);
        $len2 = strlen($str2);

        $dld = [];
        for ($i = 0; $i <= $len1; $i++) {
            $dld[$i] = [];
            $dld[$i][0] = $i;
        }
        for ($j = 0; $j <= $len2; $j++) {
            $dld[0][$j] = $j;
        }

        for ($i = 1; $i <= $len1; $i++) {
            for ($j = 1; $j <= $len2; $j++) {
                $cost = $str1[$i - 1] != $str2[$j - 1];
                $dld[$i][$j] = min(
                    $dld[$i - 1][$j] + 1,                  // Deletion
                    $dld[$i][$j - 1] + 1,                  // Insertion
                    $dld[$i - 1][$j - 1] + $cost           // Substitution
                );

                if ($i > 1 && $j > 1 && $str1[$i - 1] == $str2[$j - 2] && $str1[$i - 2] == $str2[$j - 1]) {
                    $dld[$i][$j] = min($dld[$i][$j], $dld[$i - 2][$j - 2] + $cost); // Transposition
                }
            }
        }

        return $dld[$len1][$len2];
    }
}
