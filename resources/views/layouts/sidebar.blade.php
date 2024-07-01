         <!-- Left side column. contains the sidebar -->
         <aside class="main-sidebar">
            <!-- sidebar -->
            <div class="sidebar">
               <!-- sidebar menu -->
               <ul class="sidebar-menu">
                  <li class="active">
                     <a href="/dashboard"><i class="fa fa-columns"></i><span>Dashboard</span>
                     <span class="pull-right-container">
                     </span>
                     </a>
                  </li>
                  <li class="treeview">
                     <a href="">
                     <i class="fa fa-columns"></i><span>Boards</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="{{ url('/api/boards?user_id=1') }}"> Boards</a></li>
                        <li><a href="/add-boards">Add Boards</a></li>
                        
                     </ul>
                  </li>
                 
                  
            <!-- /.sidebar -->
         </aside>