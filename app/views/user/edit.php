<?php
/**
 * @var \Phalcon\Mvc\View\Engine\Php $this
 */
?>

<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous"><?php echo $this->tag->linkTo( [ "user", "Back" ] ) ?></li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>
        Edit users
    </h1>
</div>

<?php echo $this->getContent(); ?>

<?php
echo $this->tag->form(
	[
		"user/save",
		"autocomplete" => "off",
		"class"        => "form-horizontal"
	]
);
?>

<?php echo $this->tag->hiddenField( "id" ) ?>

<div class="form-group">
    <label for="fieldId" class="col-sm-2 control-label">Name</label>
    <div class="col-sm-10">
		<?php echo $this->tag->textField( [
			"name",
			"type"  => "text",
			"class" => "form-control",
			"id"    => "fieldName"
		] ) ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldId" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
		<?php echo $this->tag->textField( [
			"email",
			"type"  => "email",
			"class" => "form-control",
			"id"    => "fieldEmail"
		] ) ?>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
		<?php echo $this->tag->submitButton( [ "Save", "class" => "btn btn-default" ] ) ?>
    </div>
</div>

<?php echo $this->tag->endForm(); ?>
