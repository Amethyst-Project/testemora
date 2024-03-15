<?php

namespace MoraTest\Unit;
use DateTime;
use Mora\MoraService;

test('should test mora calc', function () {

    $dateBeforeThreeDays = new DateTime();
    $dateBeforeThreeDays->modify('-3 days');
    $moraService = new MoraService();
    $mora = $moraService->calc(500, $dateBeforeThreeDays, 2, 0.033);
    expect($mora)->toBe(510.50);
});
