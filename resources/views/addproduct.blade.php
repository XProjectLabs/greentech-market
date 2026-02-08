<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ajouter un Produit - GreenTech</title>
<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: #eafaf1;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        padding: 20px;
    }

    form {
        background: #ffffff;
        padding: 30px 40px;
        border-radius: 12px;
        box-shadow: 0 6px 15px rgba(0, 128, 0, 0.15);
        width: 400px;
        border-top: 5px solid #28a745;
        position: relative;
    }

    h1 {
        text-align: center;
        margin-bottom: 25px;
        color: #2f6f3e;
        font-size: 24px;
    }

    label {
        display: block;
        margin-bottom: 6px;
        font-weight: bold;
        color: #3a5d3a;
    }

    input[type="text"],
    input[type="number"],
    select,
    textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 18px;
        border: 1px solid #b3d9b3;
        border-radius: 6px;
        font-size: 14px;
        transition: all 0.3s;
    }

    input[type="text"]:focus,
    input[type="number"]:focus,
    select:focus,
    textarea:focus {
        border-color: #28a745;
        box-shadow: 0 0 5px rgba(40, 167, 69, 0.4);
        outline: none;
    }

    textarea {
        resize: vertical;
        min-height: 80px;
    }

    select {
        background-color: #f0fff4;
    }

    button {
        width: 100%;
        padding: 12px;
        background: #28a745;
        color: #fff;
        font-size: 16px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: background 0.3s;
    }

    button:hover {
        background: #218838;
    }

    form::before {
        content: "🌿";
        font-size: 50px;
        position: absolute;
        top: -25px;
        left: calc(50% - 25px);
        opacity: 0.2;
    }
</style>
</head>
<body>

<form action="#" method="POST">
    <h1>Ajouter un Produit</h1>

    <label for="name">Nom du produit</label>
    <input type="text" id="name" name="name" placeholder="Nom du produit" required>

    <label for="description">Description</label>
    <textarea id="description" name="description" placeholder="Description du produit" required></textarea>

    <label for="price">Prix (€)</label>
    <input type="number" id="price" name="price" placeholder="Prix" step="0.01" required>

    <label for="stock">Stock</label>
    <input type="number" id="stock" name="stock" placeholder="Quantité en stock" required>

    <label for="category">Catégorie</label>
    <select id="category" name="category" required>
        <option value="">-- Sélectionner --</option>
        <option value="plantes">Plantes</option>
        <option value="graines">Graines</option>
        <option value="outils">Outils</option>
    </select>

    <label for="image_url">URL de l'image</label>
    <input type="text" id="image_url" name="image_url" placeholder="https://example.com/image.jpg">

    <button type="submit">Ajouter le produit</button>
</form>

</body>
</html>
