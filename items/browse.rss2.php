<?php
$item = $items[0];
$entry = array();
// Title is a CDATA section, so no need for extra escaping.
$entry['title'] = metadata($item, 'display_title', array('no_escape' => true));
$entry['link'] = xml_escape(record_url($item, null, true));
$entry['lastUpdate'] = strtotime($item->added);
echo $entry;
