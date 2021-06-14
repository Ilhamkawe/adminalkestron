<?php

namespace App\Http\Livewire;
use App\Models\BrandModel;
use Livewire\Component;

class SelectBrand extends Component
{
    public function render()
    {
        $data1 = BrandModel::orderBy('nama', 'ASC')->get();
        return view('livewire.select-brand')->with(['brand'=>$data1]);
    }
}
