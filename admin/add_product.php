<?php
session_start();
if($_SESSION["admin"]=="")
{
    ?>
    <script type="text/javascript">
        window.location="admin_login.php";
    </script>
    <?php
}
include "header.php";
include "menu.php";
?>
<?php
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"dakua_project");
?>
<div class="grid_10">
            <div class="box round first">
                <h2>
                   Add Product</h2>
                <div class="block">
                    
					<form name="form1" action="" method="post" enctype="multipart/form-data">
					<table border="1">
					<tr>
					<td>Product Name</td>
					<td><input type="text" name="pnm" value="this is testing"></td>
					</tr>
					<tr>
					<td>Product Price</td>
					<td><input type="text" name="pprice" value="50"></td>
					</tr>
					<tr>
					<td>Product Quantity</td>
					<td><input type="text" name="pqty" value="5"></td>
					</tr>
					<tr>
					<td>Product Image</td>
					<td><input type="file" name="pimage"></td>
					</tr>
					<tr>
					<td>Product Categoty</td>
					<td>
					<select name="pcategory">
					<option value="panjabi" selected>PANJABI</option>
					<option value="pajama">PAJAMA</option>
					<option value="shirt">SHIRT</option>
					<option value="tee_shirt">TEE SHIRT</option>
                        <option value="gent_shoes">GENT_SHOES</option>
                        <option value="saree">SAREE</option>
                        <option value="shalwar">SHALWAR</option>
                        <option value="kamees">KAMEES</option>
                        <option value="ladies_shoes">LADIES_SHOES</option>
                        <option value="phone">mobile phone</option>
                        <option value="BOOKS">book</option>
                        <option value="Laboratory product">Lab product</option>

					</select>
					</td>
					</tr>
					<tr>
					<td>Product Description</td>
					<td>
					<textarea cols="15" rows="10" name="pdesc">this is nice product</textarea>
			        </td>
					</tr>
					<tr>
					<td colspan="2" align="center"><input type="submit" name="submit1" value="upload" ></td>
				</tr>
					
					
					</table>
					
					
					</form>

<?php
if(isset($_POST["submit1"]))
{
   $v1=rand(1111,9999);
   $v2=rand(1111,9999);
   
   $v3=$v1.$v2;
   
   $v3=md5($v3);
   
   
   $fnm=$_FILES["pimage"]["name"];
   $dst="./product_image/".$v3.$fnm;
   $dst1="product_image/".$v3.$fnm;
   move_uploaded_file($_FILES["pimage"]["tmp_name"],$dst);
mysqli_query($link,"insert into product values('','$_POST[pnm]',$_POST[pprice],$_POST[pqty],'$dst1','$_POST[pcategory]','$_POST[pdesc]')");

}

?>					
					
					
                </div>
            </div>
<?php
include "footer.php";  
  
?>         
     