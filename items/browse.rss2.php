<?php
$item = $items[0];
$entry = array();
set_current_record('item', $item, true);
$entry['title'] = metadata($item, array('Dublin Core', 'Title'), array('no_escape' => true));
echo all_element_texts($item);
