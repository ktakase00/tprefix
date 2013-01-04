<script id="project_delete_dialog" type="text/x-handlebars-template">
<?php
	$form = $this->beginWidget('CActiveForm', array());
?>
<div>
プロジェクト "{{project_nm}}" を削除します。よろしいですか？
</div>
<div>
<?php
	echo CHtml::button('OK', array('class' => 'submit'));
	echo CHtml::button('キャンセル', array('class' => 'cancel'));
?>
</div>
<?php
	$this->endWidget();
?>
</script>
