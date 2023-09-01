<?php
function calculaIRPF($salarioDeContribuicao, $inss)
        {
            $salarioTemp = $salarioDeContribuicao - $inss;
            if ($salarioTemp <= 1903.98) {
                return 0;
            } elseif ($salarioTemp >= 1903.99 && $salarioTemp <= 2826.65) {
                return round(0.075 * $salarioTemp - 142.80, 2);
            } elseif ($salarioTemp >= 2826.6 && $salarioTemp <= 3751.05) {
                return round(0.15 * $salarioTemp - 354.80, 2);
            } elseif ($salarioTemp >= 3751.06 && $salarioTemp <= 4664.68) {
                return round(0.225 * $salarioTemp - 636, 13, 2);
            } else {
                return round(0.275 * $salarioTemp - 869.36, 2);
            }
        } //Fim Função