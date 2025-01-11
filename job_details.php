<?php
include('connection.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT job_title FROM jobs WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $job = $result->fetch_assoc();
    } else {
        die("Job not found.");
    }
} else {
    die("Invalid request.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Details</title>
    <style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f5f5f5;
}

.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #00bcd4;
    color: white;
    padding: 10px 20px;
}

.navbar h1 {
    margin: 0;
}

.search-container {
    display: flex;
    gap: 5px;
}

.search-container input {
    padding: 5px;
    border: none;
    border-radius: 5px;
}

.search-container button {
    padding: 5px 10px;
    border: none;
    background-color: white;
    color: #00bcd4;
    border-radius: 5px;
    cursor: pointer;
}

.icons span {
    margin: 0 5px;
    cursor: pointer;
}

#jobseeker-icon {
    font-size: 1.2em;
    cursor: pointer;
}

.content {
    padding: 20px;
}

.content h2 {
    color: #003366;
}

#job-list {
    list-style-type: none;
    padding: 0;
}

#job-list li {
    background-color: white;
    padding: 10px;
    margin: 5px 0;
    border-radius: 5px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    position: relative;
}

#job-list li a {
    text-decoration: none;
    color: #003366;
    display: inline-block;
    width: 100%;
}

#job-list li a:hover {
    text-decoration: underline;
}

/* Tooltip styling on hover */
#job-list li a:hover::after {
    content: attr(title);
    position: absolute;
    bottom: -40px;
    left: 10px;
    background-color: #333;
    color: #fff;
    padding: 5px;
    border-radius: 5px;
    font-size: 12px;
    white-space: nowrap;
    z-index: 10;
}
</style>
 
</head>
<body>
    <div class="content">
        <h1><?php echo $job['job_title']; ?></h1>
        <a href="dashboard.php">Back to Jobs</a>
    </div>
</body>
</html>
