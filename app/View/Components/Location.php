<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Location extends Component
{
    /**
     * Create a new component instance.
     */
    public $countries;
    public $address;
    public $zip_code;
    public $longitude;
    public $latitude;

    public function __construct($address = null, $zip_code = null, $latitude = null, $longitude = null)
    {
        $this->countries = \App\Models\Location::where('parent_id', 0)->orWhere('parent_id', null)->get();
        $this->address = $address;
        $this->zip_code = $zip_code;
        $this->longitude = $longitude;
        $this->latitude = $latitude;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $data = [
            'countries' => $this->countries,
            'address' => $this->address,
            'zip_code' => $this->zip_code,
            'longitude' => $this->longitude,
            'latitude' => $this->latitude,
        ];
        return view('components.location')->with($data);
    }
}
