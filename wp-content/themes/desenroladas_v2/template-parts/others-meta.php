<?php global $user; ?>
<div class="others__meta">
	<?php echo get_avatar( $user->id, 480 ); ?>
	<h4 class="others__name"><?php echo $user->display_name; ?></h4>
	<a href="<?php echo get_author_posts_url( $user->id );
	?>" class="others__posts-link" target="_blank">Posts</a>
	<ul class="social others__links">
	<?php if ( ! empty( $user->meta->facebook ) ) : ?>
		<li class="menu-item menu-item--facebook">
			<a href="<?php echo $user->meta->facebook[0]; ?>" target="_blank">
				<span>Facebook</span>
			</a>
		</li>
	<?php endif; ?>
	<?php if ( ! empty( $user->meta->twitter ) ) : ?>
		<li class="menu-item menu-item--twitter">
			<a href="<?php echo $user->meta->twitter[0]; ?>" target="_blank">
				<span>Twitter</span>
			</a>
		</li>
	<?php endif; ?>
	<?php if ( ! empty( $user->meta->instagram ) ) : ?>
		<li class="menu-item menu-item--instagram">
			<a href="<?php echo $user->meta->instagram[0]; ?>" target="_blank">
				<span>Instagram</span>
			</a>
		</li>
	<?php endif; ?>
	</ul>
</div>
