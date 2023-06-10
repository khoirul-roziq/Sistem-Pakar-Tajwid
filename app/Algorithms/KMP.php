<?php

namespace App\Algorithms;

class KMP
{
    // Knuth Morris Pratt
    public function kmpSearch($pattern, $text)
    {
        $m = strlen($pattern);
        $n = strlen($text);

        // Buat lompatan prefix-suffix
        $lps = $this->computeLPSArray($pattern);

        $occurrences = [];

        $i = 0; // Indeks untuk teks[]
        $j = 0; // Indeks untuk pola[]

        while ($i < $n) {
            if ($pattern[$j] == $text[$i]) {
                $i++;
                $j++;
            }

            if ($j == $m) {
                $occurrences[] = $i - $j; // Tambahkan indeks pola yang ditemukan
                $j = $lps[$j - 1];
            } elseif ($i < $n && $pattern[$j] != $text[$i]) {
                if ($j != 0) {
                    $j = $lps[$j - 1];
                } else {
                    $i++;
                }
            }
        }

        return $occurrences; // Return indeks-indeks dimulainya pola di teks
    }

    private function computeLPSArray($pattern)
    {
        $m = strlen($pattern);
        $lps = [];
        $len = 0; // Panjang prefix-suffix terpanjang sebelumnya

        $lps[0] = 0;
        $i = 1;

        while ($i < $m) {
            if ($pattern[$i] == $pattern[$len]) {
                $len++;
                $lps[$i] = $len;
                $i++;
            } else {
                if ($len != 0) {
                    $len = $lps[$len - 1];
                } else {
                    $lps[$i] = 0;
                    $i++;
                }
            }
        }

        return $lps;
    }
}
