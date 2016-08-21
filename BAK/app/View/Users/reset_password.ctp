<div class="null">
<p>&nbsp;</p>
<?php echo $this->Session->flash(); ?>
<?php echo $this->Session->flash('auth'); ?>
<table border="0">
<?php echo $this->Form->create('User', array('action' => 'resetPassword'));?>
<tr><td align="left" colspan="2"><h2><?php echo __('Forgot your password?'); ?></h2></td></tr>
<tr><td align="left" colspan="2"><?php echo __('Fill out this form to have a new password emailed to you<p>'); ?></td></tr>
<tr><td align="right" valign="bottom">email</td><td valign="bottom"><?php echo $this->Form->input('email', array('label' => '', 'div' => array('style' => 'width:350px'))); ?></td></tr>
<tr><td align="center" colspan="2"><?php echo $this->Form->end(__('Reset Password'));?></td></tr>
</table>
</div>
