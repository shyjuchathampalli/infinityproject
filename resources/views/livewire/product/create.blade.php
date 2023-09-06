<form>
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <label for="name">Product Name:</label>
                <input type="text" class="form-control" placeholder="Enter Title" wire:model="name" name="name">
                @error('name') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <label for="unit">Product Name:</label>
                <select name="unit" id="unit" wire:model="unit" class="form-control">
                    <option value="Qty">Qty</option>
                    <option value="Ltr">Ltr</option>
                    <option value="KG">KG</option>
                    <option value="Meter">Meter</option>
                </select>
                @error('unit') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <label for="category">Category:</label>
                <select wire:model="selectedCategories" name="category[]" id="category" class="form-control" multiple>
                    @foreach($items as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>

                @error('category') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <label for="category">Price:</label>
                <input type="text" class="form-control" placeholder="Enter Price" wire:model="price" name="price">
                @error('price') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <label for="percentage">Discount Percentage:</label>
                <input type="text" class="form-control" placeholder="Enter Price" wire:model="percentage" name="percentage">
                @error('percentage') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <label for="discount">Discount Amount:</label>
                <input type="text" class="form-control" placeholder="Enter Price" wire:model="discount" name="discount">
                @error('discount') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <label for="start_date">Discount Start Date:</label>
                <input type="text" class="form-control" placeholder="Discount Start Date" wire:model="start_date" name="start_date">
                @error('start_date') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <label for="end_date">Discount End Date:</label>
                <input type="text" class="form-control" placeholder="Discount End Date" wire:model="end_date" name="end_date">
                @error('end_date') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <label for="tax_percentage">Tax percentage:</label>
                <input type="text" class="form-control" placeholder="Enter Tax Percentage" wire:model="tax_percentage" name="tax_percentage">
                @error('tax_percentage') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <label for="tax_amount">Tax percentage:</label>
                <input type="text" class="form-control" placeholder="Tax Amount" wire:model="tax_amount" name="tax_amount">
                @error('tax_amount') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <label for="net_price">Net Price:</label>
                <input type="text" class="form-control" placeholder="Enter Price" wire:model="net_price" name="net_price">
                @error('net_price') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <label for="stock_quantity">Stock:</label>
                <input type="text" class="form-control" placeholder="Enter Stock" wire:model="stock_quantity" name="stock_quantity">
                @error('stock_quantity') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <label for="product_image">Images:</label>
                <input type="file" class="form-control" placeholder="image" wire:model="images" multiple>
                @error('product_image') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
    </div>
    <button wire:click.prevent="store()" class="btn btn-success">Save</button>
</form>
