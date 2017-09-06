<?php
    session_start();

?>
<!DOCTYPE html>
<html>
<head >
    <title></title>
    <meta http-equiv="content-Type" content="text/html; charset=utf8">
    <script src="jquery-3.2.1.js"></script>
</head>
<body>
    <div class="container">
        <form action="#" method="post">
            <div class="regis">
                <p>เข้าสู่ระบบ [Smart Card]</p>
                <input type="text" placeholder=" เลขบัตรประจำตัวประชาชน (ไม่ต้องกรอก)" size="50" maxlength="13" minlength="13" required="" name="cid" readonly id="cid">
            </div>
        </form>
        <br>
         <a href="smartcard.php" style="margin-left: 12%;">สมัครสมาชิก</a>
    </div>
</body>
</html>
<?php
    $cid=$_POST['cid'];
    echo $cid;
?>
<script>
function smartcard(){
    $.ajax({
        type:"GET",
        dataType:"json",
        url:"http://localhost:8080/smartcard/data/",
        success:function(data){
            $("#cid").val(data.cid);
            $("#birth").val(data.dob);
            if(data.cid!=null)
            succes(data.cid);

        }
    });
}
setInterval(smartcard, 1000);
function succes(cid){
    window.location="smartcard3.php?id="+cid;
}
</script>