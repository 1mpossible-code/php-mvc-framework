<?php
/**
 * @var View $this
 * @var ContactForm $model
 */

use impossible\phpmvc\form\elements\InputEmail;
use impossible\phpmvc\form\elements\InputText;
use impossible\phpmvc\form\elements\Textarea;
use impossible\phpmvc\form\Form;
use impossible\phpmvc\View;
use app\models\ContactForm;

$this->title = 'Contact';
?>
<h1>Contact</h1>

<?php $form = new Form('', 'POST') ?>

<?php $form->field(InputText::class, $model, 'subject') ?>
<?php $form->field(InputEmail::class, $model, 'email') ?>
<?php $form->field(Textarea::class, $model, 'body') ?>

<?php $form->submit(); ?>
<?php $form->end(); ?>
