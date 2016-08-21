<div class="null">
<p>&nbsp;</p>
<?php echo $this->Session->flash(); ?>
<?php echo $this->Session->flash('auth'); ?>
<table border="0">
<?php echo $this->Form->create('User', array('action' => 'login'));?>
<tr><td align="left" colspan="2"><h2><?php echo __('Please enter your email and password'); ?></h2></td></tr>
<tr><td align="right" valign="bottom">email</td><td valign="bottom"><?php echo $this->Form->input('email', array('label' => '', 'div' => array('style' => 'width:350px')));?></td></tr>
<tr><td align="right" valign="bottom">password</td><td valign="bottom"><?php echo $this->Form->input('password', array('label' => '', 'div' => array('style' => 'width:350px')));?></td></tr>
<tr><td align="center" colspan="2"><?php echo $this->Form->end(__('Login'));?></td></tr>
<tr><td align="center" colspan="2"><hr></td></tr>
</table>
<p>Forgot your password click <a href="/users/resetPassword">here</a>.</p>
</div>
