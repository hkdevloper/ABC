<?php

namespace App\Forms\Components;

use Filament\Forms\Components\Field;

class LeafletMap extends Field
{
    protected string $view = 'forms.components.leaflet-map';
    public string $height = '400px';
    public int $zoom = 2;
    public string $center = "51.505, -0.09";
    public string $marker = "51.505, -0.09";
    public bool $markerDraggable = true;
    public ?string $latitude = null;
    public ?string $longitude = null;
}
