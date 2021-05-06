<?php
/**
 * @var $model User
 * @var $this View
 */

use impossible\phpmvc\form\elements\InputEmail;
use impossible\phpmvc\form\elements\InputPassword;
use impossible\phpmvc\form\Form;
use impossible\phpmvc\View;
use app\models\User;

$this->title = 'Login';
?>

    <h1>Login</h1>
<?php $form = new Form('', 'POST'); ?>

<?php $form->field(InputEmail::class, $model, 'email'); ?>
<?php $form->field(InputPassword::class, $model, 'password'); ?>

<?php $form->submit(); ?>

<?php $form->end(); ?>