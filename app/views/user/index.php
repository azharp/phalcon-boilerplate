<?php
/**
 * @var \Phalcon\Mvc\View\Engine\Php $this
 */
?>

<div class="page-header">
    <h1>
        Search users
    </h1>
    <p>
		<?php echo $this->tag->linkTo( [ "user/new", "Create users" ] ) ?>
    </p>
</div>

<?php echo $this->getContent() ?>

<?php
echo $this->tag->form(
	[
		"user/search",
		"autocomplete" => "off",
		"class"        => "form-horizontal"
	]
);
?>

<div class="form-group">
    <label for="fieldId" class="col-sm-2 control-label">Id</label>
    <div class="col-sm-10">
		<?php echo $this->tag->textField( [
			"id",
			"type" => "number",
			"class" => "form-control",
			"id" => "fieldId"
		] ) ?>
    </div>
</div>


<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
		<?php echo $this->tag->submitButton( [ "Search", "class" => "btn btn-default" ] ) ?>
    </div>
</div>

<?php echo $this->tag->endForm(); ?>
