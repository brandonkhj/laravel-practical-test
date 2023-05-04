<?php

namespace App\Http\Controllers;

use App\Enums\InputType;
use App\Models\Form;
use Illuminate\Support\Facades\DB;

class FormController extends Controller
{
    public function index()
    {
        return view('form');
    }

    public function submit()
    {
        $inputs = request()->only(InputType::values());

        $inputKeyed = collect($inputs)
            ->filter(fn ($value) => filled($value));

        $inputData = [];

        foreach ($inputKeyed as $key => $input) {
            $inputData[] = [
                'type' => $key,
                'value' => $input,
            ];
        }

        DB::beginTransaction();

        try {
            $form = Form::create();
            $form->inputs()->createMany($inputData);

        } catch (\Throwable $th) {
            DB::rollback();
            throw ($th);
        }

        DB::commit();

        $cookie = cookie('submitSuccess', true, 0.02);

        return redirect(route('home'))->withCookie($cookie);
    }
}
