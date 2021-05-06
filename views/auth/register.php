<?php
/**
 * @var $model User
 * @var $this View
 */

use impossible\phpmvc\form\elements\InputEmail;
use impossible\phpmvc\form\elements\InputPassword;
use impossible\phpmvc\form\elements\InputText;
use impossible\phpmvc\form\Form;
use impossible\phpmvc\View;
use app\models\User;

$this->title = 'Register';
?>

    <h1>Register</h1>
<?php $form = new Form('', 'POST'); ?>

<?php $form->field(InputText::class, $model, 'name'); ?>
<?php $form->field(InputEmail::class, $model, 'email'); ?>
<?php $form->field(InputPassword::class, $model, 'password'); ?>
<?php $form->field(InputPassword::class, $model, 'passwordConfirm'); ?>

<?php $form->submit(); ?>

<?php $form->end(); ?>