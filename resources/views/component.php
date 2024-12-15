<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h1>Component Example</h1>
    
    <?php echo $view->component('button', [
        'type' => 'primary',
        'text' => 'Save Changes',
        'class' => 'mb-5'
    ]); ?>

    <?php echo $view->component('button', [
        'type' => 'danger',
        'text' => 'Delete',
        'class' => 'ms-2'
    ]); ?>
</body>
</html>