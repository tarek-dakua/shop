<!DOCTYPE html>
<html lang="en">
<body>

<?php
session_start();
if($_SESSION["pay"]=="")
{

    ?>
    <script type="text/javascript">
        window.location="shop.php";
    </script>

    <?php
}
$_SESSION["paypalphp"]="yes";
?>
<?php
$pay=$_SESSION["pay"];
$order_id=$_SESSION["order_id"];

?>

<form>
    <input type="text" placeholder="Pincode" name="confirmation" required pattern="[0-9]{6}" title="please enter valid pincode[0-9 and 6 digit only]" style="position:center ;height: 50px;width:350px; background-color: #0480be">
    <input type="submit" name="submit1" value="save" style="height: 50px;background-color:#843534; color:white; font-weight:bold">
    <?php
    if(isset($_POST["submit1"]))
    {
        $link=mysqli_connect("localhost","root","");
        mysqli_select_db($link,"dakua_project");
        mysqli_query($link,insert into checkout_address values());
    }
    ?>
</form>
<div id="bkash-how-to" style="border: solid;color: #7B0F75;right: inherit">
    <div class="modal fade in" id="bkashModal" tabindex="-1" role="dialog" aria-labelledby="bkashModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="bkashModalLabel">How to pay using bKash</h4>
                </div>

                <div class="modal-body">
                    <div style="width: 99%; /* font-size:9px; font-family:Arial,Verdana,Helvetica Neue; */">
                        <!-- <div style="font-family:Arial,Verdana,Helvetica Neue;font-size:9px;"> -->
                        <!--                        <p><b style="color:#fc0202;">How to pay using bKash</b></p>-->

                        <p>You can make payments from your "PERSONAL bKash WALLET" to Shohoz.com's "Merchant bKash Wallet". Please follow the steps below:</p>
                        <ul>
                            <li>Go to your bKash Mobile Menu by dialing <b style="color:#fc0202;">*247#</b></li>
                            <li>Choose <b style="color:#fc0202;">"Payment"</b></li>
                            <li>Enter the Merchant bKash Wallet Number you want to pay to (<i style="color:#fc0202;">Enter 01791715774</i>)</li>
                            <li>Enter the amount you want to pay</li>
                            <li>Enter reference - <i style="color:#fc0202;">Enter the mobile number</i></li>
                            <li>Now enter your bKash Mobile Menu PIN to confirm</li>
                        </ul>
                        <p>Done! You will receive a confirmation message from bKash.</p>
                        <!-- </div> -->

                        <!-- <div style="width: 48%; float: right; font-family:Arial,Verdana,Helvetica Neue;font-size:9px;"></div> -->
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
</body>