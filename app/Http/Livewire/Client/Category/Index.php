<?php

namespace App\Http\Livewire\Client\Category;

use Livewire\Component;

class Index extends Component
{
    public $product, $cateslug;
    public function mount($product, $cateslug)
    {
        $this->product = $product;
      
        $this->cateslug = $cateslug;
    }
    public function render()
    {
        return view('livewire.client.category.index', [
            'product' => $this->product,
          
            'cateslug' => $this->cateslug,
        ]);
    }
}
