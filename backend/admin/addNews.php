<?php include 'layouts/header.php'; 
  $categoryName=retriveCategories($conn);

  //$subCategoryName=retriveSubCategories($conn);
  
?>
<script>
    function fetchCategoryId(categoryName){ 
      
dataString = 'categoryName='+categoryName; 

var req=new XMLHttpRequest();
req.open("GET","SubCategoryIDRetrive.php?categoryName="+categoryName,true);
req.send();

req.onreadystatechange=function(){
if(req.readyState==4 && req.status==200){
    document.getElementById("categoryid").innerHTML=req.responseText;
}
}; 


$.ajax({
      type: 'post',
      url: 'SubCategoryIDRetrive1.php',
      data: dataString,
      datatype : "json",
      success: function (response) {
        console.log(response);
         var a = '<option value="">No Sub-Catagory Available</option>';        
        if (response==0) {
          $('#subCategory').html(a);
          $("#data").hide();
          console.log(response);
                     
        }
        else{
          console.log(response);
          $("#data").show();
          $('#subCategory').html(response);
       
        }
      }

        
    });       
}
function fetchSubCategoryId(str){
var req=new XMLHttpRequest();
req.open("GET","SubCategoryIDRetrive2.php?subCategoryName="+str,true);
req.send();

req.onreadystatechange=function(){
if(req.readyState==4 && req.status==200){
    document.getElementById("subcategoryid").innerHTML=req.responseText;
}
}; 
// alert(123);  
}

 
    </script>
   <!-- END HEADER -->
   <!-- BEGIN CONTAINER -->
   <div id="container" class="row-fluid">
      <!-- BEGIN SIDEBAR -->
      <div class="sidebar-scroll">
        <div id="sidebar" class="nav-collapse collapse">

         <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
         <div class="navbar-inverse">
            <form class="navbar-search visible-phone">
               <input type="text" class="search-query" placeholder="Search" />
            </form>
         </div>
         <!-- END RESPONSIVE QUICK SEARCH FORM -->
         <!-- BEGIN SIDEBAR MENU -->
          <?php include'layouts/sidebar.php'; ?>
         <!-- END SIDEBAR MENU -->
      </div>
      </div>
      <!-- END SIDEBAR -->
      <!-- BEGIN PAGE -->  
      <div id="main-content">
         <!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->   
            <div class="row-fluid">
               <div class="span12">
                   <!-- BEGIN THEME CUSTOMIZER-->
                   <div id="theme-change" class="hidden-phone">
                       <i class="icon-cogs"></i>
                        <span class="settings">
                            <span class="text">Theme Color:</span>
                            <span class="colors">
                                <span class="color-default" data-style="default"></span>
                                <span class="color-green" data-style="green"></span>
                                <span class="color-gray" data-style="gray"></span>
                                <span class="color-purple" data-style="purple"></span>
                                <span class="color-red" data-style="red"></span>
                            </span>
                        </span>
                   </div>
                   <!-- END THEME CUSTOMIZER-->
                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                   <h3 class="page-title">
                     Add News
                   </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="#">Home</a>
                           <span class="divider">/</span>
                       </li>
                       <li>
                           <a href="#">News</a>
                           <span class="divider">/</span>
                       </li>
                       <li class="active">
                           Add News
                       </li>
                       <li class="pull-right search-wrap">
                           <form action="search_result.html" class="hidden-phone">
                               <div class="input-append search-input-area">
                                   <input class="" id="appendedInputButton" type="text">
                                   <button class="btn" type="button"><i class="icon-search"></i> </button>
                               </div>
                           </form>
                       </li>
                   </ul>
                   <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
           



            <div class="row-fluid">
                <div class="span12">
                    <!-- BEGIN  widget-->
                    <div class="widget yellow">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i> Add News</h4>
                        <span class="tools">
                           <a href="javascript:;" class="icon-chevron-down"></a>
                           <a href="javascript:;" class="icon-remove"></a>
                           </span>
                        </div>
                        <div class="widget-body form">
                            <!-- BEGIN FORM-->
                            <form method="POST" accept-charset="utf-8" class="form-horizontal" enctype="multipart/form-data">
                            <div class="control-group">
                                <label class="control-label">Heading/Title</label>
                                <div class="controls">
                                    <input type="text" class="span6 " name="news_title" required />
                                    <!-- <span class="help-inline">Some hint here</span> -->
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Written By</label>
                                <div class="controls">
                                    <input type="text" class="span6 " name="news_writtenby" required />
                                    <!-- <span class="help-inline">Some hint here</span> -->
                                </div>
                            </div>   
                            <div class="control-group">
                                <label class="control-label">News Category</label>
                                <div class="controls">
                                    <select data-placeholder="Your Favorite Type of Bear" class="chzn-select-deselect span6" tabindex="-1" onchange="fetchCategoryId(this.value)"  name="category_name" id="selCSI" required >
                                        <option value="">Select Category</option>
                                        <?php
                                        foreach($categoryName as $key){
                                            foreach($key as $value){?>
                                        <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                                     <?php   } }
                                        
                                        ?>
                                        <!-- <option>catagory1</option>
                                        <option>catagory2</option> -->
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Category Id</label>
                                <div class="controls">
                                    <select name="category_id" id="categoryid" class="span6" required >
                                    </select>
                                    <!-- <input type="text"  class="span6 " name="category_id" id="categoryid"   /> -->
                                    <!-- <span class="help-inline">Some hint here</span> -->
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">News Sub-Catagory</label>
                                <div class="controls">
                                    <select data-placeholder="Your Favorite Type of Bear" class="chzn-select-deselect span6" tabindex="-1"   name="category_name" id="subCategory" onchange="fetchSubCategoryId(this.value)" required >
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Sub-Category Id</label>
                                <div class="controls">
                                    <select name="subcategory_id" id="subcategoryid" required  class="span6">
                                    </select>
                                    <!-- <input type="text"  class="span6 " name="category_id" id="categoryid"   /> -->
                                    <!-- <span class="help-inline">Some hint here</span> -->
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"> Banner News</label>
                                <div class="controls">
                                    <select data-placeholder="Your Favorite Type of Bear" class="chzn-select-deselect span6" tabindex="-1" name="is_bannerNews" required id="selCSI">
                                        <option value="">Select</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">News Details</label>
                                <div class="controls">
                                    <textarea class="span12 ckeditor"   name="news_details" rows="6"></textarea>
                                 </div>                               
                            </div>    
                            
                            <div class="control-group">
                                <label class="control-label">News Url</label>
                                <div class="controls">
                                    <input type="text" class="span6 " name="news_url" required />
                                    <!-- <span class="help-inline">Some hint here</span> -->
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">News Image</label>
                                <div class="controls">
                                    <input type="file" class="span6" name="file1[]" multiple required  />                              
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Featured or Banner Image</label>
                                <div class="controls">
                                    <input type="file" class="span6 " name="news_featuredimage" required  />
                                    
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"> Status</label>
                                <div class="controls">
                                    <select data-placeholder="Your Favorite Type of Bear" class="chzn-select-deselect span6" tabindex="-1" name="is_active" required id="selCSI">
                                        <option value="">Select</option>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"> Top News</label>
                                <div class="controls">
                                    <select data-placeholder="Your Favorite Type of Bear" class="chzn-select-deselect span6" tabindex="-1" name="top_news" required id="selCSI">
                                        <option value="">Select</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                </div>
                            </div>       
                             <div class="form-actions">
                                <button class="btn btn-success" name="addNews" type="submit">Add News</button>
                            </div>   
                            </form>
                            <!-- END FORM-->
                        </div>
                    </div>
                    <!-- END EXTRAS widget-->
                </div>
            </div>



            

            <!-- END PAGE CONTENT-->         
         </div>
         <!-- END PAGE CONTAINER-->
      </div>
      <!-- END PAGE -->  
   </div>
   <!-- END CONTAINER -->

   <!-- BEGIN FOOTER -->
   <div id="footer">
       2013 &copy; Metro Lab Dashboard.
   </div>
   <!-- END FOOTER -->

   <!-- BEGIN JAVASCRIPTS -->
   <!-- Load javascripts at bottom, this will reduce page load time -->
   <script src="js/jquery-1.8.3.min.js"></script>
   <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
   <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
   <script type="text/javascript" src="assets/jquery-slimscroll/jquery-ui-1.9.2.custom.min.js"></script>
   <script type="text/javascript" src="assets/jquery-slimscroll/jquery.slimscroll.min.js"></script>
   <!-- <script type="text/javascript" src="assets/bootstrap/js/bootstrap-fileupload.js"></script> -->
   <script src="assets/fullcalendar/fullcalendar/fullcalendar.min.js"></script>
   <script src="assets/bootstrap/js/bootstrap.min.js"></script>
   <!-- <script src="js/jquery.blockui.js"></script> -->

   <!-- ie8 fixes -->
   <!--[if lt IE 9]>
   <script src="js/excanvas.js"></script>
   <script src="js/respond.js"></script>
   <![endif]-->

   <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js" type="text/javascript"></script>
   <script src="js/jquery.sparkline.js" type="text/javascript"></script>
   <script src="assets/chart-master/Chart.js"></script>
   <script src="js/jquery.scrollTo.min.js"></script>


   <!--common script for all pages-->
   <script src="js/common-scripts.js"></script>

   <!--script for this page only-->

   <script src="js/easy-pie-chart.js"></script>
   <script src="js/sparkline-chart.js"></script>
   <script src="js/home-page-calender.js"></script>
   <script src="js/home-chartjs.js"></script>

   <!-- END JAVASCRIPTS -->   

   <!--script for this page-->
   <script src="js/form-component.js"></script>
