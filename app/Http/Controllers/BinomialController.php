<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BinomialController extends Controller
{
    private function binomialCoefficient($n, $k) {
        if ($k == 0 || $k == $n) {
            return 1;
        }
        return $this->binomialCoefficient($n - 1, $k - 1) + $this->binomialCoefficient($n - 1, $k);
    }

    private function expandBinomial($a, $b, $n) {
        $result = "";
        for ($k = 0; $k <= $n; $k++) {
            $coefficient = $this->binomialCoefficient($n, $k);
            $term = "";
            if ($coefficient != 1) {
                $term .= $coefficient;
            }
            if ($n - $k > 0) {
                $term .= "a";
                if ($n - $k > 1) {
                    $term .= "^" . ($n - $k);
                }
            }
            if ($k > 0) {
                $term .= "b";
                if ($k > 1) {
                    $term .= "^" . $k;
                }
            }
            if ($k > 0) {
                $result .= " + ";
            }
            $result .= $term;
        }
        return $result;
    }

    public function showForm() {
        return view('binomial_form');
    }

    public function calculate(Request $request) {
        $n = $request->input('n');
        $a = 'a';
        $b = 'b';
        $result = $this->expandBinomial($a, $b, $n);

        return view('binomial_result', ['n' => $n, 'result' => $result]);
    }
}
