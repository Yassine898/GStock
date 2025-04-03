@extends('layouts.app')

@section('content')

    <div>
        <!-- Select dropdown to choose categories -->
        <select name="store" id="storeSelect" class="form-control">
            <option value="">Select Category</option> <!-- Placeholder for category selection -->
            @foreach($stores as $store)  <!-- Corrected variable name -->
                <option value="{{ $store->id }}">{{ $store->name }}</option>
            @endforeach
        </select>
    </div>

    <div id="productShow" class="mt-4">
        <!-- Display products here after selection -->
    </div>
    <script>

    const select = document.getElementById('storeSelect');
    const product_section = document.getElementById('productShow');


    select.addEventListener('change', (e) => {

        product_section.innerHTML = '';


        const storeId = e.target.value;
        console.log('Selected Category ID:', storeId);

        if (storeId) {
            let html=`<table border='1'><tr><th>name</th><th>categorie</th><th>description</th><th>quantite</th><th>price</th></tr>`
            axios.get('/api/getProductBystore/' + storeId)
                .then(response => {

                    const products=response.data;
                    products.forEach(product=>{
                        html+=`<tr><th>${product.name}</th><td>${product.category.name}</td><td>${product.description}</td><td>${product.stock.quantity_stock}</td><td>${product.price} MAD</td></tr>`
                    })
                    html+=`</table>`
                    product_section.innerHTML+=html
                    console.log('Response HTML:', response.data);
                })
                .catch(error => {
                    console.log(error.message);
                    product_section.innerHTML = '<p>There was an error fetching products.</p>';
                });
        } else {
            product_section.innerHTML = '<p>Please select a store to view products.</p>';
        }
    });
</script>
@endsection

