<style>
    #element_to_pup_up input{
        width: 100%;
        margin-bottom: 10px;
        padding: 5px;
    }

    #element_to_pup_up input[type="submit"]{
        background-color: #5897fb;
        color:#fdf7f7;
    }
</style>

<div id="element_to_pup_up">
    <h3>Log-In</h3>
    <form method="post" action="function/login.php">
        <input type="text" placeholder="ID" name="id">
        <input type="password" placeholder="PW" name="pw">
        <input type="submit" value="Login">
    </form>
</div>

<style>
    #upload_to_pup_up input{
        width: 100%;
        margin-bottom: 10px;
        padding: 5px;
    }

    #upload_to_pup_up #preview{
        width: 100%;
        height: auto;
    }

    #upload_to_pup_up input[type="submit"]{
        background-color: #5897fb;
        color:#fdf7f7;
    }
</style>

<div id="upload_to_pup_up">
    <h3>Upload</h3>
    <form method="" action="">
        <input type='file' id="imgInp">
        <img id="preview"src="#" />
        <input type="text" name="title" placeholder="Title">
        <input type="text" name="description" placeholder="Desc">
        <input type="submit" value="Upload">
    </form>
</div>