<?php 
$msgTxt = (isset($_GET['msg']) && $_GET['msg'] != '') ? $_GET['msg'] : '&nbsp;';
$errTxt = (isset($_GET['err']) && $_GET['err'] != '') ? $_GET['err'] : '&nbsp;';
$mCls 	= ""; $mFaCls = "";
if($msgTxt !=  '&nbsp;') 	{$mCls = 'success'; $mFaCls = 'check';}
else if($errTxt != '&nbsp;'){$mCls = 'danger'; $mFaCls = 'ban';}
if($msgTxt != "&nbsp;" || $errTxt != "&nbsp;" ) {
	$dMsg = $msgTxt != "&nbsp;" ? $msgTxt : $errTxt; 
?>
<div class="alert alert-<?php echo $mCls; ?> alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <i class="icon fa fa-<?php echo $mFaCls; ?>"></i><?php echo $dMsg; ?>
</div>
<?php 
}//if
?>