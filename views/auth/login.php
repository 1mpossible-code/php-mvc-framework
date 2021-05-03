<?php
/** @var $model User */
use app\core\form\elements\InputEmail;
use app\core\form\elements\InputPassword;
use app\core\form\elements\InputText;
use app\core\form\Form;
use app\models\User; ?>

    <h1>Login</h1>
<?php $form = new Form('', 'POST'); ?>

<?php $form->field(InputEmail::class, $model, 'email'); ?>
<?php $form->field(InputPassword::class, $model, 'password'); ?>

<?php $form->submit(); ?>

<?php $form->end(); ?>