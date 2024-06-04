<?php
include 'includes/config.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM tasks WHERE id=$id");
$task = $result->fetch_assoc();

if (isset($_POST['update_task'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];

    $conn->query("UPDATE tasks SET title='$title', description='$description' WHERE id=$id");

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Task</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Edit Task</h1>
        </div>
    </header>
    <div id="main" class="container">
        <form action="edit.php?id=<?php echo $task['id']; ?>" method="POST">
            <input type="text" name="title" value="<?php echo $task['title']; ?>" required>
            <textarea name="description"><?php echo $task['description']; ?></textarea>
            <input type="submit" name="update_task" value="Update Task">
        </form>
    </div>
</body>
</html>
