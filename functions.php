<?php

function public_nav_main_bootstrap() {
    $partial = array('common/menu-partial.phtml', 'default');
    $nav = public_nav_main();  // this looks like $this->navigation()->menu() from Zend
    $nav->setPartial($partial);
    return $nav->render();
}
function public_nav_items_bootstrap() {
    $partial = array('common/menu-items-partial.phtml', 'default');
    if (!isset($navArray)) {
        $navArray = array(
            array(
                'label' =>__('Browse All'),
                'uri' => url('items/browse'),
            ));
            if (total_records('Tag')) {
                $navArray[] = array(
                    'label' => __('Browse by Tag'),
                    'uri' => url('items/tags')
                );
            }
            $navArray[] = array(
                'label' => __('Advanced Search'),
                'uri' => url('items/search')
            );
    }
    $nav = nav($navArray, 'public_navigation_items');
    $nav->setPartial($partial);
    return $nav->render();
}
function browse_sort_links_bootstrap($links, $wrapperTags = array())
{
    $sortParam = Omeka_Db_Table::SORT_PARAM;
    $sortDirParam = Omeka_Db_Table::SORT_DIR_PARAM;
    $req = Zend_Controller_Front::getInstance()->getRequest();
    $currentSort = trim($req->getParam($sortParam));
    $currentDir = trim($req->getParam($sortDirParam));
    $defaults = array(
        'link_tag' => 'li',
        'list_tag' => 'ul',
        'link_attr' => array( 'role' => 'presentation' ),
        'list_attr' => array( 'id' => 'sort-links-list', 'class' => 'dropdown-menu' )
    );
    $sortlistWrappers = array_merge($defaults, $wrapperTags);
    $linkAttrArray = array();
    foreach ($sortlistWrappers['link_attr'] as $key => $attribute) {
        $linkAttrArray[$key] = $key . '="' . html_escape( $attribute ) . '"';
    }
    $linkAttr = join(' ', $linkAttrArray);
    $listAttrArray = array();
    foreach ($sortlistWrappers['list_attr'] as $key => $attribute) {
        $listAttrArray[$key] = $key . '="' . html_escape( $attribute ) . '"';
    }
    $listAttr = join(' ', $listAttrArray);
    $sortlist = '';
    if(!empty($sortlistWrappers['list_tag'])) {
        $sortlist .= "<{$sortlistWrappers['list_tag']} $listAttr>";
    }
    foreach ($links as $label => $column) {
        if($column) {
            $urlParams = $_GET;
            $urlParams[$sortParam] = $column;
            $class = '';
            if ($currentSort && $currentSort == $column) {
                if ($currentDir && $currentDir == 'd') {
                    $class = 'class="active sorting desc"';
                    $urlParams[$sortDirParam] = 'a';
                } else {
                    $class = 'class="active sorting asc"';
                    $urlParams[$sortDirParam] = 'd';
                }
            }
            $url = html_escape(url(array(), null, $urlParams));
            if ($sortlistWrappers['link_tag'] !== '') {
                $sortlist .= "<{$sortlistWrappers['link_tag']} $class $linkAttr><a href=\"$url\">$label</a></{$sortlistWrappers['link_tag']}>";
            } else {
                $sortlist .= "<a href=\"$url\" $class $linkAttr>$label</a>";
            }
        } else {
            $sortlist .= "<{$sortlistWrappers['link_tag']}>$label</{$sortlistWrappers['link_tag']}>";
        }
    }
    if(!empty($sortlistWrappers['list_tag'])) {
        $sortlist .= "</{$sortlistWrappers['list_tag']}>";
    }
    return $sortlist;
}

