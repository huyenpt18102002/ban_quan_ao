<?php

namespace App\Http\Livewire\Client\Product;

use Livewire\Component;

class Index extends Component
{
    public $product, $category, $brand;

    public function addToCart(int $productId){
      if(Auth::check()){
        if($this->product->where('id', $productId)->exists())
        {
            dd('am i');
        }
        else{
            $this->dispatchBrowserEvent('message',[
                'text' => 'san pham k ton tai',
                'type' => 'warning',
                'status' => 404
            ]); 
        }
      }
      else{
        $this->dispatchBrowserEvent('message', [
            'text' => 'Hay dang nhap de them vao gio hang',
            'type' => 'info',
            'status' => 401
        ]);
      }
    }

    public function mount($product, $category, $brand)
    {
        $this->product = $product;
        $this->category = $category;
        $this->brand = $brand;
    }
    public function render()
    {
        return view('livewire.client.product.index', [
            'product' => $this->product,
            'category' => $this->category,
            'brand' => $this->brand,
        ]);
    }
}
