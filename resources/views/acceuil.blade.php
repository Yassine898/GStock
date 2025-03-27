
@extends('layouts.app')
@section('content')
       <!-- Main Content Section -->
       <main class="container my-5 h-90">
        <h2>Gestion des utilisateurs</h2>
        <ul class="list-group">
            <li class="list-group-item">
                <a href="/clients" class="text-decoration-none">Liste des clients</a>
            </li>
            <li class="list-group-item">
                <a href="/suppliers" class="text-decoration-none">Liste des fournisseurs</a>
            </li>
            <li class="list-group-item">
                <a href="/products" class="text-decoration-none">list produits</a>
            </li>
            <li class="list-group-item">
                <a href="/getProductByCat" class="text-decoration-none">product by category</a>
            </li>
            <li class="list-group-item">
                <a href="/getProductBySupp" class="text-decoration-none">product by supplier</a>
            </li>
            <li class="list-group-item">
                <a href="#" class="text-decoration-none">Historique des transactions</a>
            </li>
            <li class="list-group-item">
                <a href="#" class="text-decoration-none">Paramètres du compte</a>
            </li>
        </ul>
    </main>
@endsection
