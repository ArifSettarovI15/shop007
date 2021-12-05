<?php

class ShopCatsColumns extends DbDataColumns
{

    private $id;
    private $status;
    private $new;
    private $title;
    private $short_title;
    private $url;
    private $parent_id;
    private $text_id;
    private $sort;
    private $count;
    private $photo_id;
    private $meta_title;
    private $meta_title2;
    private $meta_keywords;
    private $meta_desc;
    private $sale;
    private $sale_into;
    private $sale_cart;
    private $hit;
    private $ud_price;
    private $icon_small;

    public function __construct()
    {
        $this->setId();
        $this->getId()->setName('id');
        $this->getId()->setType(TYPE_UINT);

        $this->setStatus();
        $this->getStatus()->setName('status');
        $this->getStatus()->setType(TYPE_BOOL);

        $this->setTitle();
        $this->getTitle()->setName('title');
        $this->getTitle()->setType(TYPE_STR);

        $this->setShortTitle();
        $this->getShortTitle()->setName('short_title');
        $this->getShortTitle()->setType(TYPE_STR);

        $this->setUrl();
        $this->getUrl()->setName('url');
        $this->getUrl()->setType(TYPE_STR);

        $this->setParentId();
        $this->getParentId()->setName('parent_id');
        $this->getParentId()->setType(TYPE_UINT);

        $this->setTextId();
        $this->getTextId()->setName('text_id');
        $this->getTextId()->setType(TYPE_UINT);

        $this->setSort();
        $this->getSort()->setName('sort');
        $this->getSort()->setType(TYPE_UINT);

        $this->setCount();
        $this->getCount()->setName('count');
        $this->getCount()->setType(TYPE_UINT);

        $this->setPhotoId();
        $this->getPhotoId()->setName('icon');
        $this->getPhotoId()->setType(TYPE_UINT);

        $this->setIconSmall();
        $this->getIconSmall()->setName('icon_small');
        $this->getIconSmall()->setType(TYPE_UINT);

        $this->setMetaTitle();
        $this->getMetaTitle()->setName('head_title');
        $this->getMetaTitle()->setType(TYPE_STR);

        $this->setMetaTitle2();
        $this->getMetaTitle2()->setName('head_title2');
        $this->getMetaTitle2()->setType(TYPE_STR);

        $this->setMetaKeywords();
        $this->getMetaKeywords()->setName('head_keywords');
        $this->getMetaKeywords()->setType(TYPE_STR);

        $this->setMetaDesc();
        $this->getMetaDesc()->setName('head_desc');
        $this->getMetaDesc()->setType(TYPE_STR);

        $this->setTop();
        $this->getTop()->setName('top');
        $this->getTop()->setType(TYPE_BOOL);

        $this->setNew();
        $this->getNew()->setName('new');
        $this->getNew()->setType(TYPE_BOOL);

        $this->setSale();
        $this->getSale()->setName('sale');
        $this->getSale()->setType(TYPE_BOOL);

        $this->setSaleInto();
        $this->getSaleInto()->setName('sale_into');
        $this->getSaleInto()->setType(TYPE_BOOL);

        $this->setSaleCart();
        $this->getSaleCart()->setName('sale_cart');
        $this->getSaleCart()->setType(TYPE_BOOL);

        $this->setHit();
        $this->getHit()->setName('hit');
        $this->getHit()->setType(TYPE_BOOL);

        $this->setUdPrice();
        $this->getUdPrice()->setName('ud_price');
        $this->getUdPrice()->setType(TYPE_BOOL);

    }
//	/**
//	 * @return DbColumn
//	 */
//	public function getId() {
//		return $this->id;
//	}
//
//	private function setId() {
//		$this->id=new DbColumn();
//	}

    /**
     * @return DbColumn
     */
    public function getStatus()
    {
        return $this->status;
    }

    private function setStatus()
    {
        $this->status = new DbColumn();
    }

    /**
     * @return DbColumn
     */
    public function getTitle()
    {
        return $this->title;
    }

    private function setTitle()
    {
        $this->title = new DbColumn();
    }

    /**
     * @return DbColumn
     */
    public function getShortTitle()
    {
        return $this->short_title;
    }

    private function setShortTitle()
    {
        $this->short_title = new DbColumn();
    }

    /**
     * @return DbColumn
     */
    public function getParentId()
    {
        return $this->parent_id;
    }

    private function setParentId()
    {
        $this->parent_id = new DbColumn();
    }

    /**
     * @return DbColumn
     */
    public function getUrl()
    {
        return $this->url;
    }

    private function setUrl()
    {
        $this->url = new DbColumn();
    }

