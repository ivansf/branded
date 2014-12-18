
	<div class="header-wrapper">
		<?php if(theme_get_setting('branded-left')): ?>
		<div class="branding-left">
			<a href="#">
				<img src="<?php echo base_path() . path_to_theme() ?>/images/logo.png" alt=""/>
			</a>

		</div>
		<?php endif ?>
		<header id="page-header">

			<div class="container">

				<hgroup id="page-title">
						<?php print render($title_prefix); ?>
						<h1 class="page-title <?php print $page_icon_class ?>">
							<?php if (!empty($page_icon_class)): ?><span class="icon"></span><?php endif; ?>
							<?php if ($title) print $title ?>
						</h1>
						<?php if (isset($subtitle)): ?>
							<h2><?php print $subtitle; ?></h2>
						<?php endif; ?>
						<?php print render($title_suffix); ?>

				</hgroup>

				<nav id="breadcrumb"><div class="inner"><?php print $breadcrumb ?></div></nav>
			</div>
		</header>
	</div>

<div class="branded-wrapper <?php echo (theme_get_setting('branded-full')) ? 'full-width' : '' ?>">

	<div id="console">
	<?php if ($show_messages && $messages): ?>

			<a id="close-messages" href="#">Clear messages</a>
			<div class="message-list">
				<?php print $messages; ?>
			</div>

	<?php endif; ?>
	</div>


	<?php if ($primary_local_tasks || $secondary_local_tasks || $action_links || (!$toolbar && isset($secondary_menu))): ?>
		<nav id="tasks" class="container">
			<div class="main">
				<div class="inner clearfix">
					<?php print render($primary_local_tasks) ?>
					<?php if ($primary_local_tasks && $action_links): ?>
						<div class="divider"></div>
					<?php endif; ?>

					<?php if (!$toolbar && isset($secondary_menu)): ?>
						<?php print theme('links', array('links' => $secondary_menu, 'attributes' => array('class' => 'nav secondary-nav'))) ?>
					<?php endif; ?>
				</div>
			</div>
		</nav>
	<?php endif; ?>



	<section id="page" class="container">
		<?php if ($action_links): ?>
			<ul class="action-links"><?php print render($action_links) ?></ul>
		<?php endif; ?>
		<?php if ($secondary_local_tasks): ?>
			<div class="sub clearfix"><?php print render($secondary_local_tasks) ?></div>
		<?php endif; ?>

		<div id="main-content" class="limiter clearfix">
			<?php if ($page['help']): ?>
				<div id="help" class="well">
					<?php print render($page['help']) ?>
				</div>
			<?php endif; ?>
			<div id="content" class="page-content clearfix">
				<?php if (!empty($page['content'])) print render($page['content']) ?>
			</div>
		</div>
	</section>

	<footer class="container">
		<?php if ($feed_icons): ?>
			<div class="feed-icons clearfix">
				<label><?php print t('Feeds') ?></label>
				<?php print $feed_icons ?>
			</div>
		<?php endif; ?>
	</footer>

</div>