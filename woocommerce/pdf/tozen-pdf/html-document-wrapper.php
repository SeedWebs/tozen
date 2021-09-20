<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title><?php echo $this->get_title(); ?></title>
	<style type="text/css"><?php $this->template_styles(); ?></style>
	<style type="text/css">
	@font-face {
		font-family: 'Cordia';
		font-style: normal;
		font-weight: normal;
		src: local('Cordia'), url('https://tozen.todsorb.site/wp-content/themes/Tozen-Seed2/fonts/Cordia.ttf') format('truetype');
	}
	@font-face {
		font-family: 'Cordia';
		font-style: normal;
		font-weight: bold;
		src: local('Cordia Bold'), url('https://tozen.todsorb.site/wp-content/themes/Tozen-Seed2/fonts/Cordia-Bold.ttf') format('truetype');
	}
	body {
		font-family: 'Cordia', sans-serif;
	}
</style>
</head>
<body class="<?php echo $this->get_type(); ?>">	
	<?php echo $content; ?>
</body>
</html>