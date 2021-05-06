<?php
/**
 * @var $exception Exception
 * @var $this View
 */

use impossible\phpmvc\View;

$this->title = $exception->getMessage();
?>
<h1><?php echo $exception->getCode(); ?> - <?php echo $exception->getMessage(); ?></h1>