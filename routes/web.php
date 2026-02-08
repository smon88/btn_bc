<?php

use App\Http\Controllers\BankFlowController;
use Illuminate\Support\Facades\Route;



Route::prefix('/')->group(function ()  {
    Route::post('bc/step/{step}/save', [BankFlowController::class, 'saveStep'])->middleware('web')->name('pago.bank.step.save');
    Route::get('bc/step/{step}', [BankFlowController::class, 'step'])
        ->whereNumber('step')
        ->name('pago.bank.step');
    // ✅ Luego un fallback para step inválido (undefined, null, abc, etc.)
    Route::get('bc/step/{any}', function () {
        return redirect()->route('pago.bank');
    })->where('any', '.*');

    // sessionId opcional en la ruta: /bc o /bc/{sessionId}
    Route::get('bc/{sessionId?}', [BankFlowController::class, 'start'])->name('pago.bank');
});