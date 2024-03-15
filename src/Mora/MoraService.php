<?php

namespace Mora;

class MoraService
{
    public function calc(float $amount, \DateTime $maturity, int $fees, float $mora)
    {
        $amount = $this->floatToInt($amount);
        $days = $maturity->diff(new \DateTime())->days;
        $feeCalc = ($fees / 100) * $amount;
        $sumFeeAmount = $feeCalc + $amount;
        $moraPerDay = ($mora * $days);
        $fee = ($sumFeeAmount * $moraPerDay) / 100;
        [$fee, $_] = explode('.', (string)$fee);
        return $this->intToFloat((string)((int)$fee + (int)$sumFeeAmount));
    }

    private function floatToInt(float $amount): int
    {
        $cleaned = strpos($amount, '.');
        if ($cleaned) {
            return (int)str_replace(['.', ','], '', $amount);
        }
        return (int)"{$amount}00";
    }

    private function intToFloat(string $amount): float
    {
        $final = substr($amount, -2);
        $start = substr($amount, 0, -2);
        return (float)"{$start}.{$final}";
    }

}
