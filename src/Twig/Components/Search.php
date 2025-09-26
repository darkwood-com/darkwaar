<?php

declare(strict_types=1);

namespace App\Twig\Components;

use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent]
final class Search
{
    use DefaultActionTrait;

    public function getFlowItems()
    {
        return [
            /*[
                'key' => 'darkwaar-flow-assets',
                'label' => 'Assets',
            ],
            [
                'key' => 'darkwaar-flow-canvas',
                'label' => 'Canvas',
            ],*/
            [
                'key' => 'darkwaar-flow-function',
                'label' => 'Function',
            ],
            [
                'key' => 'darkwaar-flow-object',
                'label' => 'Object',
            ],
            /*[
                'key' => 'darkwaar-flow-prompt',
                'label' => 'Prompt',
            ],*/
            [
                'key' => 'darkwaar-flow-text',
                'label' => 'Text',
            ],
        ];
    }
}