function item_search_filters_bootstrap(array $params = null)
    {
        if ($params === null) {
            $request = Zend_Controller_Front::getInstance()->getRequest();
            $requestArray = $request->getParams();
        } else {
            $requestArray = $params;
        }

        $db = get_db();
        $displayArray = array();
        foreach ($requestArray as $key => $value) {
            if($value != null) {
                $filter = ucfirst($key);
                $displayValue = null;
                switch ($key) {
                    case 'type':
                        $filter = 'Item Type';
                        $itemType = $db->getTable('ItemType')->find($value);
                        if ($itemType) {
                            $displayValue = $itemType->name;
                        }
                        break;

                    case 'collection':
                        $collection = $db->getTable('Collection')->find($value);
                        if ($collection) {
                            $displayValue = strip_formatting(
                                metadata(
                                    $collection,
                                    array('Dublin Core', 'Title'),
                                    array('no_escape' => true)
                                )
                            );
                        }
                        break;

                    case 'user':
                        $user = $db->getTable('User')->find($value);
                        if ($user) {
                            $displayValue = $user->name;
                        }
                        break;

                    case 'public':
                    case 'featured':
                        $displayValue = ($value == 1 ? __('Yes') : $displayValue = __('No'));
                        break;

                    case 'search':
                    case 'tags':
                    case 'range':
                        $displayValue = $value;
                        break;
                }
                if ($displayValue) {
                    $displayArray[$filter] = $displayValue;
                }
            }
        }

        $displayArray = apply_filters('item_search_filters', $displayArray, array('request_array' => $requestArray));

        // Advanced needs a separate array from $displayValue because it's
        // possible for "Specific Fields" to have multiple values due to
        // the ability to add fields.
        if(array_key_exists('advanced', $requestArray)) {
            $advancedArray = array();
            foreach ($requestArray['advanced'] as $i => $row) {
                if (!$row['element_id'] || !$row['type']) {
                    continue;
                }
                $elementID = $row['element_id'];
                $elementDb = $db->getTable('Element')->find($elementID);
                $element = __($elementDb->name);
                $type = __($row['type']);
                $query = $row['terms'];
                if (($element == 'Color Data') and (preg_match('/^#[a-f0-9]{6}$/i', $query))) {
                  $color_name = color_name($query);
                  $advancedValue = '<div id="swatch" data-toggle="tooltip" title="Color name: '. $color_name . '"><div style="background-color:' . html_escape($query) . ';"></div></div>';
                  $advancedArray[$i] = $advancedValue;
                }
                elseif (($element == 'Primary Color') and (preg_match('/^#[a-f0-9]{6}$/i', $query))) {
                  $advancedValue = '<div id="swatch" style="background-color:' . html_escape($query) . ';"></div>';
                  $advancedArray[$i] = $advancedValue;
                }
                else {
                  $advancedValue = $element . ' ' . $type;
                  if (isset($row['terms'])) {
                      $advancedValue .= ' "' . html_escape($row['terms']) . '"';
                  }
                  $advancedArray[$i] = '<span class="advanced">' . $advancedValue . '</span> ';
                }
            }
        }

        $html = '';
        if (!empty($displayArray) || !empty($advancedArray)) {
            foreach($displayArray as $name => $query) {
                $class = html_escape(strtolower(str_replace(' ', '-', $name)));
                $html .= '<span class="' . $class . '">' . html_escape(__($name)) . ': ' . html_escape($query) . '</span>';
            }
            if(!empty($advancedArray)) {
                foreach($advancedArray as $j => $advanced) {
                    $html .= $advanced;
                }
            }
        }
        return $html;
    }

function related_items($current_item)
{
	if (metadata($current_item, 'Collection Name')) {
		$collection = get_collection_for_item($current_item);
		if ($collection) {
			$related_items = get_records('Item', array('collection' => metadata($collection, 'id'), 'sort_field' => 'random'), 7);
			if ($related_items) {
				$html = '<div class="col-md-4 related-items"><div class="panel panel-default"><div class="panel-heading"><h4>Related Items</h4></div><div class="list-group">';
				foreach ($related_items as $related_item) {
					$html .= link_to_item('<div class="row"><div class="col-xs-4">' . mdid_square_thumbnail_tag($related_item, 'img-responsive') . '</div><div class="col-xs-8"><h3 class="list-group-item-heading">' . metadata($related_item, array('Dublin Core', 'Title')) . '</h3></div></div>', array('class'=>'list-group-item'), 'show', $related_item);
					release_object($related_item);
				}
				$html .= '</div></div></div>';
				return $html;
			}
		}
	}
}

