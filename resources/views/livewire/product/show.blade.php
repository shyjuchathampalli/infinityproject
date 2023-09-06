<div>
    <div class="pull-right">

        @if($listMode)
        <a class="btn btn-success" wire:click="create" style="color: #fff"> Create New Product</a>
        <a class="btn btn-warning" href="{{ route('home') }}"> View Dashboard</a>
        <table class="table table-bordered" style="margin-top: 15px;">
            <tr>
                <th>Product ID</th>
                <th>Image</th>
                <th wire:click="sortByField('name')" style="cursor: pointer;">Name <i class="fa-solid fa-sort"></i></th>
                <th>Unit</th>
                <th>Category</th>
                <th wire:click="sortByField('price')" style="cursor: pointer;">Price <i class="fa-solid fa-sort"></i> </th>
                <th>Discount Percentage</th>
                <th>Tax Percentage</th>
                <th>Net Price</th>
                @can('product-edit')
                <th>Edit</th>
                @endcan
            </tr>

            @foreach ($products as $product)
            <tr>
                <td>{{ $product->product_id }}</td>
                <td>
                    @foreach(json_decode($product->images) as $imageId)
                @php
                    $image = App\Models\File::find($imageId);
                @endphp
                @if ($image)
                <img src="{{ asset('/'.$image->file_path) }}"  alt="{{ $product->name }}" style="height: 30px; width:30px;">
                @endif
                @endforeach
                </td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->unit }}</td>
                <td>{{ $product->categories->pluck('name')->implode(', ') }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->percentage }}</td>
                <td>{{ $product->tax_percentage }}</td>
                <td>{{ $product->net_price }}</td>
                @can('product-edit')
                <td>
                    <button wire:click="edit({{ $product->id }})" class="btn btn-primary btn-sm">
                        <i class="fa fa-edit" aria-hidden="true"></i>
                    </button>
                    <button wire:click="delete({{ $product->id }})" class="btn btn-danger btn-sm">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </button>
                </td>
                @endcan
            </tr>
            @endforeach
        </table>
        <p>{{ $products->links('pagination::bootstrap-4') }}</p>
        @else
                @if($updateMode)
                @include('livewire.product.update')
                @else
                    @include('livewire.product.create')
                @endif
        @endif



    </div>

</div>
