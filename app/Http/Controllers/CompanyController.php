<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

// use Spatie\Newsletter\Newsletter as Newsletter;
class CompanyController extends Controller
{

    public function store(Request $request)
    {
        //    Validation
        $request->validate(
            [
                "email" => "email",
                "phone" => "required",
                "company" => "required|max:30|",
            ]);

        // Insert into database

        $company = new Company;
        $company->email = $request->email;

        // koga probuvam da pustam mail ja dobivam seldnava greska
        // Non-static method Spatie\Newsletter\Newsletter::isSubscribed() cannot be called statically
        // if (!Newsletter::isSubscribed($request->email)) {
        //     Newsletter::subscribePending($request->email);
        // }

        $company->phone = $request->phone;
        $company->company = $request->company;
        $save = $company->save();

        if ($save) {
            return back()->with('status', 'Вашите информации се успешно зачувани!');
        } else {
            return back()->with('fail', 'Се појави проблем! Ве молиме пробајте подоцна');
        }

    }

}