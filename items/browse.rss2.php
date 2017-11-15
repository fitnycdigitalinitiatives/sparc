<?php
$item = $items[0];
$entry = array();
set_current_record('item', $item, true);
echo all_element_texts($item);
