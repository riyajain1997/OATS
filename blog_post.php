<?php
    include_once("DbConnection.php");
    $Bid=$_GET['bid'];
    
    if(isset($_POST['btnsubmit']))
    {
        #---------------Updating Data---------------#
        $title1=$_POST['txttitle'];
        $content1=$_POST['txtcontent'];
        $image1=$_FILES['txtimage']['name'];
        $tmp_name=$_FILES['txtimage']['tmp_name'];
        $path="Uploaded/Images/".$image1;
        #---------------Updating Data---------------#
        
        if($Bid>0)
        {
            move_uploaded_file($tmp_name,$path);
            $update="UPDATE tblblogs set Title='".$_POST['txttitle']."',Content='".$_POST['txtcontent']."',
            File='".$image1."' WHERE Bid=$Bid";
            $exe=mysqli_query($con,$update);

            if($exe)
            {
                echo '<script type="text/javascript">alert("Blog updated successfully...");</script>';
                /*header("Location:blog.php");*/
            }
            else
            {
                echo "error".mysqli_error($con);
            }
        }
        elseif($Bid==0)
        {
            $uid=$_SESSION['UserID'];
            /*$title=$_POST['txttitle'];
            $content=$_POST['txtcontent'];*/
            $date=date("y/m/d");            

            move_uploaded_file($tmp_name,$path);
            $query_blog="insert into tblblogs(Title,Content,File,CreatedDate,Uid,IsActive)values('$title1','$content1','$image1',now(),$uid,1)";
            $execute=mysqli_query($con,$query_blog);

            if($execute)
            {
                echo '<script type="text/javascript">alert("Blog posted successfully...");</script>';
            }
            else
            {
                echo "error".mysqli_error($con);
            }
        }   
    }
?>

<!DOCTYPE html>
<html lang="zxx">
    <head>
        <?php include_once('cssLinks.php');?>

        <!-- javascript validation start  -->
        <script type="text/javascript">
            function validate()
            {
                var title = document.forms["myform"]["txttitle"].value;
                var cont = document.forms["myform"]["txtcontent"].value;
                var image = document.forms["myform"]["txtimage"].value;

                if(title == ""){
                    document.getElementById('titlespan').innerHTML =" ** Please enter blog title";
                    return false;
                }else{
                    document.getElementById('titlespan').innerHTML ="";

                }
                if(cont == ""){
                    document.getElementById('contspan').innerHTML =" ** Please enter blog content";
                    return false;
                }else{
                    document.getElementById('contspan').innerHTML ="";

                }
                if(image == ""){
                    document.getElementById('filespan').innerHTML =" ** Please select an image";
                    return false;
                }else{
                    document.getElementById('filespan').innerHTML ="";

                }
                return true;
            } 
        </script> 
        <!--javascript validation ends  -->
    </head>
    <body>

        <!-- Start Navbar Area -->
        <?php 
            if($_SESSION['Type']=="Student")
            {
                include_once('headerStudent.php');
            }
            else if($_SESSION['Type']=="Alumni")
            {
                include_once('headerAlumni.php');
            }
            else{
                include_once('headerHod.php');
            }
        ?>
        <!-- End Navbar Area -->

        <!-- Page Title -->
        <div class="page-title-area">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="page-title-text">
                            <h2>Blog Post</h2>
                            <ul>
                                <li>
                                    <a href="index.php">Home</a>
                                </li>
                                <li>
                                    <i class="icofont-simple-right"></i>
                                </li>
                                <li>Blog Post</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Title -->

        <!-- Dashboard -->
        <div class="dashboard-area pt-100">
            <div class="container">
                <?php
                    if($Bid>0)
                    {
                        #----------------Filling input box-------#
                        $select="SELECT * from tblblogs where Bid=$Bid";
                        $Execute=mysqli_query($con,$select) or die(mysqli_error($con));
                        $fetch=mysqli_fetch_array($Execute);

                        $title=$fetch['Title'];
                        $cont=$fetch['Content'];
                        $file=$fetch['File'];
                        #----------------Filling input box-------#  

                        if($file=="" || !file_exists("Uploaded/Images/$file"))
                        {
                            $file="blog1.JFIF";
                        }
                ?>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="create-information">
                                <form method="POST" name="myform" enctype="multipart/form-data">
                                    <h3>Post a Blog</h3>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Post Title:</label>
                                                <input type="text" name="txttitle" id="txttitle" value="<?php echo $title; ?>" class="form-control" placeholder="Title">
                                                <span id="titlespan" style="color: red"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Post Content:</label>
                                                <textarea name="txtcontent" id="txtcontent" rows="8" class="form-control" placeholder="Enter here"><?php echo $cont; ?></textarea>
                                                <span id="contspan" style="color: red"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">`
                                                <label>Upload Image:</label>
                                                <img src="Uploaded/Images/<?php echo $file; ?>" style="height: 50px; width: 100px;">
                                                <input type="file" name="txtimage" id="txtimage" class="form-control">
                                                <span id="filespan" style="color: red"></span>
                                            </div>
                                        </div>
                                        <!--<div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Upload Video:</label>
                                                <input type="file" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Upload File:</label>
                                                <input type="file" class="form-control">
                                            </div>
                                        </div>-->
                                    </div>
                                    <div class="text-left">
                                        <button type="submit" name="btnsubmit" class="btn create-ac-btn" onclick="return validate();">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php
                    }
                    else{
                ?>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="create-information">
                                <form method="POST" name="myform" enctype="multipart/form-data">
                                    <h3>Post a Blog</h3>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Post Title:</label>
                                                <input type="text" name="txttitle" id="txttitle" class="form-control" placeholder="Title">
                                                <span id="titlespan" style="color: red"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Post Content:</label>
                                                <textarea name="txtcontent" id="txtcontent" rows="8" class="form-control" placeholder="Enter here"></textarea>
                                                <span id="contspan" style="color: red"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Upload Image:</label>
                                                <img src="" style="height: 50px; width: 100px;">
                                                <input type="file" name="txtimage" id="txtimage" class="form-control">
                                                <span id="filespan" style="color: red"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-left">
                                        <button type="submit" name="btnsubmit" class="btn create-ac-btn" onclick="return validate();">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php
                    }
                ?>
            </div>
        </div>
        <!-- End Dashboard -->

        <!-- Footer -->
        <?php include_once('footer.php');?>
        <!-- End Footer -->


        <!-- Start Script -->
        <?php include_once('scriptsLinks.php');?>
        <!-- End Script -->
    </body>
</html>