<?php
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Quelle photo ?</h1>
    <form action="resultat-upload.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
        <label for="photo">Fichier contenant une photo</label>
        <label for="fileNameInput">Edit file name:</label>
        <input type="text" id="fileNameInput" name="fileName">
        <input type="file" name="ficphoto" id="fileInput" accept="image/jpg, image/jpeg, image/png" onchange="updateFileName()" required>
        <br/>
        <br/>
        <input type='submit' value='Téléverser la photo'>
    </form>

    <head>
    <title>File Name Edit Example</title>
    <script>
        // JavaScript function to update the text input value when a file is selected
        function updateFileName() {
            var fileInput = document.getElementById('fileInput');
            var fileNameInput = document.getElementById('fileNameInput');

            console.log(fileInput)
            console.log("value : "+fileInput.value+" "+ typeof(fileInput.value))
            console.log("split : "+fileInput.value.split('\\')+typeof(fileInput.value))
            console.log("split : "+fileInput.value.split('\\').pop()) 
            console.log("count : "+fileInput.value.split('\\').length)


            // Get the selected file name
            var fileName = fileInput.value.split('\\').pop();

            // Update the text input value
            fileNameInput.value = fileName;
        }
    </script>
</head>
<body>

<form method="post" action="process_upload.php" enctype="multipart/form-data">
    <label for="fileInput">Choose a file:</label>
    <input type="file" id="fileInput" name="userFile" onchange="updateFileName()">
    
    <br>
    
    <label for="fileNameInput">Edit file name:</label>
    <input type="text" id="fileNameInput" name="fileName">

    <br>

    <input type="submit" value="Upload">
</form>

</body>
</html>
</body>
</html>

