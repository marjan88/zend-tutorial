<?php

namespace Album\Helper;

use Zend\Form\View\Helper\FormElementErrors as OriginalFormElementErrors;

class FormElementErrors extends OriginalFormElementErrors
{

    protected $messageCloseString     = '</span>';
    protected $messageOpenFormat      = '<span%s class="help-block error">';
    protected $messageSeparatorString = '';

}