    /**
     * @return DbColumn
     */
    public function getPhotoId()
    {
        return $this->photo_id;
    }

    private function setPhotoId()
    {
        $this->photo_id = new DbColumn();
    }

    /**
     * @return DbColumn
     */
    public function getIconSmall()
    {
        return $this->icon_small;
    }

    private function setIconSmall()
    {
        $this->icon_small = new DbColumn();
    }

    /**
     * @return DbColumn
     */
    public function getTextId()
    {
        return $this->text_id;
    }


    private function setTextId()
    {
        $this->text_id = new DbColumn();
    }


    /**
     * @return DbColumn
     */
    public function getMetaTitle()
    {
        return $this->meta_title;
    }

    private function setMetaTitle()
    {
        $this->meta_title = new DbColumn();
    }

    /**
     * @return DbColumn
     */
    public function getMetaTitle2()
    {
        return $this->meta_title2;
    }

    private function setMetaTitle2()
    {
        $this->meta_title2 = new DbColumn();
    }

    /**
     * @return DbColumn
     */
    public function getMetaKeywords()
    {
        return $this->meta_keywords;
    }

    private function setMetaKeywords()
    {
        $this->meta_keywords = new DbColumn();
    }

    /**
     * @return DbColumn
     */
    public function getMetaDesc()
    {
        return $this->meta_desc;
    }


    private function setMetaDesc()
    {
        $this->meta_desc = new DbColumn();
    }

    /**
     * @return DbColumn
     */
    public function getSort()
    {
        return $this->sort;
    }

    private function setSort()
    {
        $this->sort = new DbColumn();
    }

    /**
     * @return DbColumn
     */
    public function getCount()
    {
        return $this->count;
    }

    private function setCount()
    {
        $this->count = new DbColumn();
    }

    /**
     * @return DbColumn
     */
    public function getTop()
    {
        return $this->top;
    }

    private function setTop()
    {
        $this->top = new DbColumn();
    }

    /**
     * @return DbColumn
     */
    public function getNew()
    {
        return $this->new;
    }


    private function setNew()
    {
        $this->new = new DbColumn();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }


    public function setId(): void
    {
        $this->id = new DbColumn();
    }

    /**
     * @return mixed
     */
    public function getSale()
    {
        return $this->sale;
    }


    public function setSale(): void
    {
        $this->sale = new DbColumn();
    }

    /**
     * @return mixed
     */
    public function getSaleInto()
    {
        return $this->sale_into;
    }


    public function setSaleInto(): void
    {
        $this->sale_into = new DbColumn();
    }

    /**
     * @return mixed
     */
    public function getSaleCart()
    {
        return $this->sale_cart;
    }


    public function setSaleCart(): void
    {
        $this->sale_cart = new DbColumn();
    }

    /**
     * @return mixed
     */
    public function getHit()
    {
        return $this->hit;
    }


    public function setHit(): void
    {
        $this->hit = new DbColumn();
    }

    /**
     * @return mixed
     */
    public function getUdPrice()
    {
        return $this->ud_price;
    }


    public function setUdPrice(): void
    {
        $this->ud_price = new DbColumn();
    }
}


class ShopCatsModel extends DbDataModel
{

    /**
     * @var  ShopCatsColumns $columns_where
     */
    public $columns_where;
    /**
     * @var  ShopCatsColumns $columns_update
     */
    public $columns_update;


    public function InitDop()
    {
        $this->setTableName('`shop_categories`');
        $this->setTableItemPrefix('cat_');
        $this->setTablePrimaryKey($this->GetTableItemNameSimple('id'));
        $this->columns_where = new ShopCatsColumns();
        $this->columns_update = new ShopCatsColumns();
    }

    public function SetJoinParent()
    {
        $this->setSelectField(' parent_data.cat_title as parent_cat_title, parent_data.cat_short_title as parent_cat_short_title ');
        $this->setJoin(' LEFT JOIN ' . $this->getTableName() . ' parent_data ON ' . $this->GetTableItemName('parent_id') . '=parent_data.`cat_id` ');
    }


}

class ShopCats extends DbData
{

    /**
     * @var  ShopCatsModel $model
     */
    public $model;

    /**
     * @var $model ShopCatsModel
     */
    public function CreateModel()
    {
        $this->model = new ShopCatsModel();
    }


    public function GetItemById($id, $full = 0)
    {
        $this->CreateModel();
        if ($full) {
            $this->model->setSelectField($this->model->getTableName() . '.*');
            $this->model->SetJoinImage('icon', $this->model->GetTableItemName('icon'));
        }
        $this->model->columns_where->getId()->setValue($id);
        return $this->GetItem($full);
    }


