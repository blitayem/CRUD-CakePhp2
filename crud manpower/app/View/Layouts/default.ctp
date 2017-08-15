
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		Students project
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1>Students project</h1>
		</div>
		<div id="content">

			<?php
					echo $this->Html->link(
    			'Students',
    			'/Students',
    			array('class' => 'button', 'target' => '_blank')
					);?>
					<?php
					echo $this->Html->link(
							'Notes',
							'/Notes',
							array('class' => 'button', 'target' => '_blank')
							);?>
			<?php
					echo $this->Html->link(
				  		'Subjects',
				  		'/Subjects',
				  		array('class' => 'button', 'target' => '_blank')
							);?>


			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">

			<p>
				Students project
			</p>
		</div>
	</div>
</body>
</html>
