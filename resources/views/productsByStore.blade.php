@extends('layouts.app')

@section('content')
<div>
        <!-- Select dropdown to choose categories -->
        <select name="stores" id="storesSelect" class="form-control">
            <option value="">Select Store</option> <!-- Placeholder for category selection -->
            @foreach($stores as $store)  <!-- Corrected variable name -->
                <option value="{{ $store->id }}">{{ $store->name }}</option>
            @endforeach
        </select>
    </div>

    <div id="" class="mt-4">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>name</th>
                    <th>categorie</th>
                    <th>description</th>
                    <th>price</th>
                    <th>stock</th>
                </tr>
            </thead>
            <tbody id="productShow">
            </tbody>
        </table>
    </div>
    <script>
        const storeSelect=document.getElementById('storesSelect');
        const show=document.getElementById('productShow');
        storeSelect.addEventListener('change',(e)=>{
            const StoreId=e.target.value;
            console.log(StoreId);
            
            if(StoreId){
                axios.get('/api/getProducts/'+StoreId)
                .then((response)=>{
                    console.log(response.data)
                    if (response.data){
                         response.data.forEach(product => {
                        let node =`<tr><td>${product.name}</td><td>${product.category}</td><td>${product.description}</td><td>${product.price}</td></tr>`
                        show.append(node)
                    });
                    console.log(response.data)
                    }
                   
                }).catch(error=>{
                    console.log(error.message)
                })
            }
        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

@endsection