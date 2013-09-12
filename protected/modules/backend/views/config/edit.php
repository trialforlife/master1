<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'config-form',
    'enableAjaxValidation' => false, // Ajax- и Client- валидацию я не предусматривал, т.к. это не имеет смысла
    'enableClientValidation' => false,
));
echo '<table>';
foreach ($model->attributeNames() as $attribute) {
    echo '<tr><td>';
        echo $form->labelEx($model, $attribute);
        echo '</td><td>';
        echo $form->textField($model, $attribute);
    echo '</td></tr>';
}
echo '<tr><td>&nbsp;</td><td>';
echo CHtml::submitButton('Сохранить');
echo '</td></tr>';
echo '</table>';

$this->endWidget();