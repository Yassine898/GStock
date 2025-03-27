@extends('layouts.app')

@section('content')

    <div>
        <!-- Select dropdown to choose categories -->
        <select name="category" id="categorySelect" class="form-control">
            <option value="">Select Category</option> <!-- Placeholder for category selection -->
            @foreach($categorys as $category)  <!-- Corrected variable name -->
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div id="productShow" class="mt-4">
        <!-- Display products here after selection -->
    </div>
    <script>

    const select = document.getElementById('categorySelect');
    const product_section = document.getElementById('productShow');


    select.addEventListener('change', (e) => {

        product_section.innerHTML = '';


        const categoryId = e.target.value;
        console.log('Selected Category ID:', categoryId);

        if (categoryId) {

            axios.get('/api/productsByCat/' + categoryId)
                .then(response => {
                    console.log('Response HTML:', response.data);


                    product_section.innerHTML = response.data;
                })
                .catch(error => {
                    console.log(error.message);
                    product_section.innerHTML = '<p>There was an error fetching products.</p>';
                });
        } else {
            product_section.innerHTML = '<p>Please select a category to view products.</p>';
        }
    });
</script>
@endsection

