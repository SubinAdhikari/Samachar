<?php
  include 'layouts/header.php';
?>
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
        <!-- SIDEBAR HERE -->
      <?php
  include 'layouts/sidebar.php';
?>
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
                     Dynamic Table
                   </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="#">Home</a>
                           <span class="divider">/</span>
                       </li>
                       <li>
                           <a href="#">Article</a>
                           <span class="divider">/</span>
                       </li>
                       <li class="active">
                           Manage Article
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
            <!-- BEGIN ADVANCED TABLE widget-->
            <div class="row-fluid">
                <div class="span12">
                <!-- BEGIN EXAMPLE TABLE widget-->
                <div class="widget red">
                <?php if (isset(($_SESSION['msg'])))  echo $_SESSION['msg']; unset($_SESSION['msg']);?>
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> Articles' Information</h4>
                        
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                    </div>
                    <div class="widget-body">
                        <table class="table table-striped table-bordered" id="sample_1">
                            <thead>
                            <tr>
                                <th style="width:8px;"><input type="hidden" class="group-checkable" data-set="#sample_1 .checkboxes" />S.N</th>
                                <th>Heading/Title</th>
                                <th>Author</th>                               
                                <th class="hidden-phone">Featured Image</th>
                                <th class="hidden-phone">Status</th>
                                <th class="hidden-phone">Top Article</th>
                                <th class="hidden-phone">Views</th>
                                <th class="hidden-phone">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $allAriticles=getAllArticleDetails($conn);
                            //dump($allAriticles);
                            foreach ($allAriticles as $key => $article):
                                
                            ?>
                            <tr class="odd gradeX">
                                <td><input type="hidden" class="checkboxes" value="1" /><?php echo ++$key; ?></td>
                                <td class="hidden-phone"><?php
                                echo $article['article_title']; ?></td>

                                <td class="hidden-phone"><?php
                                echo $article['article_author']; ?></td>

                                <td><?php 
                                  $featuredImg=$article['article_featuredimage'];
                                
                                   ?>
                                     <img src="../articleFeaturedImage/<?php echo $featuredImg; ?>" alt="Article Featured Image" width="200px"/>
                                </td>

                                <td class="center hidden-phone"><?php if($article['is_active']=='active'): ?>
                              <span class="label label-sm label-success">
                                Active</span>
                              <?php else: ?>
                                <span class="label label-sm label-danger">
                                  Inactive</span>
                              <?php endif; ?></td>

                               <td class="center hidden-phone"><?php if($article['top_article']=='yes'): ?>
                              <span class="label label-sm label-success">
                                Yes</span>
                              <?php else: ?>
                                <span class="label label-sm label-danger">
                                  No</span>
                              <?php endif; ?></td>
                              <td class="hidden-phone"><?php
                                echo $article['article_views']; ?></td>

                                <td class="hidden-phone"><a href="editArticle.php?ref=<?php echo $article['article_id'];?>" class="btn btn-xs btn-info">
                                  Edit
                                </a>
                                <a href="deletearticle.php?ref=<?php echo $article['article_id'];?>" onclick="return confirm('Really Deleting that News??');" class="btn btn-xs btn-danger">
                                  Delete
                                </a></td> 
                            </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE widget-->
                </div>
            </div>

            <!-- END ADVANCED TABLE widget-->
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
   <script src="assets/bootstrap/js/bootstrap.min.js"></script>
   <script src="js/jquery.blockui.js"></script>
   <!-- ie8 fixes -->
   <!--[if lt IE 9]>
   <script src="js/excanvas.js"></script>
   <script src="js/respond.js"></script>
   <![endif]-->
   <script type="text/javascript" src="assets/uniform/jquery.uniform.min.js"></script>
   <script type="text/javascript" src="assets/data-tables/jquery.dataTables.js"></script>
   <script type="text/javascript" src="assets/data-tables/DT_bootstrap.js"></script>
   <script src="js/jquery.scrollTo.min.js"></script>


   <!--common script for all pages-->
   <script src="js/common-scripts.js"></script>

   <!--script for this page only-->
   <script src="js/dynamic-table.js"></script>

   <!-- END JAVASCRIPTS -->   
</body>
<!-- END BODY -->
</html>