<?php
/**
 * @var $exception Exception
 * @var $this View
 */

use app\core\View;

$this->title = $exception->getMessage();
?>
<h1><?php echo $exception->getCode(); ?> - <?php echo $exception->getMessage(); ?></h1>