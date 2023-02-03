<?php

namespace App\Http\Controllers\Dashboard;


use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\SettingRequest;
use Symfony\Component\VarDumper\VarDumper;
use \Illuminate\Support\Str;

class SettingControllar extends Controller
{

    public function index()
    {
          $setting = Setting::checkSettings();

          return view('dashboard.settings', compact('setting'));
    }

    public function update(SettingRequest $request, Setting $setting)
    {
        $data =     $validatedData = $request->validated();

// Data that needs translation

        foreach (config('app.languages') as $key => $value) {
            $data[$key . '*.title'] = 'nullable|string';
            $data[$key . '*.content'] = 'nullable|string';
            $data[$key . '*.address'] = 'nullable|string';
        }

         $setting->update($request->except('image', 'favicon', '_token'));
         
// logo


        if ($request->file('logo')) {
            $file = $request->file('logo');
            $filename = Str::uuid() . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $path = 'images/' . $filename;
            $setting->update(['logo' => $path]);
        }

// favicon

        if ($request->file('favicon')) {
            $file = $request->file('favicon');
            $filename = Str::uuid() . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $path = '/images/' . $filename;
            $setting->update(['favicon' => $path]);
        }

 // returns

 return redirect()->route('dashboard.settings');
    }
}
