<?php

function is_input_empty($pfn, $pwd)
{
    if (empty($pfn) || empty($pwd)) {
        return true;
    } else {
        return false;
    }
}