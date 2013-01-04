<script id="project_edit_dialog" type="text/x-handlebars-template">
<?php
	$form = $this->beginWidget('CActiveForm', array());
?>
<div>
<?php
	echo CHtml::label('プロジェクト名', 'project_nm');
	echo CHtml::textField('project_nm', '', array('class' => 'project_name'));
?>
</div>
<div>
<?php
	echo CHtml::button('作成', array('class' => 'submit'));
	echo CHtml::button('キャンセル', array('class' => 'cancel'));
?>
</div>
<?php
	$this->endWidget();
?>
</script>
