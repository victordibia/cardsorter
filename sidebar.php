<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $row_rsusers['name']; ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview " id="index">
              <a href="index.php">
            <i class="fa fa-home"></i> <span>Welcome</span></a>            </li>
            <li class="treeview " id="codebook"><a href="codes.php">   <i class="fa fa-bookmark"></i>Code Book</a></li>
            <li class="treeview " id="training"><a href="training.php">  <i class="fa fa-bank"></i><span>Training</span></a></li>
            <li class="treeview " id="tasks"><a href="tasks.php">  <i class="fa fa-briefcase"></i><span>Tasks</span></a></li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>