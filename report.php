<!DOCTYPE html>
<html>
    <head>
        <script src="js/jquery-1.4.4.min.js" type="text/javascript"></script>
        <script src="js/jquery.ui.core.js" type="text/javascript"></script>
        <script src="js/jquery.ui.datepicker.js" type="text/javascript"></script>
        <title>ระบบบันทึกเวลาเข้า-ออกงาน</title>
        <link href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" type="text/css" rel="stylesheet" />
       
    </head>
    <style type="text/css">
        body{background: linear-gradient(to right, #388e3c , #8bc34a);}
    </style>
    <body>
        <div class="container">
            <center><h1>ระบบออกรายงาน การบันทึกเวลาเข้า-ออกงาน</h1></center>
            <br>
            <form action="report_show.php" method="post" name="frmMain" id="frmMain">
            <table>
                <tr>
                    <td>กรุณาเลือกวันที่</td>
                    <td><input id="date1" name="date1" type="text" /></td>
                </tr>
                <tr>
                    <td>ถึงวันที่</td>
                    <td><input id="date2" name="date2" type="text" /></td>
                </tr>
                <tr>
                    <td></td>
                    <td>&nbsp</td>
                </tr>
                <tr>
                    <td>เลือกทั้งหมด</td>
                    <td><input type="checkbox" name="chkbox[]" id='CheckAll' onclick="ClickCheckAll(this)" value="Y"></td>
                </tr>
                <tr>
                    <td>ข้าราชการ/พนักงานราชการ</td>
                    <td><input type="checkbox" name="chkbox[]" id='Chk1' ></td>
                </tr>
                 <tr>
                     <td>เจ้าหน้าที่เหมาจ่าย  </td>
                    <td><input type="checkbox" name="chkbox[]" id='Chk2' ></td>
                </tr>
                <tr>
                     <td>เจ้าหน้าที่บริษัท</td>
                    <td><input type="checkbox" name="chkbox[]" id='Chk3' ></td>
                </tr>
                <tr>
                    <td></td>
                    <td>&nbsp</td>
                </tr>
                <!-- <tr>
                    <td>เลือกทั้งหมด</td>
                    <td><input type="checkbox" name="chkbox2[]" id='CheckAll' onclick="ClickCheckAll2(this)"></td>
                </tr>
                <tr>
                    <td>เวลาปกติ  ก่อน 08.30 น.</td>
                    <td><input type="checkbox" name="chkbox2[]" id='c1' ></td>
                </tr>
                <tr>
                    <td>ช้ากว่าปกติ หลัง08.30 น.</td>
                    <td><input type="checkbox" name="chkbox2[]" id='c2' ></td>
                </tr>
                <tr>
                    <td>ลาป่วย</td>
                    <td><input type="checkbox" name="chkbox2[]" id='c3' ></td>
                </tr>
                <tr>
                    <td>ลากิจ</td>
                    <td><input type="checkbox" name="chkbox2[]" id='c4' ></td>
                </tr> -->
            </table>
            <input type="submit" name="submit" value="ออกรายงาน">
                
                
            </form>
        </div>
    </body>
</html>

 <script type="text/javascript">
    $(function () {
        $("#date1").datepicker({ dateFormat: "dd-mm-yy" });
        $("#date2").datepicker({ dateFormat: "dd-mm-yy" });
    });

    function ClickCheckAll(vol)
    {
    
        var i=1;
        for(i=1;i<=3;i++)
        {
            if(vol.checked == true)
            {
                eval("document.frmMain.Chk"+i+".checked=true");
            }
            else
            {
                eval("document.frmMain.Chk"+i+".checked=false");
            }
        }
    }
    function ClickCheckAll2(vol)
    {
    
        var i=1;
        for(i=1;i<=4;i++)
        {
            if(vol.checked == true)
            {
                eval("document.frmMain.c"+i+".checked=true");
            }
            else
            {
                eval("document.frmMain.c"+i+".checked=false");
            }
        }
    }
</script>