<footer>
    <div class="container">
        <div class="test text-center">
            <a href="mailto:nwps8716@gmail.com"><img src="../views/img/email.png"></a>
            <a href="https://zh-tw.facebook.com" target="_blank"><img src="../views/img/fb.png"></a>
        </div>
        <div class="text-center">
            <p>Copyright &copy; Bootstrap</p>
        </div>
    </div>
    <?PHP
        if(isset($_SESSION['alert'])){
            echo "<script>alert('" . $_SESSION['alert'] . "');</script>";
            unset($_SESSION['alert']);
        }
    ?>
</footer>