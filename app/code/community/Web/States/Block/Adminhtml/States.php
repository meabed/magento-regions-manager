<?php
class Web_States_Block_Adminhtml_States extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    /**
     * Block constructor
     */
    public function __construct()
    {
        /** @var string _controller */
        $this->_controller = 'adminhtml_states';
        /** @var string _blockGroup */
        $this->_blockGroup = 'web_states';
        /** @var string _headerText */
        $this->_headerText = Mage::helper('web_states')->__('Country/States Manager');
        parent::__construct();
    }
}