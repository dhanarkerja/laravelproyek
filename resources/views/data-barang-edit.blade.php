<div class="p2">
    <div class="form-group">
        <input type="text" name="nameEditBarang" id="nameEditBarang" value="{{ $data->name }}" class="form-control"
            placeholder="name product">
        <input type="number" name="quantityEditBarang" id="quantityEditBarang" value="{{ $data->quantity }}" class="form-control"
            placeholder="quantity">
    </div>
    <div class="form-group mt-2">
        <button class="btn btn-warning" onClick="update({{ $data->id }})">Update</button>
    </div>
</div>
