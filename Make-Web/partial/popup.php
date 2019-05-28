<div id="element_to_pup_up">
    <h3>Log-In</h3>
    <form method="post" action="function/login.php">
        <input type="text" placeholder="ID" name="id">
        <input type="password" placeholder="PW" name="pw">
        <input type="submit" value="Login">
    </form>
</div>

<div id="upload_to_pup_up">
    <h3>Upload</h3>
    <form enctype="multipart/form-data" method="POST" action="function/upload.php">
        <input type='file' name="imglnp" id="imgInp">
        <img id="preview"src="#" />
        <input type="text" name="title" placeholder="Title">
        <input type="text" name="description" placeholder="Desc">
        <input type="submit" value="Upload">
    </form>
</div>