<?php
$item = $items[0];
$entry = array();
set_current_record('item', $item, true);
// Title is a CDATA section, so no need for extra escaping.
$entry['title'] = metadata($item, 'display_title', array('no_escape' => true));
$entry['link'] = xml_escape(record_url($item, null, true));
$entry['lastUpdate'] = strtotime($item->added);
//List the first file as an enclosure (only one per RSS feed)
if (($files = $item->Files) && ($file = current($files))) {
    $entry['enclosure'] = array();
    $fileDownloadUrl = file_display_url($file);
    $enc['url'] = $fileDownloadUrl;
    $enc['type'] = $file->mime_type;
    $enc['length'] = (int) $file->size;
    $entry['enclosure'][] = $enc;
}
return $entry;
