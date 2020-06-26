<?php

class ProcessLearning {
    
    public static function learning($theta = 10, $maxIteration = 100) {

        $bobot = [
            0, 0, 0, 0, 0, 0, 0,
            0, 0, 0, 0, 0, 0, 0,
            0, 0, 0, 0, 0, 0, 0,
            0, 0, 0, 0, 0, 0, 0,
            0, 0, 0, 0, 0, 0, 0,
            0, 0, 0, 0, 0, 0, 0,
            0, 0, 0, 0, 0, 0, 0,
            0, 0, 0, 0, 0, 0, 0,
            0, 0, 0, 0, 0, 0, 0,
        ];

        $vector = [
            [
                -1,-1, 1, 1,-1,-1,-1,
                -1,-1,-1, 1,-1,-1,-1,
                -1,-1,-1, 1,-1,-1,-1,
                -1,-1, 1,-1, 1,-1,-1,
                -1,-1, 1,-1, 1,-1,-1,
                -1, 1, 1, 1, 1, 1,-1,
                -1, 1,-1,-1,-1, 1,-1,
                -1, 1,-1,-1,-1, 1,-1,
                1, 1, 1,-1, 1, 1, 1
            ],
            [
                1, 1, 1, 1, 1, 1,-1,
                -1, 1,-1,-1,-1,-1, 1,
                -1, 1,-1,-1,-1,-1, 1,
                -1, 1,-1,-1,-1,-1, 1,
                -1, 1, 1, 1, 1, 1,-1,
                -1, 1,-1,-1,-1,-1, 1,
                -1, 1,-1,-1,-1,-1, 1,
                -1, 1,-1,-1,-1,-1, 1,
                1, 1, 1, 1, 1, 1,-1

            ],
            [
                -1,-1, 1, 1, 1, 1, 1,
                -1, 1,-1,-1,-1,-1, 1,
                1,-1,-1,-1,-1,-1,-1,
                1,-1,-1,-1,-1,-1,-1,
                1,-1,-1,-1,-1,-1,-1,
                1,-1,-1,-1,-1,-1,-1,
                1,-1,-1,-1,-1,-1,-1,
                -1, 1,-1,-1,-1,-1, 1,
                -1,-1, 1, 1, 1, 1,-1,

            ],
            [
                -1,-1,-1, 1,-1,-1,-1,
                -1,-1,-1, 1,-1,-1,-1,
                -1,-1,-1, 1,-1,-1,-1,
                -1,-1, 1,-1, 1,-1,-1,
                -1,-1, 1,-1, 1,-1,-1,
                -1, 1,-1,-1,-1, 1,-1,
                -1, 1, 1, 1, 1, 1,-1,
                -1, 1,-1,-1,-1, 1,-1,
                -1, 1,-1,-1,-1, 1,-1
            ],
            [
                1, 1, 1, 1, 1, 1,-1,
                1,-1,-1,-1,-1,-1, 1,
                1,-1,-1,-1,-1,-1, 1,
                1,-1,-1,-1,-1,-1, 1,
                1, 1, 1, 1, 1, 1,-1,
                1,-1,-1,-1,-1,-1, 1,
                1,-1,-1,-1,-1,-1, 1,
                1,-1,-1,-1,-1,-1, 1,
                1, 1, 1, 1, 1, 1,-1,
            ],
            [
                -1,-1, 1, 1, 1,-1,-1,
                -1, 1,-1,-1,-1, 1,-1,
                1,-1,-1,-1,-1,-1, 1,
                1,-1,-1,-1,-1,-1,-1,
                1,-1,-1,-1,-1,-1,-1,
                1,-1,-1,-1,-1,-1,-1,
                1,-1,-1,-1,-1,-1, 1,
                -1, 1,-1,-1,-1, 1,-1,
                -1,-1, 1, 1, 1,-1,-1,
            ]
        ];

        // learning

        $bias = 0;
        $alpha = 1;
        $target = [
            1, // A
            -1, // B
            -1, // C
            1, // A
            -1, // B
            -1 // C
        ];

        $iteration = $iterationFinal = 0;

        $isLoopFinal = true;

        $vectorUpdate = [];

        foreach (range(0, count($vector)) as $vectorIndex) {
            $vectorUpdate[$vectorIndex] = true;
        }

        do {
            if ($iteration == count($vector)) {
                $iteration = 0;

                $iterationFinal++;

                if ($iterationFinal == $maxIteration) break;
            }

            $sum = 0;

            foreach ($vector[$iteration] as $vectorIndex => $vectorInput) {
                $sum += $vectorInput * $bobot[$vectorIndex];
            }

            // Net
            $hasil = $bias + $sum;

            // F(Net)
            $output = $hasil > $theta ? 1 : -1;

            $isLoop = $output != $target[$iteration];

            if ($isLoop) {

                foreach ($vector[$iteration] as $vectorIndex => $vectorInput) {
                    $bobot[$vectorIndex] = $bobot[$vectorIndex] + ($alpha * $target[$iteration] * $vectorInput);
                }       

                $bias = $bias + $alpha * $target[$iteration];
            }

            $vectorUpdate[$iteration] = $isLoop;
            ++$iteration;

            $vectorUpdateFalse = 0;

            foreach ($vectorUpdate as $vectorUpdateValue) {
                if ( ! $vectorUpdateValue) ++$vectorUpdateFalse;
            }

            $isLoopFinal = $vectorUpdateFalse == count($vectorUpdate);

        } while ( ! $isLoopFinal);

        return [
            'bobot' => $bobot,
            'bias' => $bias,
            'epoch' => $iterationFinal
        ];
    }

    public static function cekStatus($hasil, $theta){
        return $hasil > $theta ? 1 : -1;
    }
}

