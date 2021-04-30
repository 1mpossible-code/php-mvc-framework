<?php
/** @var $model User */
use app\core\form\elements\InputEmail;
use app\core\form\elements\InputPassword;
use app\core\form\elements\InputText;
use app\core\form\Form;
use app\models\User; ?>

<h1>Register</h1>
<?php $form = new Form('', 'POST'); ?>

<?php $form->field(InputText::class, $model, 'name'); ?>
<?php $form->field(InputEmail::class, $model, 'email'); ?>
<?php $form->field(InputPassword::class, $model, 'password'); ?>
<?php $form->field(InputPassword::class, $model, 'passwordConfirm'); ?>

<?php $form->submit(); ?>

<?php $form->end(); ?>