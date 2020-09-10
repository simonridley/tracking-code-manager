<?php

namespace Simonridley\TrackingCodeManager;

use Statamic\Entries\Entry;
use Statamic\Support\Str;

class Fields
{

    /**
     * @return array|array[]
     */
    public static function getOrganizationFields(): array
    {
        return [
            'organization' => [
                'fields' => [
                    'enabled' => [
                        'type' => 'toggle',
                        'display' => 'Enable/disable ALL scripts',
                        'instructions' => 'This can be used to disable all scripts and over-rides individual scripts setting',
                        'default' => true,
                    ],
                    'scripts' => [
                        'type' => 'grid',
                        'mode' => 'stacked',
                        'add_row' => 'Add Script',
                        'display' => 'Tracking Scripts',
                        'instructions' => 'Add each script to be included on site',
                        'fields' => [
                            [
                                'handle' => 'enabled',
                                'field' => [
                                    'type' => 'toggle',
                                    'display' => 'Enable/disable the script',
                                    'validate' => [
                                        'required',
                                    ],
                                ],
                            ],
                            [
                                'handle' => 'name',
                                'field' => [
                                    'type' => 'text',
                                    'display' => 'Name',
                                    'validate' => [
                                        'required',
                                    ],
                                    'instructions' => 'Your name or reference for the script',
                                ],
                            ],
                            [
                                'handle' => 'script',
                                'field' => [
                                    'type' => 'code',
                                    'display' => 'Script',
                                    'validate' => [
                                        'required',
                                    ],
                                    'instructions' => 'The HTML or Javscript tracking code',
                                ],
                            ],
                            [
                                'handle' => 'position',
                                'field' => [
                                    'type' => 'select',
                                    'display' => 'Position',
                                    'options' => [
                                        'head' => 'Head',
                                        'body' => 'Body',
                                        'footer' => 'Footer',
                                    ],
                                    'validate' => [
                                        'required',
                                    ],
                                    'instructions' => 'Which antlers tag to ouput the script to',
                                ],
                            ],
                        ],
                    ],
                ]  
            ]            
        ];
    }
}
