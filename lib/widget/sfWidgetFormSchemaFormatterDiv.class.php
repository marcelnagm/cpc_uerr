<?php
class sfWidgetFormSchemaFormatterDiv extends sfWidgetFormSchemaFormatter {
    protected
    $rowFormat = '<td>%error%%field%%help%</td>',
    $helpFormat = '<span class="help">%help%</span>',
    $errorRowFormat = '<div>%errors%</div>',
    $errorListFormatInARow = '%errors%',
    $errorRowFormatInARow = '<div class="formError">%error%</div>',
    $namedErrorRowFormatInARow = '%name%: %error%<br />',
    $decoratorFormat = '<tr class="formContainer">%content%</tr>';
}
