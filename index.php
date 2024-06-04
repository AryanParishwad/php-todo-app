<?php
include 'includes/config.php';

$result = $conn->query("SELECT * FROM tasks");

if (isset($_POST['add_task'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];

    $conn->query("INSERT INTO tasks (title, description) VALUES ('$title', '$description')");

    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>To-Do List</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>To-Do List</h1>
        </div>
    </header>
    <div id="main" class="container">
        <form action="index.php" method="POST">
            <input type="text" name="title" placeholder="Task Title" required>
            <textarea name="description" placeholder="Task Description"></textarea>
            <input type="submit" name="add_task" value="Add Task">
        </form>
        <table>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['created_at']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a> |
                    <a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>
