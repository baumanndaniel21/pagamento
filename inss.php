<?php

//Função para calcular o INSS (Atualizado em 2023)

        function descontoINSS($salarioDeContribuicao)
        {
            if ($salarioDeContribuicao <= 1320.00) {
                $inss = $salarioDeContribuicao * 7.5 / 100;
            } //Fim Se
            elseif ($salarioDeContribuicao >= 1320.01 && $salarioDeContribuicao <= 2571.29) {
                $inss = $salarioDeContribuicao * 9 / 100;
            } //elseif
            elseif ($salarioDeContribuicao >= 2571.30 && $salarioDeContribuicao <= 3856.94) {
                $inss = $salarioDeContribuicao * 12 / 100;
            } //elseif
            elseif ($salarioDeContribuicao >= 3856.95 && $salarioDeContribuicao <= 7507.49) {
                $inss = $salarioDeContribuicao * 14 / 100;
            } //elseif
            else {
                $inss = 877.24;
            } //fim else
            return round($inss, 2);
        } //Fim Função INSS