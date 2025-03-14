<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Advertisement</title>
</head>
<body>

    <h1>Edit Advertisement</h1>

    <?= \Config\Services::validation()->listErrors() ?>

    <form action="/advertisements/update/<?= $advertisement['id'] ?>" method="post">
        <?= csrf_field() ?>

        <label for="title">Title:</label>
        <input type="text" name="title" value="<?= set_value('title', $advertisement['title']) ?>"><br>

        <label for="description">Description:</label>
        <textarea name="description"><?= set_value('description', $advertisement['description']) ?></textarea><br>

        <label for="price">Price:</label>
        <input type="text" name="price" value="<?= set_value('price', $advertisement['price']) ?>"><br>

        <label for="expiration_date">Expiration Date:</label>
        <input type="date" name="expiration_date" value="<?= set_value('expiration_date', $advertisement['expiration_date']) ?>"><br>

        <label for="is_paid">Is Paid:</label>
        <input type="checkbox" name="is_paid" value="1" <?= set_checkbox('is_paid', '1', $advertisement['is_paid']) ?>><br>

        <label for="max_views">Max Views:</label>
        <input type="number" name="max_views" value="<?= set_value('max_views', $advertisement['max_views']) ?>"><br>

        <label for="duration_days">Duration Days:</label>
        <input type="number" name="duration_days" value="<?= set_value('duration_days', $advertisement['duration_days']) ?>"><br>

        <button type="submit">Update Advertisement</button>
    </form>

</body>
</html>