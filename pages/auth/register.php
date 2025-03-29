<?php


use cva67\phpmvc\form\Form;
?>

<?= Form::begin('#', 'post'); ?>

<?= Form::field($user, 'name', 'Full Name'); ?>
<?= Form::emailField($user, 'email'); ?>
<?= Form::passwordField($user, 'password'); ?>
<?= Form::passwordField($user, 'confirm_password', 'Confirm Password'); ?>
<?= Form::field($user, 'address'); ?>
<?= Form::submit(); ?>
<?= Form::end(); ?>