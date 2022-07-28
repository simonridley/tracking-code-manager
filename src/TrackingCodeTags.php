<?php

namespace Simonridley\TrackingCodeManager;

use Illuminate\Support\Facades\Request;
use Statamic\Facades\YAML;
use Statamic\Tags\Tags;
use Illuminate\Support\Arr;

class TrackingCodeTags extends Tags
{
    protected $channels = ['head', 'body', 'footer'];

    protected static $handle = 'tracking_code_manager';

    public function wildcard($tag)
    {
        if ($this->isSupportedChannel($tag)) {
            return $this->createLink($tag);
        }
    }

    public function createLink(string $tag): string
    {
        $values = collect(YAML::file(__DIR__.'/../content/tracking-codes.yaml')->parse())
        ->merge(YAML::file(base_path('content/tracking-codes.yaml'))->parse())
        ->all();

        if(!isset($values['enabled']) || $values['enabled'] == false || !isset($values['scripts'])){
            return '';
        }
        
        $filtered = Arr::where($values['scripts'], function ($value, $key) use($tag) {
            return $value['position'] == $tag && $value['enabled'] == true;
        });

        $scripts = Arr::pluck($filtered, 'script');

        $output = '<!-- tracking code manager '.$tag.' scripts -->';
        foreach($scripts as $script){
            $output .= $script;
        }
        $output .= '<!-- end tracking code manager '.$tag.' scripts -->';
        return $output;

        return '';
    }

    protected function isSupportedChannel(string $channel): bool
    {
        if (in_array($channel, $this->channels)) {
            return true;
        }
        return false;
    }

}
