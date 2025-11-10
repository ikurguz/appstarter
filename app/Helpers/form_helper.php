<?php

function add_error_class($erorrs_data, $field)
{
    return isset($erorrs_data[$field]) ? ' is-invalid' : '';
}

function display_errors($erorrs_data, $field)
{
$out = '';
if (isset($erorrs_data[$field])) {
    $out .= '<div class="invalid-feedback">';
    $out .= $erorrs_data[$field];
    $out .= '</div>';
}
return $out;
}
