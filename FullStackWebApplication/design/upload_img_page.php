<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image</title>
</head>
<body>
    <p>Please submit image of these types: PNG, JPG, JPEG</p>
    <form action="../php/upload_image.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="file_upload" required>
        <input type="text" name="description">
        <Select name="privacy">
            <option value="public">Public</option>
            <option value="internal">Internal</option>
            <option value="private">Private</option>
        </Select>
        <button type="submit" name="upload">UPLOAD</button>
    </form>     
</body>
</html>