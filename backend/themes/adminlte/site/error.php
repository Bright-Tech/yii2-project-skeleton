<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>

<div class="error-container">
	<div class="well">
		<h1 class="grey lighter smaller">
			<span class="blue bigger-125"> <i class="ace-icon fa fa-sitemap"></i>
				<?= Html::encode($this->title) ?>
			</span>
		</h1>

		<hr />
		<h3 class="lighter smaller"><?= nl2br(Html::encode($message)) ?></h3>

		<div>

		</div>

		<hr />
		<div class="space"></div>

		<div class="center">
			<a href="javascript:history.back()" class="btn btn-grey"> <i
				class="ace-icon fa fa-arrow-left"></i> Go Back
			</a> <a href="#" class="btn btn-primary"> <i
				class="ace-icon fa fa-tachometer"></i> Dashboard
			</a>
		</div>
	</div>
</div>