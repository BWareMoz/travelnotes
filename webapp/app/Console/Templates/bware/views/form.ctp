<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Console.Templates.default.views
 * @since         CakePHP(tm) v 1.2.0.5234
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

echo "<?php echo \$this->Html->breadcrumb(array(
    \$this->Html->link(__('Home'), '/'),
    \$this->Html->link('".Inflector::humanize(Inflector::underscore($pluralVar))."', '/".$pluralVar."'),
    __('".Inflector::humanize($action)."')));?>"
?>

<div class="<?php echo $pluralVar; ?> form">

	<div class="page-header">
		<h1><?php printf("<?php echo __('%s %s'); ?>", Inflector::humanize($action), $singularHumanName); ?></h1>
	</div>

<?php echo "<?php echo \$this->Form->create('{$modelClass}'); ?>\n"; ?>
	<fieldset>
<?php
		echo "\t<?php\n";
		foreach ($fields as $field) {
			if (strpos($action, 'add') !== false && $field == $primaryKey) {
				continue;
			} elseif (!in_array($field, array('created', 'modified', 'updated'))) {
				echo "\t\techo \$this->Form->input('{$field}');\n";
			}
		}
		if (!empty($associations['hasAndBelongsToMany'])) {
			foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData) {
				echo "\t\techo \$this->Form->input('{$assocName}');\n";
			}
		}
		echo "\t?>\n";
?>
	</fieldset>
<?php
	if($action == "add") {
		echo "<?php echo \$this->Form->end('<i class=\"icon-plus\"></i> '.__('Add')); ?>\n";
	} elseif ($action == "edit") {
		echo "<?php echo \$this->Form->end('<i class=\"icon-edit\"></i> '.__('Save')); ?>\n";
	}
?>
</div>
