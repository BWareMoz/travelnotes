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
   __('".Inflector::humanize(Inflector::underscore($pluralVar))."')));?>"
?>
<div class="<?php echo $pluralVar; ?> index">
	<div class="page-header">
		<h1><?php echo "<?php echo __('{$pluralHumanName}'); ?>"; ?></h1>
	</div>
	<table class="table table-striped table-bordered" id="list">
	<thead>
	<?php  
		foreach ($fields as $field){
			$isKey = false;
			if (!empty($associations['belongsTo'])) {
				foreach ($associations['belongsTo'] as $alias => $details) {
					if ($field === $details['foreignKey']) {
						$isKey = true;
						echo "\t\t<th><?php echo Inflector::humanize(Inflector::underscore('{$alias}')); ?>&nbsp;</th>\n";
						break;
					}
				}
			}
			if ($isKey !== true) {
				echo "\t\t<th><?php echo Inflector::humanize('{$field}'); ?>&nbsp;</th>\n";
			}
		} 

	?>
		<th><?php echo "<?php echo __('Actions'); ?>"; ?></th>
	</thead>
	<tbody>
	<?php
	echo "<?php
	foreach (\${$pluralVar} as \${$singularVar}): ?>\n";
	echo "\t<tr>\n";
		foreach ($fields as $field) {
			$isKey = false;
			if (!empty($associations['belongsTo'])) {
				foreach ($associations['belongsTo'] as $alias => $details) {
					if ($field === $details['foreignKey']) {
						$isKey = true;
						echo "\t\t<td>\n\t\t\t<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>\n\t\t</td>\n";
						break;
					}
				}
			}
			if ($isKey !== true) {
				echo "\t\t<td><?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>&nbsp;</td>\n";
			}
		}

		echo "\t\t<td class=\"actions\">\n";
		echo "\t\t\t<div class=\"btn-group\">\n";
		echo "\t\t\t<a class=\"btn-small\" rel=\"tooltip\" data-original-title=\"<?php echo __('View'); ?>\" href=\"<?php echo \$this->Html->url(array('action' => 'view', \${$singularVar}['{$modelClass}']['id'])); ?>\"><i class=\"icon-eye-open\"></i></a>\n";
	 	echo "\t\t\t<a class=\"btn-small\" rel=\"tooltip\" data-original-title=\"<?php echo __('Edit'); ?>\" href=\"<?php echo \$this->Html->url(array('action' => 'edit', \${$singularVar}['{$modelClass}']['id'])); ?>\"><i class=\"icon-edit\"></i></a>\n";
	 	echo "\t\t\t<?php echo \$this->Form->postLink('<i class=\"icon-trash\"></i>', array('action' => 'delete', \${$singularVar}['{$modelClass}']['id']), array('class' => 'btn-small', 'rel'=>'tooltip', 'data-original-title'=>__('Delete'), 'escape' => false), __('Are you sure you want to delete # %s?', \${$singularVar}['{$modelClass}']['id']));?>\n";
	 	echo "\t\t\t</div>\n";
		echo "\t\t</td>\n";
	echo "\t</tr>\n";

	echo "<?php endforeach; ?>\n";
	?>
	</tbody>
	</table>
	<br/>
	<?php echo "<a href='{$pluralVar}/add' class='btn'><i class='icon-plus'></i> <?php echo __('Add ".Inflector::humanize(Inflector::underscore($singularVar))."'); ?></a>";?>
	<br/><br/>
</div>
