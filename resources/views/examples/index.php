<!DOCTYPE html>
<html>
<head>
    <title>Examples</title>
</head>
<body>
    <?php if (isset($_GET['message'])): ?>
        <div class="alert success"><?php echo $_GET['message']; ?></div>
    <?php endif; ?>
    
    <?php if (isset($_GET['error'])): ?>
        <div class="alert error"><?php echo $_GET['error']; ?></div>
    <?php endif; ?>

    <h1>Examples</h1>
    
    <a href="/examples/create">Create New</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($examples as $example): ?>
                <tr>
                    <td><?php echo $example['id']; ?></td>
                    <td><?php echo $example['name']; ?></td>
                    <td><?php echo $example['created_at']; ?></td>
                    <td>
                        <a href="/examples/<?php echo $example['id']; ?>/edit">Edit</a>
                        <form method="POST" action="/examples/<?php echo $example['id']; ?>/delete" style="display:inline;">
                            <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>