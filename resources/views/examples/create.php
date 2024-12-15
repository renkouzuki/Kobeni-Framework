<!DOCTYPE html>
<html>
<head>
    <title>Create Example</title>
</head>
<body>
    <?php if (isset($error)): ?>
        <div class="alert error"><?php echo $error; ?></div>
    <?php endif; ?>

    <h1>Create Example</h1>

    <form method="POST" action="/examples">
        <div>
            <label>Name:</label>
            <input type="text" name="name" value="<?php echo $old['name'] ?? ''; ?>" >
        </div>
        <button type="submit">Save</button>
        <a href="/examples">Cancel</a>
    </form>
</body>
</html>