function palette($current_item)
{
	if (metadata('item', array('Item Type Metadata', 'Color Data'))) {
		$color_data = metadata($current_item, array('Item Type Metadata', 'Color Data'));
		$color_data = json_decode(html_entity_decode($color_data), true);
		$palette = $color_data["palette"];
		$html = '<ul class="list-inline">';
		foreach ($palette as $section) {
			$color = $section["color"];
			$closest = $section['closest'];
			$name = $section['name'];
      $element = get_db()->getTable('Element')->findByElementSetNameAndElementName('Item Type Metadata', 'Color Data');
      $advanced = array();
      $advanced[] = array('element_id' => $element->id, 'terms' => htmlspecialchars_decode($closest, ENT_QUOTES), 'type' => 'contains');
      $paramArray = array('search' => '', 'advanced' => $advanced);
      $params = http_build_query($paramArray);
      $url = url('/items/browse?') . $params;
			$html .= '<li id="swatch" data-toggle="tooltip" title="Closest color: '. $name . '"><a href="' . $url .'">';
			$html .= '<div style="background-color:' . $color . ';">';
			$html .= '</div></a></li>';
		}
		$html .= '</ul>';
		return $html;
	}
}

function primary_palette()
{
	$colors = array("#000000" => "Black", "#8b8680" => "Gray", "#af593e" => "Brown", "#ed0a3f" => "Red", "#ff681f" => "Red Orange", "#ff8833" => "Orange", "#ffae42" => "Yellow Orange", "#fbe870" => "Yellow", "#c5e17a" => "Yellow Green", "#3aa655" => "Green", "#0095b7" => "Blue Green", "#0066ff" => "Blue", "#6456b7" => "Blue Violet", "#8359a3" => "Violet (Purple)", "#bb3385" => "Red Violet", "#ffa6c9" => "Carnation Pink");
  $html = '<ul class="list-inline">';
  foreach ($colors as $color => $name) {
    $element = get_db()->getTable('Element')->findByElementSetNameAndElementName('Item Type Metadata', 'Primary Color');
    $advanced = array();
    $advanced[] = array('element_id' => $element->id, 'terms' => htmlspecialchars_decode($color, ENT_QUOTES), 'type' => 'contains');
    $paramArray = array('search' => '', 'advanced' => $advanced);
    $params = http_build_query($paramArray);
    $url = url('/items/browse?') . $params;
    $html .= '<li data-toggle="tooltip" title="'. $name . '"><a href="' . $url .'">';
    $html .= '<div style="background-color:' . $color . ';">';
    $html .= '</div></a></li>';
  }
  $html .= '</ul>';
  return $html;
}
function color_name($color)
{
  $source = '{"#fc89ac":{"name":"Tickle Me Pink","family":"pink"},"#1f75fe":{"name":"Blue","family":"blue"},"#a8e4a0":{"name":"Granny Smith Apple","family":"green"},"#fc74fd":{"name":"Pink Flamingo","family":"pink"},"#7366bd":{"name":"Blue Violet","family":"violet"},"#18a7b5":{"name":"Teal Blue","family":"blue"},"#1164b4":{"name":"Green Blue","family":"blue"},"#b2ec5d":{"name":"Inchworm"},"#58427c":{"name":"Cyber Grape"},"#bf4f51":{"name":"Bittersweet Shimmer"},"#5d76cb":{"name":"Indigo"},"#c5e384":{"name":"Yellow Green"},"#8fd400":{"name":"Sheen Green"},"#4a646c":{"name":"Deep Space Sparkle"},"#ffbcd9":{"name":"Cotton Candy"},"#ff7f49":{"name":"Burnt Orange"},"#fefe22":{"name":"Laser Lemon"},"#bc5d58":{"name":"Chestnut"},"#9fe2bf":{"name":"Sea Green"},"#000000":{"name":"Black"},"#414a4c":{"name":"Outer Space"},"#7851a9":{"name":"Royal Purple"},"#ace5ee":{"name":"Blizzard Blue"},"#a2add0":{"name":"Wild Blue Yonder"},"#dd9475":{"name":"Copper"},"#ffffff":{"name":"White"},"#efdecd":{"name":"Almond"},"#bab86c":{"name":"Olive Green"},"#1974d2":{"name":"Navy Blue"},"#b4674d":{"name":"Brown"},"#ebc7df":{"name":"Thistle"},"#ff9baa":{"name":"Salmon"},"#87a96b":{"name":"Asparagus"},"#71bc78":{"name":"Fern"},"#8e4585":{"name":"Plum"},"#fae7b5":{"name":"Banana Mania"},"#979aaa":{"name":"Manatee"},"#aaf0d1":{"name":"Magic Mint"},"#c5d0e6":{"name":"Periwinkle"},"#fd5e53":{"name":"Sunset Orange"},"#80daeb":{"name":"Sky Blue"},"#2e5894":{"name":"B\'dazzled Blue"},"#ff48d0":{"name":"Razzle Dazzle Rose"},"#dd4492":{"name":"Cerise"},"#eceabe":{"name":"Spring Green"},"#1a4876":{"name":"Midnight Blue"},"#9aceeb":{"name":"Cornflower"},"#f8d568":{"name":"Orange Yellow"},"#e7c697":{"name":"Gold"},"#1cac78":{"name":"Green"},"#9c7c38":{"name":"Metallic Sunburst"},"#9f8170":{"name":"Beaver"},"#a57164":{"name":"Blast Off Bronze"},"#ff6e4a":{"name":"Outrageous Orange"},"#3bb08f":{"name":"Jungle Green"},"#fff44f":{"name":"Lemon Yellow"},"#ff43a4":{"name":"Wild Strawberry"},"#1cd3a2":{"name":"Caribbean Green"},"#cda4de":{"name":"Wisteria"},"#ffa343":{"name":"Neon Carrot"},"#efcdb8":{"name":"Desert Sand"},"#a5694f":{"name":"Sepia"},"#8d4e85":{"name":"Razzmic Berry"},"#ff7538":{"name":"Orange"},"#cb4154":{"name":"Brick Red"},"#17806d":{"name":"Tropical Rain Forest"},"#ffa089":{"name":"Vivid Tangerine"},"#cd9575":{"name":"Antique Brass"},"#cdc5c2":{"name":"Silver"},"#85754e":{"name":"Gold Fusion"},"#6699cc":{"name":"Blue Gray"},"#ea7e5d":{"name":"Burnt Sienna"},"#c46210":{"name":"Alloy Orange"},"#fdbcb4":{"name":"Melon"},"#d68a59":{"name":"Raw Sienna"},"#ffaacc":{"name":"Carnation Pink"},"#45cea2":{"name":"Shamrock"},"#ef98aa":{"name":"Mauvelous"},"#6dae81":{"name":"Forest Green"},"#ffa474":{"name":"Atomic Tangerine"},"#324ab2":{"name":"Violet Blue"},"#fddde6":{"name":"Piggy Pink"},"#ffcf48":{"name":"Sunglow"},"#c54b8c":{"name":"Mulberry"},"#0d98ba":{"name":"Blue Green"},"#f75394":{"name":"Violet Red"},"#ff496c":{"name":"Radical Red"},"#1fcecb":{"name":"Robin\'s Egg Blue"},"#fb7efd":{"name":"Shocking Pink"},"#fcd975":{"name":"Goldenrod"},"#9d81ba":{"name":"Purple Mountain\'s Majesty"},"#ffff99":{"name":"Canary"},"#fce883":{"name":"Yellow"},"#0a7e8c":{"name":"Metallic Seaweed"},"#6e5160":{"name":"Eggplant"},"#ff8243":{"name":"Mango Tango"},"#c8385a":{"name":"Maroon"},"#ceff1d":{"name":"Electric Lime"},"#319177":{"name":"Illuminating Emerald"},"#ee204d":{"name":"Red"},"#ff5349":{"name":"Red Orange"},"#e3256b":{"name":"Razzmatazz"},"#8f509d":{"name":"Vivid Violet"},"#ffff66":{"name":"Unmellow Yellow"},"#faa76c":{"name":"Tan"},"#ff1dce":{"name":"Hot Magenta"},"#76ff7a":{"name":"Screamin\' Green"},"#f664af":{"name":"Magenta"},"#e6a8d7":{"name":"Orchid"},"#fcb4d5":{"name":"Lavender"},"#78dbe2":{"name":"Aquamarine"},"#c0448f":{"name":"Red Violet"},"#926eae":{"name":"Violet (Purple)"},"#158078":{"name":"Pine Green"},"#ffcfab":{"name":"Peach"},"#95918c":{"name":"Gray"},"#30ba8f":{"name":"Mountain Meadow"},"#f0e891":{"name":"Green Yellow"},"#714b23":{"name":"Raw Umber"},"#deaa88":{"name":"Tumbleweed"},"#0081ab":{"name":"Steel Blue"},"#77dde7":{"name":"Turquoise Blue"},"#f78fa7":{"name":"Pink Sherbert"},"#757575":{"name":"Sonic Silver"},"#ffbd88":{"name":"Macaroni and Cheese"},"#1ca9c9":{"name":"Pacific Blue"},"#2b6cc4":{"name":"Denim"},"#a2a2d0":{"name":"Blue Bell"},"#cc6666":{"name":"Fuzzy Wuzzy"},"#7442c8":{"name":"Purple Heart"},"#cd4a4c":{"name":"Mahogany"},"#ffae42":{"name":"Yellow Orange"},"#ca3767":{"name":"Jazzberry Jam"},"#ff2b2b":{"name":"Orange Red"},"#de5d83":{"name":"Blush"},"#fc2847":{"name":"Scarlet"},"#fc6c85":{"name":"Wild Watermelon"},"#fddb6d":{"name":"Dandelion"},"#dbd7d2":{"name":"Timberwolf"},"#d98695":{"name":"Shimmering Blush"},"#fd7c6e":{"name":"Bittersweet"},"#9c2542":{"name":"Big Dip O\' Ruby"},"#edd19c":{"name":"Maize"},"#c364c5":{"name":"Fuchsia"},"#1dacd6":{"name":"Cerulean"},"#fe4eda":{"name":"Purple Pizzazz"},"#fdd9b5":{"name":"Apricot"},"#8a795d":{"name":"Shadow"},"#b0b7c6":{"name":"Cadet Blue"}}';
  $source = json_decode(html_entity_decode($source), true);
  $value = $source[$color];
  $name = $value["name"];
  return $name;
}

function mdid_thumbnail_tag($item, $class)
{
	if (($record_name = metadata($item, array('Item Type Metadata', 'Record Name'))) && ($record_id = metadata($item, array('Item Type Metadata', 'Record ID')))) {
		$html = '<div class="thumbnail-container"><img src="https://fitdil.fitnyc.edu/media/get/' . $record_id . '/' . $record_name . '/400x400" class="' . $class . '"></div>';
		return $html;

	}
}
function mdid_square_thumbnail_tag($item, $class)
{
	if (($record_name = metadata($item, array('Item Type Metadata', 'Record Name'))) && ($record_id = metadata($item, array('Item Type Metadata', 'Record ID')))) {
		$html = '<div class="thumbnail-container"><img src="https://fitdil.fitnyc.edu/media/thumb/' . $record_id . '/' . $record_name . '/?square" class="' . $class . '"></div>';
		return $html;

	}
}
function get_exhibit_item ($exhibit)
{
  $page = $exhibit->getFirstTopPage();
  $attachments = $page->getAllAttachments();
  $item = $attachments[0]->getItem();
  return $item;
}
