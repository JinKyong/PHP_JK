<style>
    #element_to_pup_up input{
        width: 100%;
        margin-bottom: 10px;
        padding: 5px;
    }

    #element_to_pup_up input[type="submit"]{
        background-color: #b8daff;
        color:#eb9316;
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