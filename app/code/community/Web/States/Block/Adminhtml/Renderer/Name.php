<?php
class Web_States_Block_Adminhtml_Renderer_Name extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Action
{
    /**
     * @param Varien_Object $row
     *
     * @return array|string
     */
    public function render(Varien_Object $row)
    {
        $html = '';
        $locales = Mage::helper('web_states')->getLocales();

        $resource = Mage::getSingleton('core/resource');
        $read = $resource->getConnection('core_read');
        $regionName = $resource->getTableName('directory/country_region_name');

        $select = $read->select()->from(array('region' => $regionName))->where('region.region_id=?', $row->getRegionId());
        $data = $read->fetchAll($select);
        foreach ($data as $row) {
            $arr[$row['locale']] = $row['name'];
        }
        foreach ($locales as $locale) {
            if (!array_key_exists($locale,$arr)) {
                $name = 'EMPTY';
            }else{
                $name = $arr[$locale];
            }
            $html[] = '<span>' . $locale . '</span> => <span class="' . $locale . '_name">' . $name . '</span>';
        }
        $html = implode('<br />', $html);

        if ($html == '') {
            $html = '&nbsp;';
        }

        return $html;
    }
}