    public function PrepareData($result_item, $full = 0)
    {
        $result_item = $this->registry->files->FilePrepare($result_item, 'icon_');

        $url_parts = explode('/', $result_item['cat_url']);
        $result_item['cat_last_url_part'] = $url_parts[count($url_parts) - 1];
        $result_item['cat_full_url'] = BASE_URL . '/' . $result_item['cat_url'] . '/';

        $result_item['cat_icon_url'] = $this->registry->files->GetImageUrl($result_item, 'medium', 0, 'icon_');
        $result_item['cat_image_url'] = $this->registry->files->GetImageUrl($result_item, 'normal', 0, 'icon_');
        $result_item2 = $this->registry->files->FilePrepare($result_item, 'icon_small_', '');
        $result_item['cat_icon_small_url'] = $this->registry->files->GetImageUrl($result_item2, 'medium', 0, 'icon_small_');
        $result_item['full_cat_url'] = BASE_URL . '/' . $result_item['cat_url'] . '/';
        if ($full == 1) {
            $result_item['cat_text'] = $this->registry->text->GetText($result_item['cat_text_id']);
        }
        if ($result_item['cat_short_title'] == '') {
            $result_item['cat_short_title'] = $result_item['cat_title'];
        }

        return $result_item;
    }

    public function UpdateLink($id)
    {
        $info = $this->GetItemById($id);
        $parent_info = $this->GetItemById($info['cat_parent_id']);
        $d = explode('/', $info['cat_url']);
        $current_url = $d[count($d) - 1];
        $link = '';
        if ($parent_info['cat_url'] != '') {
            $link .= $parent_info['cat_url'] . '/';
        }
        $link .= $current_url;

        $this->CreateModel();
        $this->model->columns_where->getUrl()->setValue($current_url);
        $this->model->columns_where->getId()->notValue($id);
        $info = $this->GetItem();
        if ($info == false) {
            $this->CreateModel();
            $this->model->columns_update->getUrl()->setValue($link);
            $this->model->columns_where->getId()->setValue($id);
            $this->Update();
        }
    }


    public function UpdateChildLinks($parent = 0)
    {
        $this->CreateModel();
        $this->model->columns_where->getParentId()->setValue($parent);
        $cats = $this->GetList();

        foreach ($cats as $cat_data) {
            $this->UpdateLink($cat_data['cat_id']);
            $this->UpdateChildLinks($cat_data['cat_id']);
        }
    }

    public function GetChildIds($parent = 0)
    {
        $this->CreateModel();
        $this->model->columns_where->getParentId()->setValue($parent);
        return array_keys($this->GetList());

    }

    public function MakeUiTree($CatsData, $parent = 0, $ex_id = -999)
    {
        $list = '<ul>';
        if (is_array($CatsData) && is_array($CatsData['levels']) && is_array($CatsData['levels'][$parent])) {
            foreach ($CatsData['levels'][$parent] as $cat_data) {
                if ($ex_id != $cat_data['cat_id']) {
                    $keys = '';
                    if ($cat_data['cat_status'] == 0) {
                        $keys .= ' DEL';
                    }
                    $icon = '';
                    if ($CatsData['levels'][$cat_data['cat_id']]) {
                        $icon = '<svg width="7" height="11" viewBox="0 0 7 11" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M4.0858 5.50001L0.292908 1.70712L1.70712 0.292908L6.91423 5.50001L1.70712 10.7071L0.292908 9.29291L4.0858 5.50001Z" fill="#6B7A6B"/>
</svg>';
                    }
                    $list .= '<li id="node_' . $cat_data['cat_id'] . '" data-status="' . $cat_data['cat_status'] . '" >
		                        <a href="' . '/manager/shop/cats/edit/' . $cat_data['cat_id'] . '/"><span>' . $cat_data['cat_title'] . $keys . '</span>' . $icon . '</a>
		               ';
                    if ($CatsData['levels'][$cat_data['cat_id']]) {
                        $list .= $this->MakeUiTree($CatsData, $cat_data['cat_id'], $ex_id);

                    }
                    $list .= '</li>';
                }
            }
        }
        $list .= '</ul>';
        return $list;
    }


