<!DOCTYPE html>
<html>
<head>
    <title>Edit Example</title>
</head>
<body>
    <?php if (isset($error)): ?>
        <div class="alert error"><?php echo $error; ?></div>
    <?php endif; ?>

    <h1>Edit Example</h1>

    <form method="POST" action="/examples/<?php echo $example['id']; ?>">
        <div>
            <label>Name:</label>
            <input type="text" name="name" value="<?php echo $example['name']; ?>" required>
        </div>
        <button type="submit">Update</button>
        <a href="/examples">Cancel</a>
    </form>
</body>
</html>