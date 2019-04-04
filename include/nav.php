<!-- Sidebar toggle button-->

<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"> 
<span class="sr-only">Toggle navigation</span> 
</a>

<div class="navbar-custom-menu">
  <ul class="nav navbar-nav">
  	<li class="dropdown user user-menu"> 
		<a> 
		<span class="hidden-xs"></i>Welcome, <?php echo strtoupper($_SESSION['calendar_fd_user']['name']); ?></span> 
		</a>
	</li>
    <li class="dropdown user user-menu"> 
	<a href="<?php echo WEB_ROOT; ?>?logout"> 
	<span class="hidden-xs"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;Log Out</span> 
	</a>
    </li>
  </ul>
</div>
