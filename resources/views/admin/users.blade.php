@extends('admin.layout')

@section('title', 'Utilisateurs')

@section('content')
<h1 class="page-title">Gestion des utilisateurs</h1>
<a href="#" class="btn-add">Ajouter un utilisateur</a>

<!-- Users Table -->
<h2 class="page-title mt-5">Liste des utilisateurs</h2>

<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Rôle</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Static user data for now -->
            <tr>
                <td>1</td>
                <td><img src="https://via.placeholder.com/50" class="user-img" alt="John Doe"></td>
                <td>John Doe</td>
                <td>johndoe@example.com</td>
                <td>Administrateur</td>
                <td>
                    <a href="#" class="btn-action btn-edit">Modifier</a>
                    <a href="#" class="btn-action btn-delete">Supprimer</a>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td><img src="https://via.placeholder.com/50" class="user-img" alt="Jane Smith"></td>
                <td>Jane Smith</td>
                <td>janesmith@example.com</td>
                <td>Utilisateur</td>
                <td>
                    <a href="#" class="btn-action btn-edit">Modifier</a>
                    <a href="#" class="btn-action btn-delete">Supprimer</a>
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td><img src="https://via.placeholder.com/50" class="user-img" alt="Sam Green"></td>
                <td>Sam Green</td>
                <td>samgreen@example.com</td>
                <td>Utilisateur</td>
                <td>
                    <a href="#" class="btn-action btn-edit">Modifier</a>
                    <a href="#" class="btn-action btn-delete">Supprimer</a>
                </td>
            </tr>
            <tr>
                <td>4</td>
                <td><img src="https://via.placeholder.com/50" class="user-img" alt="Alex Blue"></td>
                <td>Alex Blue</td>
                <td>alexblue@example.com</td>
                <td>Administrateur</td>
                <td>
                    <a href="#" class="btn-action btn-edit">Modifier</a>
                    <a href="#" class="btn-action btn-delete">Supprimer</a>
                </td>
            </tr>
        </tbody>
    </table>
@endsection
