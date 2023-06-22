<?php

namespace Simonridley\TrackingCodeManager\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Simonridley\TrackingCodeManager\Fields as FooFields;
use Statamic\Facades\Blueprint;
use Statamic\Facades\File;
use Statamic\Facades\YAML;
use Statamic\Support\Arr;

class TrackingCodeManagerController extends Controller
{
    
    public function index(Request $request)
    {
        $blueprint = Blueprint::makeFromTabs(FooFields::getOrganizationFields());
        $fields = $blueprint->fields();
        
        $values = collect(YAML::file(__DIR__.'/../content/tracking-codes.yaml')->parse())
            ->merge(YAML::file(base_path('content/tracking-codes.yaml'))->parse())
            ->all();
        $fields = $fields->addValues($values);

        $fields = $fields->preProcess();

        return view('tracking-code-manager::settings', [
            'blueprint' => $blueprint->toPublishArray(),
            'values' => $fields->values(),
            'meta' => $fields->meta(),
        ]);
    }

    
    public function update(Request $request): void
    {
        $blueprint = Blueprint::makeFromTabs(FooFields::getOrganizationFields());
        $fields = $blueprint->fields();

        $fields = $fields->addValues($request->all());

        $fields->validate();

        $values = Arr::removeNullValues($fields->process()->values()->all());

        File::put(base_path('content/tracking-codes.yaml'), YAML::dump($values));
    }
}
