@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Item</h1>
        <form action="{{ route('admin.items.update', $item->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $item->name }}" required>
            </div>
            <div class="form-group">
                <label for="brandName">Brand Name</label>
                <input type="text" class="form-control" id="brandName" name="brandName" value="{{ $item->brandName }}" required>
            </div>
            <div class="form-group">
                <label for="second_category_id">Second Category</label>
                <select class="form-control" id="second_category_id" name="second_category_id" required>
                    @foreach ($secondCategories as $secondCategory)
                        <option value="{{ $secondCategory->id }}" {{ $secondCategory->id == $item->second_category_id ? 'selected' : '' }}>{{ $secondCategory->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="main_category_id">Main Category</label>
                <select class="form-control" id="main_category_id" name="main_category_id" required>
                    @foreach ($mainCategories as $mainCategory)
                        <option value="{{ $mainCategory->id }}" {{ $mainCategory->id == $item->main_category_id ? 'selected' : '' }}>{{ $mainCategory->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="cars">Cars</label>
                <select class="form-control" id="cars" name="cars[]" multiple>
                    @foreach ($cars as $car)
                        <option value="{{ $car->id }}" {{ in_array($car->id, $item->cars->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $car->description }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="images">Images</label>
                <input type="file" class="form-control-file" id="images" name="images[]" multiple>
                <div id="imagePreview" class="mt-2"></div>
                @if ($item->images->isNotEmpty())
                    <div class="mt-2">
                        @foreach ($item->images as $image)
                            <div class="image-preview" style="display: inline-block; margin-right: 10px;">
                                <img src="{{ asset($image->path) }}" alt="{{ $item->name }}" width="100" class="mt-2">
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="checkbox" name="delete_image_{{ $image->id }}" id="delete_image_{{ $image->id }}">
                                    <label class="form-check-label" for="delete_image_{{ $image->id }}">
                                        Delete Image
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="is_feature">Is Feature</label>
                <input type="checkbox" id="is_feature" name="is_feature" value="1" {{ $item->is_feature ? 'checked' : '' }}>
            </div>
            <div class="form-group">
                <label for="OE_No">OE Number</label>
                <input type="text" class="form-control" id="OE_No" name="OE_No" value="{{ $item->OE_No }}" required>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" class="form-control" id="price" name="price" value="{{ $item->price }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection

@section('scripts')
<script>
    function previewImages() {
        var preview = document.getElementById('imagePreview');
        preview.innerHTML = '';
        if (this.files) {
            [].forEach.call(this.files, readAndPreview);
        }

        function readAndPreview(file) {
            if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
                return alert(file.name + " is not an image");
            }
            var reader = new FileReader();
            reader.addEventListener("load", function() {
                var image = new Image();
                image.height = 100;
                image.title = file.name;
                image.src = this.result;
                preview.appendChild(image);
            });
            reader.readAsDataURL(file);
        }
    }

    document.getElementById('images').addEventListener("change", previewImages);
</script>
@endsection
