<?php
class sfWidgetFormSchemaFormatterDiv2 extends sfWidgetFormSchemaFormatter {
    protected
    $rowFormat = '%error%%field%%help%',
    $helpFormat = '<span class="help">%help%</span>',
    $errorRowFormat = '<div>%errors%</div>',
    #$errorListFormatInARow = '%errors%',
    $errorListFormatInARow = '',
    $errorRowFormatInARow = '<div class="formError">&darr;&nbsp;%error%&nbsp;&darr;</div>',
    $namedErrorRowFormatInARow = '%name%: %error%<br />',
    $decoratorFormat = '%content%';
}
