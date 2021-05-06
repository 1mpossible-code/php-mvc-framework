<?php
/**
 * @var View $this
 * @var ContactForm $model
 */

use app\core\form\elements\InputEmail;
use app\core\form\elements\InputText;
use app\core\form\elements\Textarea;
use app\core\form\Form;
use app\core\View;
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