</body>
<!-- END BODY -->
</html>
<?php
if(isset($_POST['addNews'])){
  // for image
    $fileNamesInString='';
    $countfiles = count($_FILES['file1']['name']);
    for($i=0;$i<$countfiles;$i++){
      $fileName = $_FILES['file1']['name'][$i];
      $tmp_name=$_FILES['file1']['tmp_name'][$i];
      $fileExt = explode('.', $fileName);
      $fileActualExt = strtolower(end($fileExt));
      $fileNameNew = uniqid('',true).".".$fileActualExt;
      $fileNamesInString.=$fileNameNew.","; 
      $path='../newsImage/'.$fileNameNew;
      chmod('uploads/',0777);
      move_uploaded_file($tmp_name, $path);
    }
    $fileNamesInString = rtrim($fileNamesInString, ",");
    // for featured image

    $fileName1 = $_FILES['news_featuredimage']['name'];
    $tmp_name1=$_FILES['news_featuredimage']['tmp_name'];
    $fileExt1 = explode('.', $fileName1);
    $fileActualExt1 = strtolower(end($fileExt1));
    $fileNameNew1 = uniqid('',true).".".$fileActualExt1;
    $path='../newsFeaturedImage/'.$fileNameNew1;
    chmod('uploads/',0777);
    move_uploaded_file($tmp_name1, $path);
// print_r($_POST);
if(insertNews($conn, $_POST, $fileNamesInString, $fileNameNew1)){
    echo '<script language="javascript">';
    echo '</script>';
    showMsg('News Created Successfully');
    redirection('manageNews.php');
    
}else{
    echo '<script language="javascript">';
    echo 'alert("Failed to create new Admin ")';
    echo '</script>';
}

}

?>