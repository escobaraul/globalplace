
<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <h1 class="text-white text-center mb-4">Crear Nuevo Anuncio</h1>
    <?= \Config\Services::validation()->listErrors() ?>
    <!-- Formulario de creación de anuncio -->
    <form action="/advertisements/store" method="post">
        <?= csrf_field() ?>

        <label for="title">Title:</label>
        <input type="text" name="title" value="<?= set_value('title') ?>"><br>

        <label for="description">Description:</label>
        <textarea name="description"><?= set_value('description') ?></textarea><br>

        <label for="category_id">Categoría:</label>
        <select name="category_id" required>
            <option value="">Seleccione una categoría</option>
            <?php foreach ($categories as $category): ?>
                <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
            <?php endforeach; ?>
        </select>

        <label for="price">Price:</label>
        <input type="number" name="price" value="<?= set_value('price') ?>"><br>

        <label for="expiration_date">Expiration Date:</label>
        <input type="date" name="expiration_date" value="<?= set_value('expiration_date') ?>"><br>

        <label for="is_paid">Is Paid:</label>
        <input type="checkbox" name="is_paid" value="1" <?= set_checkbox('is_paid', '1') ?>><br>

        <label for="max_views">Max Views:</label>
        <input type="number" name="max_views" value="<?= set_value('max_views') ?>"><br>

        <label for="duration_days">Duration Days:</label>
        <input type="number" name="duration_days" value="<?= set_value('duration_days') ?>"><br>

        <button type="submit">Create Advertisement</button>
    </form>
    
</div>
<?= $this->endSection() ?>
