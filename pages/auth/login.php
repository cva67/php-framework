<?php


use cva67\phpmvc\form\Form;
?>

<?= Form::begin('#', 'post'); ?>
<?= Form::emailField($login, 'email', 'Email'); ?>
<?= Form::passwordField($login, 'password', 'Password'); ?>

<?= Form::submit(); ?>
<?= Form::end(); ?>