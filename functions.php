<?php

function public_nav_main_bootstrap() {
    $partial = array('common/menu-partial.phtml', 'default');
    $nav = public_nav_main();  // this looks like $this->navigation()->menu() from Zend
    $nav->setPartial($partial);
    return $nav->render();
}
function public_nav_items_bootstrap() {
    $partial = array('common/menu-items-partial.phtml', 'default');
    $nav = public_nav_items();  // this looks like $this->navigation()->menu() from Zend
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

function related_items($current_item)
{
	if (metadata($current_item, 'Collection Name')) {
		$collection = get_collection_for_item($current_item);
		$items = get_records('Item', array('collection' => metadata($collection, 'id'), 'sort_field' => 'random'), 7);
		if ($items) {
			$html = '<div class="col-md-4 related-items"><div class="panel panel-default"><div class="panel-heading"><h4>Related Items</h4></div><div class="list-group">';
			foreach ($items as $item) {
				$html .= link_to_item('<div class="row"><div class="col-xs-4">' . item_image('square_thumbnail', array('class' => 'img-responsive')) . '</div><div class="col-xs-8"><h3>' . metadata($item, array('Dublin Core', 'Title')) . '</h3></div></div>', array('class'=>'list-group-item'), 'show', $item);
				release_object($item);
			}
			$html .= '</div></div></div></div>';
			return $html;
		}
	}
}