<?php

namespace App\Livewire\Product;

use Livewire\Component;
use Illuminate\Http\this;
use Illuminate\Support\Str;
use App\Models\Category;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Rules\MinimumImageCount;
use App\Models\File;

use App\Models\Product;

class Show extends Component
{
    use WithPagination, WithFileUploads;

    public $items, $name, $unit, $category,$price,$percentage,$discount,$start_date,$end_date,$tax_percentage,$tax_amount,$net_price,$stock_quantity,$product_id;
    public $listMode = true;
    public $updateMode = false;
    public $selectedCategories = [];

    public $images = [];

    public $sortBy = 'name';
    public $sortDirection = 'asc';


    public function render()
    {
        $this->items = Category::all();

        return view('livewire.product.show', [
            'products' => Product::orderBy($this->sortBy, $this->sortDirection)
            ->paginate(2),
        ]);

    }

    public function create()
    {
        $this->listMode = false;
        return view('livewire.product.show');
    }


    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'unit' => 'required',
            //'category' => 'required',
            'price' => 'required',
            'percentage' => 'required',
            'discount' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'tax_percentage' => 'required',
            'tax_amount' => 'required',
            'net_price' => 'required',
            'stock_quantity' => 'required',
            //'images.*'=> ['required','array', new MinimumImageCount(3)],,
            'images.*' => 'image|max:1024', // 1MB Max
        ]);

        $randomString = Str::random(4);
        $productID = 'PROD'.$randomString;

        //Image upload.
        $list_allowed = array('jpg','png','jpeg','gif');
        foreach ($this->images as $image) {

            if(in_array($image->extension(), $list_allowed))
                {

                $name = time().rand(1,100).'.'.$image->extension();

                $uploaded = $image->storeAs('files', $name);

                $image_id = File::create([
                    'name' => $name,
                    'file_path' => 'files/'.$name
                 ]);

                 $images[] = $image_id->id;

                }
        }

        $image_list = implode(', ', $images);
        $image_list = json_encode($images);
        //Image upload.

        //dd($image_list);

        $product = Product::create(array_merge($validatedData, ['product_id' => $productID, 'images' => $image_list]));

        $product->categories()->sync($this->selectedCategories);


        session()->flash('message','Product created successfully!');

        $this->listMode = true;
    }

    public function edit($id)
    {
        $this->listMode = false;
        $this->updateMode = true;

        $product = Product::findOrFail($id);
        $this->product_id = $id;
        $this->name = $product->name;
        $this->unit = $product->unit;
        $this->price = $product->price;
        $this->percentage = $product->percentage;
        $this->discount = $product->discount;
        $this->start_date = $product->start_date;
        $this->end_date = $product->end_date;
        $this->tax_percentage = $product->tax_percentage;
        $this->tax_amount = $product->tax_amount;
        $this->net_price = $product->net_price;
        $this->stock_quantity = $product->stock_quantity;


    }


    public function delete($id)
    {
        Product::find($id)->delete();
        session()->flash('message', 'Product Deleted Successfully.');
    }

    public function sortByField($field)
    {
        if($this->sortDirection == 'asc')
        {
            $this->sortDirection = 'desc';
        }
        else
        {
            $this->sortDirection = 'asc';
        }

        return $this->sortBy = $field;
    }
}