    public function MakeSelect($CatsData, $current_id = 0, $parent = 0, $ex_id = -999, $osn_elem = 0)
    {
        $list = '';
        $in = '';
        if (is_array($CatsData) && is_array($CatsData['levels']) && is_array($CatsData['levels'][$parent])) {
            foreach ($CatsData['levels'][$parent] as $cat_data) {
                if ($ex_id != $cat_data['cat_id']) {
                    $sep = '&nbsp;&nbsp;';
                    if ($current_id == $cat_data['cat_id']) {
                        $selected = ' selected="selected" ';
                    } else {
                        $selected = '';
                    }
                    $in .= '<option ' . $selected . ' value="' . $cat_data['cat_id'] . '">' . $sep . $cat_data['cat_title'] . '</option>';
                }
            }
        }


        if ($in != '') {
            $d = '';
            if ($parent == 0) {
                $d = '<option value="-1">Топ уровень</option>';
            }
            $list = '<select class="element" data-no-empty="1"  data-before="GetSubCatSelect" name="cat_parent_id" data-name="cat_parent_id" data-type="filter_value">
        <option value="0">Выберите</option>
        ' . $d . '
        ' . $in . '</select>';
        }
        return $list;
    }


    public function MakeTree($current_id = 0, $array_data)
    {
        $i = 1;
        $array = array();

        foreach ($array_data as $result_item) {
            if ($result_item['cat_id'] == $current_id) {
                $result_item['active'] = 1;
            }
            $array['data'][$result_item['cat_id']] = $result_item;
            $array['levels'][$result_item['cat_parent_id']][$result_item['cat_id']] = $result_item;
            $i++;
        }
        return $array;
    }


    public function GetCatsNestedSelect($current_id, $CatsMenu, $html = '', $ex_id = -999, $osn_elem = 0)
    {
        if ($CatsMenu['data'][$current_id]) {
            $html = $this->MakeSelect($CatsMenu, intval($current_id), intval($CatsMenu['data'][$current_id]['cat_parent_id']), $ex_id) . $html;
            $html = $this->GetCatsNestedSelect($CatsMenu['data'][$current_id]['cat_parent_id'], $CatsMenu, $html, $ex_id);
        } elseif ($html == '') {
            $html = $this->MakeSelect($CatsMenu, intval($current_id), intval($CatsMenu['data'][$current_id]['cat_parent_id']), $ex_id, $osn_elem) . $html;
        }
        return $html;
    }

    public function GetAllCatsIds($CatsData, $cat_id)
    {
        $data = array();

        if ($CatsData['levels'][$cat_id]) {

            foreach ($CatsData['levels'][$cat_id] as $cat_data) {
                $data[$cat_data['cat_id']] = intval($cat_data['cat_id']);
                if ($CatsData['levels'][$cat_data['cat_id']]) {
                    $data = array_merge($data, $this->GetAllCatsIds($CatsData, $cat_data['cat_id']));
                }
            }
        } else {
            return false;
        }

        return $data;
    }

    public function GetParentCat($CatsData, $cat_id)
    {
        if ($CatsData['data'][$cat_id]['cat_parent_id'] == 0) {
            $data = $CatsData['data'][$cat_id];
        } else {
            $data = $this->GetParentCat($CatsData, $CatsData['data'][$cat_id]['cat_parent_id']);
        }
        return $data;
    }

    public function GetParentCats($CatsData, $cat_id)
    {
        $data = array();
        if ($CatsData['data'][$cat_id]) {
            $pp = intval($CatsData['data'][$cat_id]['cat_parent_id']);
            if ($pp > 0) {
                $data[intval($pp)] = $CatsData['data'][$pp];
                $data = array_merge($data, $this->GetParentCats($CatsData, $pp));
            }

        }
        return $data;
    }

    public function GetParentAllCatsIds($current_cat_id, $CatsData)
    {
        $data = $this->GetParentCatsIds($CatsData, $current_cat_id);
        $data[] = $current_cat_id;
        return $data;
    }

    public function GetParentCatsIds($CatsData, $parent)
    {
        $data = array();
        if ($CatsData['data'][$parent]) {
            $pp = intval($CatsData['data'][$parent]['cat_parent_id']);
            if ($pp > 0) {
                $data[$pp] = intval($pp);
                $data = array_merge($data, $this->GetParentCatsIds($CatsData, $pp));
            }

        }
        return $data;
    }


    public function SetOrder($key)
    {
        if ($key == 'id') {
            $sort = $this->model->columns_where->getId()->getName();
            $this->model->setOrderByWithColumn($sort);
            $this->model->setOrderWay('DESC');
            return $sort;
        } elseif ($key == 'sort') {
            $sort = $this->model->columns_where->getSort()->getName();
            $this->model->setOrderByWithColumn($sort);
            return $sort;
        }

        $sort = $this->model->columns_where->getTitle()->getName();
        $this->model->setOrderByWithColumn($sort);
        return $sort;

    }
}

