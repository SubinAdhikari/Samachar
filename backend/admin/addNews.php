<?php include 'layouts/header.php'; 
  $categoryName=retriveCategories($conn);

  //$subCategoryName=retriveSubCategories($conn);
  
?>
<script>
    function fetchCategoryId(categoryName){ 
      
dataString = 'categoryName='+categoryName; 

var req=new XMLHttpRequest();
req.open("GET","SubCategoryIDRetrive1.php?categoryName="+categoryName,true);
req.send();

req.onreadystatechange=function(){
if(req.readyState==4 && req.status==200){
    document.getElementById("categoryid").innerHTML=req.responseText;
}
}; 


// $.ajax({
//       type: 'post',
//       url: 'SubCategoryIDRetrive2.php',
//       data: dataString,
//       datatype : "json",
//       success: function (data) {
//         console.log(data['sub'];
//          var a = '<option value="">No Sub-Catagory Available</option>';
//        console.log(a);

//         // if (response==0) {

//         //   $('#subCategory').html(a);
//         //   $("#data").hide();
//         //   console.log(response);
                     
//         // }
//         // else{
//         //   console.log(response);
//         //   $("#data").show();
//         //   $('#subCategory').html(response);
       
//         // }
//       }

        
//     });
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
                            <form action="#" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label">Heading/Title</label>
                                <div class="controls">
                                    <input type="text" class="span6 " name="news_title" />
                                    <!-- <span class="help-inline">Some hint here</span> -->
                                </div>
                            </div>  
                            <div class="control-group">
                                <label class="control-label">News Catagory</label>
                                <div class="controls">
                                    <select data-placeholder="Your Favorite Type of Bear" class="chzn-select-deselect span6" tabindex="-1" onchange="fetchCategoryId(this.value)"  name="category_name" id="selCSI">
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
                                    <select name="category_id" id="categoryid" class="span6">
                                    </select>
                                    <!-- <input type="text"  class="span6 " name="category_id" id="categoryid"   /> -->
                                    <!-- <span class="help-inline">Some hint here</span> -->
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">News Sub-Catagory</label>
                                <div class="controls">
                                    <select data-placeholder="Your Favorite Type of Bear" class="chzn-select-deselect span6" tabindex="-1" "  name="category_name" id="subCategory">
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Sub-Category Id</label>
                                <div class="controls">
                                    <select name="subcategory_id" id="subcategoryid" class="span6">
                                    </select>
                                    <!-- <input type="text"  class="span6 " name="category_id" id="categoryid"   /> -->
                                    <!-- <span class="help-inline">Some hint here</span> -->
                                </div>
                            </div>
                                <div class="control-group">
                                    <label class="control-label">News</label>
                                    <div class="controls">
                                        <textarea class="span12 ckeditor" name="editor1" rows="6"></textarea>
                                        <div class="form-actions">
                                    <button class="btn btn-success"  type="submit">Add News</button>
                                </div>
                                    </div>
                                    
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