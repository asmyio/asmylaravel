<?php

// app/Http/Controllers/CalculatorController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function showCalculator()
    {
        return view('calculator');
    }

    public function calculate(Request $request)
    {
        $request->validate([
            'num1' => 'required|numeric',
            'num2' => 'required|numeric',
            'operator' => 'required|in:+,-,*,/',
        ]);

        $num1 = $request->input('num1');
        $num2 = $request->input('num2');
        $operator = $request->input('operator');
        $result = 0;

        switch ($operator) {
            case '+':
                $result = $num1 + $num2;
                break;
            case '-':
                $result = $num1 - $num2;
                break;
            case '*':
                $result = $num1 * $num2;
                break;
            case '/':
                if ($num2 != 0) {
                    $result = $num1 / $num2;
                } else {
                    return redirect('/calculator')->with('error', 'Cannot divide by zero.');
                }
                break;
        }

        return redirect('/calculator')->with('result', $result);
    }
}
