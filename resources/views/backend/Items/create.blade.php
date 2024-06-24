@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <h1>Create Item</h1>
        <form action="{{ route('admin.items.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="brandName">Brand Name</label>
                <input type="text" class="form-control" id="brandName" name="brandName" value="{{ old('brandName') }}" required>
                @if ($errors->has('brandName'))
                    <span class="text-danger">{{ $errors->first('brandName') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="OE_No">OE Number</label>
                <input type="text" class="form-control" id="OE_No" name="OE_No" value="{{ old('OE_No') }}" required>
                @if ($errors->has('OE_No'))
                    <span class="text-danger">{{ $errors->first('OE_No') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="second_category_id">Second Category</label>
                <select class="form-control" id="second_category_id" name="second_category_id" required>
                    @foreach ($secondCategories as $secondCategory)
                        <option value="{{ $secondCategory->id }}" {{ old('second_category_id') == $secondCategory->id ? 'selected' : '' }}>{{ $secondCategory->name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('second_category_id'))
                    <span class="text-danger">{{ $errors->first('second_category_id') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="main_category_id">Main Category</label>
                <select class="form-control" id="main_category_id" name="main_category_id" required>
                    @foreach ($mainCategories as $mainCategory)
                        <option value="{{ $mainCategory->id }}" {{ old('main_category_id') == $mainCategory->id ? 'selected' : '' }}>{{ $mainCategory->name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('main_category_id'))
                    <span class="text-danger">{{ $errors->first('main_category_id') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="is_universal">Is Universal</label><br>
                <input type="radio" id="is_universal_yes" name="is_universal" value="1" {{ old('is_universal') == '1' ? 'checked' : '' }}> Yes
                <input type="radio" id="is_universal_no" name="is_universal" value="0" {{ old('is_universal') == '0' ? 'checked' : '' }}> No
                @if ($errors->has('is_universal'))
                    <span class="text-danger">{{ $errors->first('is_universal') }}</span>
                @endif
            </div>
            <div class="form-group" id="cars-group">
                <label for="cars">Cars</label>
                <select class="form-control" id="cars" name="cars[]" multiple style="height: 150px; overflow-y: auto;">
                    @foreach ($cars as $car)
                        <option value="{{ $car->id }}" {{ collect(old('cars'))->contains($car->id) ? 'selected' : '' }}>{{ $car->description }}</option>
                    @endforeach
                </select>
                @if ($errors->has('cars'))
                    <span class="text-danger">{{ $errors->first('cars') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="images">Images</label>
                <input type="file" class="form-control-file" id="images" name="images[]" multiple required>
                @if ($errors->has('images'))
                    <span class="text-danger">{{ $errors->first('images') }}</span>
                @endif
            </div>
            <div id="imagePreview"></div>
            <div class="form-group">
                <label for="is_feature">Is Feature</label>
                <input type="checkbox" id="is_feature" name="is_feature" value="1" {{ old('is_feature') ? 'checked' : '' }}>
                @if ($errors->has('is_feature'))
                    <span class="text-danger">{{ $errors->first('is_feature') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" class="form-control" id="price" name="price" value="{{ old('price') }}" required>
                @if ($errors->has('price'))
                    <span class="text-danger">{{ $errors->first('price') }}</span>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
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

        function toggleCarsDropdown() {
            var carsGroup = document.getElementById('cars-group');
            var isUniversalYes = document.getElementById('is_universal_yes');
            var isUniversalNo = document.getElementById('is_universal_no');

            if (isUniversalYes.checked) {
                carsGroup.style.display = 'none';
            } else {
                carsGroup.style.display = 'block';
            }
        }

        document.getElementById('is_universal_yes').addEventListener("change", toggleCarsDropdown);
        document.getElementById('is_universal_no').addEventListener("change", toggleCarsDropdown);

        // Initial call to set the correct state on page load
        toggleCarsDropdown();
    </script>
@endsection
