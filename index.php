<?php
$uloha=5;

class Counter{
    private $callCount = 0;

    public function checkMaxMinSum($numbers) {
        $this->callCount++;

        if(!is_array($numbers)) return "Vstupom funcie musí byť pole";

        if(count($numbers)!=5) return "Vstupom funcie musí byť pole s piatimi prvkami. Presne!";

        foreach ($numbers as $nummer) {
            if (!is_numeric($nummer)) { //Pripadne tu môžme ošetriť či chceme len celé, celé kladné a podobne....
                return "Vstupom funcie musí byť pole s piatimi číslami. Aspoň jedno z nich nie je číslo!";
            }
        }

        //Dočasné premenné
        $sumMin = 0;
        $sumMax = 0;

        $count = count($numbers);
        for ($i=0; $i < $count; $i++) { 
            $tmpArray=$numbers;

            array_splice($tmpArray, $i, 1); // Odstránime jeden prvok na pozícii $i

            // Suma zostávajúcich 4 prvkov
            $sum = array_sum($tmpArray);

            if($i==0){
                $sumMin = $sum;
                $sumMax = $sum;
            } else {
                if($sum>$sumMax) $sumMax=$sum;
                if($sum<$sumMin) $sumMin=$sum;
            }
        }

        return array($sumMax, $sumMin);

    }

}

if($uloha==1) {
    $str1 = 'yabadabadoo';
    $str2 = 'yaba';
    if (strpos($str1,$str2) !== false) {
        echo "\"" . $str1 . "\" contains \"" . $str2 . "\"";
    } else {
        echo "\"" . $str1 . "\" does not contain \"" . $str2 . "\"";
    }
    // Vysledok aktualne je: "yabadabadoo" does not contain "yaba"
    // Opravte kod.
    
} elseif ($uloha==2){
    // Opravte kod, tak aby po spusteni neboli ziadne chybove vypisy. (Najst a vyriesit problem)
    $referenceTable = array();
    $referenceTable['val1'] = array(1, 2);
    $referenceTable['val2'] = array(3); //Nebolo pole, zmena na pole
    $referenceTable['val3'] = array(4, 5);

    $testArray = array();

    $testArray = array_merge($testArray, $referenceTable['val1']);   
    var_dump($testArray);
    //alebo $testArray = array_merge($testArray, (array)$referenceTable['val2']);   (podla toho ci osetrujeme vstupy alebe vystupy)
    $testArray = array_merge($testArray, $referenceTable['val2']);
    var_dump($testArray);
    $testArray = array_merge($testArray, $referenceTable['val3']);
    var_dump($testArray);

} elseif ($uloha==3){
    $counter = new Counter();
    $numbers = [1, 5, 8, 7, 9];
    $result = $counter->checkMaxMinSum($numbers);
    echo "Maximálna suma: " . $result[0] . "\n";
    echo "Minimálna suma: " . $result[1] . "\n";

} elseif ($uloha==4){
    function getDiagonalSum($arr){
        $diagonalSum1=0;
        $diagonalSum2=0;

        
        //Tu by sa patrilo napisat overenie vstupu, (ci je pole, ci su cisla, a ci je matica) ale kedze je to na cas, predpokladam, ze vstupy uz overene byt mozu
        
        $n = count($arr);

        for ($i = 0; $i < $n; $i++) {
            // Súčet prvej diagonály
            $diagonalSum1 += $arr[$i][$i];
            // Súčet druhej diagonály
            $diagonalSum2 += $arr[$i][$n - 1 - $i];
        }

            // Vráti absolútnu hodnotu rozdielu dvoch diagonál
            $sum=abs($diagonalSum1 - $diagonalSum2);

        return $sum;
    }

    // Testovacie dáta
    $array = [
        [11, 2, 4],
        [4, 5, 6],
        [10, 8, -12]
    ];

    // Výsledok funkcie
    $result = getDiagonalSum($array);
    echo "Absolútna hodnota rozdielu je: " . $result;

} elseif ($uloha==5){
    // Opravte kód:
    //returns second biggest value from array:  array(0=>chocolate,1=>20)
    
    function secondMax($arr) {
        $max = $second = 0;
        $maxKey = $secondKey = null;


        foreach($arr as $key => $value) {
            $value=(int)$value;

            if($value > $max) {
                $second = $max;
                $secondKey = $maxKey;
                $max = $value;
                $maxKey = $key;
            } elseif($value > $second && $value != $max) {
                $second = $value;
                $secondKey = $key;
            }
        }
    
        return array($secondKey, $second);
    }
    
    $cookies = array(
                    "chocolate" => "20",
                    "vanilla" => "14",
                    "strawberry" => "18",
                    "raspberry" => "19",
                    "bluebery" => "29"
    );
    print_r(secondMax($cookies));
    
            
}
