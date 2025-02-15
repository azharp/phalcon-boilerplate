<?php
/**
 * @var \Phalcon\Mvc\View\Engine\Php $this
 */
?>

<?php use Phalcon\Tag; ?>

<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous"><?php echo $this->tag->linkTo( [ "user/index", "Go Back" ] ); ?></li>
            <li class="next"><?php echo $this->tag->linkTo( [ "user/new", "Create " ] ); ?></li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>Search result</h1>
</div>

<?php echo $this->getContent(); ?>

<div class="row">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
        </tr>
        </thead>
        <tbody>
		<?php foreach ( $page->items as $user ): ?>
            <tr>
                <td><?php echo $user->id ?></td>
                <td><?php echo $user->name ?></td>
                <td><?php echo $user->email ?></td>

                <td><?php echo $this->tag->linkTo( [ "user/edit/" . $user->id, "Edit" ] ); ?></td>
                <td><?php echo $this->tag->linkTo( [ "user/delete/" . $user->id, "Delete" ] ); ?></td>
            </tr>
		<?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="row">
    <div class="col-sm-1">
        <p class="pagination" style="line-height: 1.42857;padding: 6px 12px;">
			<?php echo $page->current, "/", $page->total_pages ?>
        </p>
    </div>
    <div class="col-sm-11">
        <nav>
            <ul class="pagination">
                <li><?php echo $this->tag->linkTo( [ "user/search", "First", 'class' => 'page-link' ] ) ?></li>
                <li><?php echo $this->tag->linkTo( [
						"user/search?page=" . $page->before,
						"Previous",
						'class' => 'page-link'
					] ) ?></li>
                <li><?php echo $this->tag->linkTo( [
						"user/search?page=" . $page->next,
						"Next",
						'class' => 'page-link'
					] ) ?></li>
                <li><?php echo $this->tag->linkTo( [
						"user/search?page=" . $page->last,
						"Last",
						'class' => 'page-link'
					] ) ?></li>
            </ul>
        </nav>
    </div>
</div>
